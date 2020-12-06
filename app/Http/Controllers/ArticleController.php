<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Article;
use App\Http\Controllers\CategoryController;
use App\models\Category;
use DataTables;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $articles = Article::all();
        //$categories = Category::latest()->get();
        return view('Articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('Articles.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->category_id;
        $request->validate([
            //'category_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
            
        ]);
        $article = Article::create([    
            'title'=>$request->title,
            'description' =>$request->description,
            'status'=>$request->status,
            'image'=>$request->image,
        ]);
        $article->categories()->attach($request->category_id);
        return redirect(route('articles.index'))->with('message','Article Added Successfully!'); 
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
        $articles = Article::find($id);
        return view('Articles.edit',compact('articles'));
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
        Article::query()->find($id)->update($data);
        return redirect(route('articles.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::query()->find($id)->delete();
        return redirect(route('articles.index'))->with('message','Article Deleted Successfully!'); 
    }
    public function getArticles(Request $request){

        ## Read value
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page
   
        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');
   
        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value
   
        // Total records
        $totalRecords = Article::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Article::select('count(*) as allcount')->where('name', 'like', '%' .$searchValue . '%')->count();
   
        // Fetch records
        $records = Article::orderBy($columnName,$columnSortOrder)
          ->where('Article.title', 'like', '%' .$searchValue . '%')
          ->select('article.*')
          ->skip($start)
          ->take($rowperpage)
          ->get();
   
        $data_arr = array();
        
        foreach($records as $record){
           $id = $record->id;
           $username = $record->title;
           $name = $record->description;
           $email = $record->status;
   
           $data_arr[] = array(
             "id" => $id,
             "title" => $title,
             "description" => $description,
             "status" => $status
           );
        }
   
        $response = array(
           "draw" => intval($draw),
           "iTotalRecords" => $totalRecords,
           "iTotalDisplayRecords" => $totalRecordswithFilter,
           "aaData" => $data_arr
        );
   
        echo json_encode($response);
        exit;
      }
   }
