<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $experience = Experience::first();
        return view('admin.experience.index', compact('experience'));
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
           'image' => ['image', 'max:5120'],
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:1024'],
            'phone' => ['nullable', 'max:100'],
            'email' => ['nullable', 'max:100', 'email'],
        ]);

        $experience = Experience::first();
        $image_path = handle_upload('image', $experience);

        Experience::updateOrCreate(
            ['id' => $id],
            [
                'image' => $image_path ?? $experience->image, // (!empty($image_path) ? $image_path : $experience->image)
                'title' => $request->title,
                'description' => $request->description,
                'phone' => $request->phone,
                'email' => $request->email,
            ],

        );

        toastr()->success('Updated Successfully!');

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
