<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('showAll');   
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Returning Add view
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
        $validated = $request->validate([
            'name' => ['required','min:3','unique:categories']
        ]);

        //Adding New Category Form Backend
        $new_category = Category::create([
            'name' => $request->input('name')
        ]);

        return redirect('/admin/categories');
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
        //Edit method receives an id as a parameter
        //This function then will search the category based on the id
        //and return edit view with found category

        $data = Category::find($id);
        return view('categories.edit',[
            'data' => $data
        ]);
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
        //This is the backend for edit form
        //Select category with matching id and update it
        $validated = $request->validate([
            'name' => ['required','min:3','unique:categories']
        ]);

        $new_category = Category::where('id', $id)
            ->update([
                'name' => $request->input('name')
            ]);
        
        return redirect('/admin/categories');
    }

    public function showAll(){
        $categories = Category::Paginate(9);
        $post_counts = [];

        foreach ($categories as $category) {
            $category_post = Post::where('category_id',"=",$category->id)
                                ->where('status_id','=','2')
                                ->count();
            array_push($post_counts, $category_post);
        }

        $data=[
            'categories' => $categories,
            'post_counts' => $post_counts
        ];

        return view('categories.all', $data);
    }

    public function adminShowAll(){
        $categories = Category::Paginate(10);
        $post_counts = [];

        foreach ($categories as $category) {
            $category_post = Post::where('category_id',"=",$category->id)
                                ->where('status_id','=','2')
                                ->count();
            array_push($post_counts, $category_post);
        }

        $data=[
            'categories' => $categories,
            'post_counts' => $post_counts
        ];

        return view('admin.categories', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Delete form backend
        $data = Category::find($id);
        $data->delete();

        return back();
    }
}
