<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BlogDataTable;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BlogDataTable $dataTable)
    {
        return $dataTable->render('admin.blog.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = BlogCategory::all();
        return view('admin.blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required', 'image', 'max:5120'],
            'title' => ['required', 'max:255'],
            'description' => ['required'],
            'category' => ['required', 'numeric'],
        ]);

        $image_path = handle_upload('image');

        $blog = new Blog();
        $blog->image = $image_path;
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->category = $request->category;
        $blog->save();

        toastr()->success('Created Successfully!');

        return redirect()->route('admin.blog.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = BlogCategory::all();
        $blog = Blog::findOrfail($id);
        return view('admin.blog.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => ['image', 'max:5120'],
            'title' => ['required', 'max:255'],
            'description' => ['required'],
            'category' => ['required', 'numeric'],
        ]);

        $blog = Blog::findOrFail($id);

        $image_path = handle_upload('image', $blog);

        $blog->image = $image_path ?? $blog->image;
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->category = $request->category;
        $blog->save();

        toastr()->success('Updated Successfully!');

        return redirect()->route('admin.blog.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::findOrFail($id);
        delete_file_exists($blog->image);
        $blog->delete();
    }
}
