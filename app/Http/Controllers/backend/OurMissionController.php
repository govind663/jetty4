<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Backend\OurMissionRequest;
use App\Models\OurMission;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class OurMissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ourmission = OurMission::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.ourmission.index', [
            'ourmission' => $ourmission
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.ourmission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OurMissionRequest $request)
    {
        $request->validated();
        try {

            $ourmission = new OurMission();

            // ==== Upload (image)
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/j4c_Group/our-mission/image'), $new_name);

                $image_path = "/j4c_Group/our-mission/image/" . $new_name;
                $ourmission->image = $new_name;
            } else {
                $ourmission->image = '';
            }

            // === Upload (icon)
            if ($request->hasFile('icon')) {
                $icon = $request->file('icon');
                $extension = $icon->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $icon->move(public_path('/j4c_Group/our-mission/icon'), $new_name); // upload path

                $icon_path = "/j4c_Group/our-mission/icon/" . $new_name;
                $ourmission->icon = $new_name;
            } else {
                $ourmission->icon = '';
            }

            $ourmission->title = $request->title;
            $ourmission->description = $request->description;
            $ourmission->inserted_at = Carbon::now();
            $ourmission->inserted_by = Auth::user()->id;
            $ourmission->save();

            return redirect()->route('our-mission.index')->with('success','Our Mission has been successfully created.');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong  - '.$ex->getMessage());
        }
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
        $ourmission = OurMission::find($id);

        return view('backend.ourmission.edit', [
            'ourmission' => $ourmission
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OurMissionRequest $request, string $id)
    {
        $request->validated();
        try {

            // Find the existing OurMission record
            $ourmission = OurMission::findOrFail($id);

            // Check and upload the image
            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if ($ourmission->image) {
                    $oldImagePath = public_path('/j4c_Group/our-mission/image/' . $ourmission->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Delete the old image file
                    }
                }

                // Process the new image
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/j4c_Group/our-mission/image'), $new_name);

                // Update the banner object with the new image path
                $ourmission->image = $new_name;
            }

            // Check and upload the icon
            if ($request->hasFile('icon')) {
                // Delete the old icon if it exists
                if ($ourmission->icon) {
                    $oldIconPath = public_path('/j4c_Group/our-mission/icon/' . $ourmission->icon);
                    if (file_exists($oldIconPath)) {
                        unlink($oldIconPath); // Delete the old icon file
                    }
                }

                // Process the new icon
                $icon = $request->file('icon');
                $extension = $icon->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $icon->move(public_path('/j4c_Group/our-mission/icon'), $new_name);

                // Update the banner object with the new icon path
                $ourmission->icon = $new_name;
            }

            $ourmission->title = $request->title;
            $ourmission->description = $request->description;
            $ourmission->modified_at = Carbon::now();
            $ourmission->modified_by = Auth::user()->id;
            $ourmission->save();

            return redirect()->route('our-mission.index')->with('success', 'Our Mission updated successfully.');

        } catch (\Exception $e) {

            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {

            $ourmission = OurMission::findOrFail($id);
            $ourmission->update($data);

            return redirect()->route('our-mission.index')->with('success','Our Mission has been successfully deleted.');
        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong  - '.$ex->getMessage());
        }
    }
}
