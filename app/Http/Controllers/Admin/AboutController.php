<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::first();
        return view('admin.about.index', compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => ['required', 'max:200'],
            'description' => ['required', 'max:5000'],
            'image' => ['image', 'max:5000'],
            'resume' => ['mimes:pdf,csv,text', 'max:10000'],

        ]);

        $about = About::first();
        $image_path = handle_upload('image', $about);
        $resume_path = handle_upload('resume', $about);

        About::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'description' => $request->description,
                'image' => $image_path ?? $about->image,
                'resume' => $resume_path ?? $about->resume,
            ],

        );

        toastr()->success('Updated Successfully!');

        return redirect()->back();
    }

    public function resume_download()
    {
        $about =About::first();
        return response()->download(public_path($about->resume));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
