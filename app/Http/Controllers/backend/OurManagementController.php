<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Backend\OurManagementRequest;
use App\Models\OurManagement;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class OurManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ourManagements = OurManagement::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.our-managements.index', [
            'ourManagements' => $ourManagements
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.our-managements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OurManagementRequest $request)
    {
        $request->validated();

        try {

            $ourManagement = new OurManagement();

            // ==== Upload (image)
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/j4c_Group/our-managements/image'), $new_name);

                $image_path = "/j4c_Group/our-managements/image/" . $new_name;
                $ourManagement->image = $new_name;
            } else {
                $ourManagement->image = '';
            }


            // Check if new quality_icon are uploaded
            if ($request->hasFile('quality_icon')) {
                // Add new quality_icon to the paths array
                foreach ($request->file('quality_icon') as $image) {
                    // Generate a unique filename using time() and rand()
                    $new_name = time() . rand(10, 999) . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('/j4c_Group/our-managements/quality_icon'), $new_name);
                    $qualityIconPaths[] = $new_name; // Add the new quality_icon to the array
                }
            }

            // Update the quality_icon with the new image paths
            $ourManagement->quality_icon = json_encode($qualityIconPaths);

            $ourManagement->title = $request->title;
            $ourManagement->description = $request->description;
            $ourManagement->quality_title = json_encode($request->quality_title);
            $ourManagement->quality_description = json_encode($request->quality_description);
            $ourManagement->inserted_at = Carbon::now();
            $ourManagement->inserted_by = Auth::user()->id;
            $ourManagement->save();

            return redirect()->route('our-management.index')->with('success','Our Management has been successfully created.');

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
        $ourManagement = OurManagement::find($id);

        return view('backend.our-managements.edit',[
            'ourManagement' => $ourManagement
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OurManagementRequest $request, string $id)
    {
        $request->validated();
        
        try {

            $ourManagement = OurManagement::find($id);

             // Check and upload the image
             if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if ($ourManagement->image) {
                    $oldImagePath = public_path('/j4c_Group/our-managements/image/' . $ourManagement->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Delete the old image file
                    }
                }

                // Process the new image
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/j4c_Group/our-managements/image'), $new_name);

                // Update the banner object with the new image path
                $ourManagement->image = $new_name;
            }

            // Handle existing quality_icon
            $existingQualityIcons = $request->input('existing_quality_icon', []);
            $storedQualityIcons = json_decode($ourManagement->quality_icon, true) ?? [];
            $uploadedQualityIcons = [];

            if ($request->hasFile('quality_icon')) {
                foreach ($request->file('quality_icon') as $image) {
                    $new_name = time() . rand(10, 999) . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('/j4c_Group/our-managements/quality_icon'), $new_name);
                    $uploadedQualityIcons[] = $new_name;
                }
            }

            // Merge existing and new icons
            $allQualityIcons = array_merge($existingQualityIcons, $uploadedQualityIcons);
            $iconsToDelete = array_diff($storedQualityIcons, $existingQualityIcons);

            // Delete removed quality_icon
            foreach ($iconsToDelete as $oldIcon) {
                $iconPath = public_path("/j4c_Group/our-managements/quality_icon/{$oldIcon}");
                if (file_exists($iconPath)) {
                    unlink($iconPath);
                }
            }

            $ourManagement->quality_icon = json_encode(array_unique($allQualityIcons));

            $ourManagement->title = $request->title;
            $ourManagement->description = $request->description;
            $ourManagement->quality_title = json_encode($request->quality_title);
            $ourManagement->quality_description = json_encode($request->quality_description);
            $ourManagement->modified_at = Carbon::now();
            $ourManagement->modified_by = Auth::user()->id;
            $ourManagement->save();

            return redirect()->route('our-management.index')->with('success','Our Management has been successfully updated.');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong  - '.$ex->getMessage());
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

            $ourManagement = OurManagement::find($id);
            $ourManagement->update($data);

            return redirect()->route('our-management.index')->with('success','Our Management has been successfully deleted.');
        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());
        }
    }
}
