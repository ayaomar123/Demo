<?php

namespace App\Http\Controllers;
use App\Http\Requests\CategoryRequest;
use App\models\Category;
use App\models\Article;
use Illuminate\Http\Request;
use Validator,Redirect,Response;
use DataTables;

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
        if(request()->ajax()) {
            return datatables()->of(Category::select([
                'id','name' , 'description', 'image' , 'status'
            ]))
            ->addIndexColumn()
            ->addColumn('action', function($data){
                   
                   $editUrl = url('categories/'.$data->id);
                   $btn = '<a href="'.$editUrl.'" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-primary btn-sm">Edit</a>';

                   $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Delete" class="btn btn-danger btn-sm delete">Delete</a>';

                    return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('categories.index');
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
           
            $check = Category::create($data);
            return Redirect::to("categories")->withSuccess('Great! categories has been inserted');
    
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
            return Redirect::to("categories")->withSuccess('Great! Category has been updated');
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
    
}
