<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;
use File;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hero = Hero::first();
        return view('admin.hero.index', compact('hero'));
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
            'title' => ['required', 'max:255'],
            'sub_title' => ['required', 'max:500'],
            'image' => ['max:5120', 'image'],
        ]);

        $hero = Hero::first();
        if ($request->hasFile('image')) {

            if ($hero && File::exists(public_path($hero->image))) {
                File::delete(public_path($hero->image));
            }

            $image = $request->file('image');
            $image_name = rand() . $image->getClientOriginalName();
            $image->move(public_path('/uploads'), $image_name);

            $image_path = '/uploads/' . $image_name;
        }

        Hero::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'btn_text' => $request->btn_text,
                'btn_url' => $request->btn_url,
                'image' => $image_path ?? $hero->image,
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
