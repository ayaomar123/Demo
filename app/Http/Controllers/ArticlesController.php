<?php

namespace App\Http\Controllers;
use App\Http\Requests\ArticelRequest;
use App\models\Articles;
use App\models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Articles = Articles::all();
        return view('Articles.index',compact('Articles'));
    }
    public function details($slug)
    {
        $article = Article::where('slug',$slug)->approved()->published()->first();

        $blogKey = 'blog_' . $article->id;

        if (!Session::has($blogKey)) {
            $post->increment('view_count');
            Session::put($blogKey,1);
        }
        $randomposts = Post::approved()->published()->take(3)->inRandomOrder()->get();
        return view('post',compact('post','randomposts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticelRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('public');
        }

        Articles::create($data);

        return redirect(route('articles.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Articles $Articles)
    {
        //return view('Articles.show')->withArticles($Articles);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articles = Articles::find($id);

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
        //dd($id);
        $data = $request->all();
        Articles::query()->find($id)->update($data);
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
        Articles::query()->find($id)->delete();
        return redirect(route('articles.index'));
    }
    public function articleByCategory($slug)
    {
        $category = Category::where('slug',$slug)->first();
        $article = $category->posts()->approved()->published()->get();
        return view('category',compact('category','article'));
    }
}
