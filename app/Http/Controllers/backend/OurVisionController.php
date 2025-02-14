<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Backend\OurVisionRequest;
use App\Models\OurVission;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class OurVisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ourvision = OurVission::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.ourvision.index', [
            'ourvision' => $ourvision
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.ourvision.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OurVisionRequest $request)
    {
        $request->validated();
        try {

            $ourvision = new OurVission();

            // ==== Upload (image)
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/j4c_Group/our-vision/image'), $new_name);

                $image_path = "/j4c_Group/our-vision/image/" . $new_name;
                $ourvision->image = $new_name;
            } else {
                $ourvision->image = '';
            }

            // === Upload (icon)
            if ($request->hasFile('icon')) {
                $icon = $request->file('icon');
                $extension = $icon->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $icon->move(public_path('/j4c_Group/our-vision/icon'), $new_name); // upload path

                $icon_path = "/j4c_Group/our-vision/icon/" . $new_name;
                $ourvision->icon = $new_name;
            } else {
                $ourvision->icon = '';
            }

            $ourvision->title = $request->title;
            $ourvision->description = $request->description;
            $ourvision->inserted_at = Carbon::now();
            $ourvision->inserted_by = Auth::user()->id;
            $ourvision->save();

            return redirect()->route('our-vision.index')->with('success','Our Vision has been successfully created.');

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
        $ourvision = ourvission::findOrFail($id);

        return view('backend.ourvision.edit', [
            'ourvision' => $ourvision
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OurVisionRequest $request, string $id)
    {
        $request->validated();
        try {

            // Find the existing OurMission record
            $ourvision = OurVission::findOrFail($id);

            // Check and upload the image
            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if ($ourvision->image) {
                    $oldImagePath = public_path('/j4c_Group/our-vision/image/' . $ourvision->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Delete the old image file
                    }
                }

                // Process the new image
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/j4c_Group/our-vision/image'), $new_name);

                // Update the banner object with the new image path
                $ourvision->image = $new_name;
            }

            // Check and upload the icon
            if ($request->hasFile('icon')) {
                // Delete the old icon if it exists
                if ($ourvision->icon) {
                    $oldIconPath = public_path('/j4c_Group/our-vission/icon/' . $ourvision->icon);
                    if (file_exists($oldIconPath)) {
                        unlink($oldIconPath); // Delete the old icon file
                    }
                }

                // Process the new icon
                $icon = $request->file('icon');
                $extension = $icon->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $icon->move(public_path('/j4c_Group/our-vission/icon'), $new_name);

                // Update the banner object with the new icon path
                $ourvision->icon = $new_name;
            }

            $ourvision->title = $request->title;
            $ourvision->description = $request->description;
            $ourvision->modified_at = Carbon::now();
            $ourvision->modified_by = Auth::user()->id;
            $ourvision->save();

            return redirect()->route('our-vission.index')->with('success', 'Our Vission updated successfully.');

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

            $ourvision = OurVission::findOrFail($id);
            $ourvision->update($data);

            return redirect()->route('our-vission.index')->with('success','Our Vission has been successfully deleted.');
        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong  - '.$ex->getMessage());
        }
    }
}
