<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Backend\SafetyInitiativesRequest;
use App\Models\SafetyInitiatives;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SafetyInitiativesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $safetyinitiatives = SafetyInitiatives::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.safetyinitiatives.index', [
            'safetyinitiatives' => $safetyinitiatives
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.safetyinitiatives.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SafetyInitiativesRequest $request)
    {
        $request->validated();
        try {

            $safetyinitiatives = new SafetyInitiatives();

            // ==== Upload (image)
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/j4c_Group/safety_initiatives/image'), $new_name);

                $image_path = "/j4c_Group/safety_initiatives/image/" . $new_name;
                $safetyinitiatives->image = $new_name;
            } else {
                $safetyinitiatives->image = '';
            }

            // === Upload (icon)
            if ($request->hasFile('icon')) {
                $icon = $request->file('icon');
                $extension = $icon->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $icon->move(public_path('/j4c_Group/safety_initiatives/icon'), $new_name); // upload path

                $icon_path = "/j4c_Group/safety_initiatives/icon/" . $new_name;
                $safetyinitiatives->icon = $new_name;
            } else {
                $safetyinitiatives->icon = '';
            }

            $safetyinitiatives->title = $request->title;
            $safetyinitiatives->description = $request->description;
            $safetyinitiatives->status = $request->status;
            $safetyinitiatives->inserted_at = Carbon::now();
            $safetyinitiatives->inserted_by = Auth::user()->id;
            $safetyinitiatives->save();

            return redirect()->route('safety-initiatives.index')->with('success','Safety Initiatives has been successfully created.');

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
        $safetyinitiatives = SafetyInitiatives::find($id);

        return view('backend.safetyinitiatives.edit',[
            'safetyinitiatives' => $safetyinitiatives
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SafetyInitiativesRequest $request, string $id)
    {
        $request->validated();
        try {

            // Find the existing OurMission record
            $safetyinitiatives = SafetyInitiatives::find($id);

            // Check and upload the image
            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if ($safetyinitiatives->image) {
                    $oldImagePath = public_path('/j4c_Group/safety_initiatives/image/' . $safetyinitiatives->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Delete the old image file
                    }
                }

                // Process the new image
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/j4c_Group/safety_initiatives/image'), $new_name);

                // Update the banner object with the new image path
                $safetyinitiatives->image = $new_name;
            }

            // Check and upload the icon
            if ($request->hasFile('icon')) {
                // Delete the old icon if it exists
                if ($safetyinitiatives->icon) {
                    $oldIconPath = public_path('/j4c_Group/safety_initiatives/icon/' . $safetyinitiatives->icon);
                    if (file_exists($oldIconPath)) {
                        unlink($oldIconPath); // Delete the old icon file
                    }
                }

                // Process the new icon
                $icon = $request->file('icon');
                $extension = $icon->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $icon->move(public_path('/j4c_Group/safety_initiatives/icon'), $new_name);

                // Update the banner object with the new icon path
                $safetyinitiatives->icon = $new_name;
            }

            $safetyinitiatives->title = $request->title;
            $safetyinitiatives->description = $request->description;
            $safetyinitiatives->status = $request->status;
            $safetyinitiatives->modified_at = Carbon::now();
            $safetyinitiatives->modified_by = Auth::user()->id;
            $safetyinitiatives->save();

            return redirect()->route('safety-initiatives.index')->with('success', 'Safety Initiatives updated successfully.');

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

            $safetyinitiatives = SafetyInitiatives::findOrFail($id);
            $safetyinitiatives->update($data);

            return redirect()->route('safety-initiatives.index')->with('success','Safety Initiatives has been successfully deleted.');
        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong  - '.$ex->getMessage());
        }
    }
}
