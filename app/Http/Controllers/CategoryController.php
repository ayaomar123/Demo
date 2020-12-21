<?php

namespace App\Http\Controllers;
use App\Http\Requests\CategoryRequest;
use App\models\Category;
use App\models\Article;
use Illuminate\Http\Request;
use Validator,Redirect,Response;
use DataTables;
use Toastr;
use Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        //  $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
        //  $this->middleware('permission:product-create', ['only' => ['create','store']]);
        //  $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
        //  $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        //dd($request->all());
//http://127.0.0.1:8000/categories?filter%5Bname%5D=sum&filter%5Bstatus%5D=1
        // $category = Categ::query()->when($request('name') || $request->status != null, function($query){
        //     $query->where('name', 'like', '%'.$request('filter[name]').'%')
        //     ->orWhere('status', request->status)
        //     -
        // })
        $items = Category::all();

        if(request()->ajax()) {
            
            $data = Category::select('*');
            
            return datatables()::of($data)
            ->addIndexColumn()
            ->filter(function ($instance) use ($request) {
                if (isset($request->cat)) {
                    $instance->where('name', $request->cat);
                }
                if (isset($request->status)) {
                    $instance->where('status', $request->status);
                }
                if (isset($request->search)) {
                    $instance->where('name', 'like', '%'.\request('search').'%')
                    ->orWhere('status', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('description', 'LIKE', '%' . $request->search . '%');

                }               

            })
            ->rawColumns(['status'])
            ->addColumn('action', function($data){
                   
                   $editUrl = url('categories/'.$data->id);
                   
                   $btn = '<a style="width:100px" href="'.$editUrl.'" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-primary"><i class="fas fa-edit"></i>Edit</a>';

                   $btn = $btn.' <a style="width:100px" href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Delete" class="btn btn-danger delete"><i class="fas fa-trash"></i>Delete</a>';

                    return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
            
        }
        return view('categories.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
            ]);
            if (isset($request->status)) {
              $data['status'] = $request->status;
            }
            $check = Category::create($data);
            return Redirect::to("categories")->with('msg', 'Category Created Successfully');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['category'] = Category::where('id', $id)->first();

        if(!$data['category']){
           return "sorry";
        }
        return view('categories.edit', $data);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = request()->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
            ]);
    
            $check = Category::where('id', $request->id)->update($data);
            return Redirect::to("categories")->with('info', 'Category Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    
    {

    // dd( Category::query()->find($id)->delete());
         Category::query()->find($id)->delete();
 
         return  response()->json(['success' => 'success']);
    }

    public function deleteAll(Request $request){
        $ids = $request->input('id');
        //dd($ids);
        //Category::whereIn('id',explode(",",$ids))->delete();
        Category::whereIn('id',$ids)->delete();
        return response()->json(['success'=>"Category Deleted successfully."]);

    }

    public function activeAll(Request $request){
        //dd($request->all());
        $ids = $request->input('id');
        $status = $request->status;
        Category::whereIn('id',$ids)->update(['status'=>$status]);
        return response()->json(['success'=>"Categories updated successfully."]);

    }

    public function activate(Request $request){
        //dd($request->all());
        $ids = $request->input('id');
        $status = !($request->status);
        Category::whereIn('id',$ids)->update(['status'=>$status]);
        return response()->json(['success'=>"Categories updated successfully."]);

    }

    public function changeStatus(Request $request) 
    {
        $category = Category::find($request->id);
        $status = $request->status;
        $category->update(['status'=>$status]);

        return response()->json(['success'=>"Category Status Updated successfully."]);
    }
    public function searching(Request $request)
    {
        $cat = $request->cat;
        $status = $request->status;
        $query = Category::whereRaw('true');
        //$query = Category::where('id','>',0);
        if($cat!=''){
            $query->where('name',$cat);
        }
        if($status!=''){
            $query->where('status',$status);
        }
        
        $items = $query->get();
        return view("categories.index")->with('items',$items);
    }
    
}
