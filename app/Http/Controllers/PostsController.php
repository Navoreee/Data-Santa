<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    //MIDDLEWARE
    function __construct(){
        $this->middleware('admin')->only('adminShowAll', 'adminShowPublished', 'adminShowPending', 'adminShowRejected', 'showCategoryUpdate', 'articleCategoryUpdated', 'verifyPending', 'destroyArticle');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   //for showing article on homepage
        $posts = Post::latest()->take(6)->where('status_id','=','2')->get();
        return view('home', [
            'posts' => $posts
        ]);
    }

    public function latest(){
        // Get all post from newest data  for latest article page
        $posts = Post::latest()->where('status_id','=','2')->paginate(9);

        return view('posts.latest', [
            'posts' => $posts
        ]);
      
    }

    public function searchArticle(Request $request){
        //search for article
        $articleName = $request->get('search');
        $result = Post::where('title','LIKE','%'.$articleName.'%')
                        ->where('status_id','=','2')
                        ->paginate(5);
        return view('search_result', ['posts' => $result])->with('query', $articleName);
    }

    public function myArticle(){
        //open my articles page for members
        $article_data = Post::where('user_id','=',Auth::id())->paginate(5);
        return view('my_article', ['articles' => $article_data]);
    }

    public function article(){
        $category_data = Category::all();
        return view('article')->with('category_data',$category_data);
    }

    public function showByCategory(Request $request){
        $category = Category::find($request->id);
        $posts = Post::where('category_id', $category->id)
                    ->where('status_id','2')
                    ->paginate(9);

        $data = [
            'category' => $category,
            'posts' => $posts
        ];

        return view('posts.by_categories', $data);
    }

    public function save_article(Request $request){
        $user_id = auth()->user()->id;

        // validation data
        $this->validate($request, [
            'title' => 'required|unique:posts|min:5',
            'link' => 'required',
            'content' => 'required|min:10',
            'category' => 'required',
            'file' => 'required'
        ]);

        $category_data = Category::all();
        $file = $request->file('file');

        // Generate a file name with extension
        $fileName = 'profile-'.time().'.'.$file->getClientOriginalExtension();

        // Save the file
        $path = $file->storeAs('files', $fileName);

        // dd($path);

        $post  = new Post;
        $post->user_id = $user_id;
        $post->category_id = $request->category;
        $title_name = $request->title.' (Pending)';
        $post->title = $title_name;
        $post->tableau_link = $request->link;
        $post->content = $request->content;
        $post->file_path = $path;
        $post->status_id = 1;
        
        if($post->save()){
            return view('article')->with('category_data',$category_data);;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('/posts.page',[
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    //ADMIN-------------------------------------------------

    public function adminShowAll(){
        $data = Post::Paginate(10);
        return view('admin.articles')->with('posts', $data)->with('status', 'all');
    }

    public function adminShowPublished(){
        $data = Post::where('status_id','2')->paginate(10);
        return view('admin.articles')->with('posts', $data)->with('status', 'published');
    }

    public function adminShowPending(){
        $data = Post::where('status_id','=',1)->paginate(10);
        return view('admin.articles')->with('posts',$data)->with('status', 'pending');
    }

    public function adminShowRejected(){
        $data = Post::where('status_id','3')->paginate(10);
        return view('admin.articles')->with('posts', $data)->with('status', 'rejected');
    }

    public function showCategoryUpdate($id){
        $post = Post::find($id);
        $category_data = Category::all();
        return view('posts.update_article_category')->with('post',$post)->with('category_data',$category_data);
    }

    public function articleCategoryUpdated(Request $request, $id){
        $post = Post::find($id);
        $post->category_id = $request->category;
        if ($post->update()) {
            return redirect('/admin/articles');
        }
    }

    public function verifyPending(Request $request){
        $id = $request->id;
        $new_status = $request->action;

        $data = Post::where('id',$id)->update(['status_id' => $new_status]);
        return redirect('/admin/articles');
    }

    public function destroyArticle(Request $request)
    {
        $id = $request->id;
        $post = Post::where('id',$id)->first();
        $post->delete();
        return redirect('/admin/articles');
    }
}
