<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;

class GeneralSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting =GeneralSetting::first();
        return view('admin.setting.general-setting.index', compact('setting'));
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
           'logo' => ['required', 'max: 5120', 'image'],
           'footer_logo' => ['required', 'max: 5120', 'image'],
           'favicon' => ['required', 'max: 5120', 'image'],
        ]);

        $setting = GeneralSetting::first();
        $logo = handle_upload('logo', $setting);
        $footer_logo = handle_upload('footer_logo', $setting);
        $favicon = handle_upload('favicon', $setting);

        // $general_setting = new GeneralSetting();
        // $general_setting->logo = $logo ?? $setting->logo;
        // $general_setting->footer_logo = $footer_logo ?? $setting->footer_logo;
        // $general_setting->favicon = $favicon ?? $setting->favicon;
        // $general_setting->save();

        GeneralSetting::updateOrCreate(
            ['id' => $id],
            [
                'logo' => $logo ?? $setting->logo,
                'footer_logo' => $footer_logo ?? $setting->footer_logo,
                'favicon' => $favicon ?? $setting->favicon,
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
