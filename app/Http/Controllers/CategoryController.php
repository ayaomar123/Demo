<?php

namespace App\Http\Controllers;
use App\Http\Requests\CategoryRequest;
use App\models\Category;
use App\models\Article;
use Illuminate\Http\Request;

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
    public function index()
    {
        $categories = Category::all();
        return view('Categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $articles = Article::all();
        return view('Categories.create',compact('articles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            //'category_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
            
        ]);
        $category = Category::create([    
            'name'=>$request->name,
            'description' =>$request->description,
            'status'=>$request->status,
            'image'=>$request->image,
        ]);
        $category->articles()->attach($request->article_id);
        return redirect(route('categories.index'))->with('success','Product created successfully.');;
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
        $category = Category::find($id);
        return view('Categories.edit',compact('category'));

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
        $data = $request->all();
        Category::query()->find($id)->update($data);
        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category =Category::where('id',$id)->first();

    if ($category != null) {
        $category->delete();
        return redirect()->route('categories.index')->with(['message'=> 'Successfully deleted!!']);
    }
    return redirect()->route('categories.index')->with(['message'=> 'Wrong ID!!']);
    }
    
}
