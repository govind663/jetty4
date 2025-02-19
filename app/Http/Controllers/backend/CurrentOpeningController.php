<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Backend\CurrentOpeningRequest;
use App\Models\CurrentOpening;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CurrentOpeningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $current_openings = CurrentOpening::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.current_openings.index', [
            'current_openings' => $current_openings
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.current_openings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CurrentOpeningRequest $request)
    {
        $request->validated();
        try {

            $current_opening = new CurrentOpening();

            // ==== Upload (image)
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/j4c_Group/current_opening/image'), $new_name);

                $image_path = "/j4c_Group/current_opening/image/" . $new_name;
                $current_opening->document_file = $new_name;
            } else {
                $current_opening->document_file = '';
            }

            $current_opening->designation = $request->designation;
            $current_opening->location = $request->location;
            $current_opening->description = $request->description;
            $current_opening->status = $request->status;
            $current_opening->inserted_at = Carbon::now();
            $current_opening->inserted_by = Auth::user()->id;
            $current_opening->save();

            return redirect()->route('current-opening.index')->with('success','Current Opening has been successfully created.');

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
        $current_opening = CurrentOpening::findOrFail($id);

        return view('backend.current_openings.edit', [
            'current_opening' => $current_opening
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CurrentOpeningRequest $request, string $id)
    {
        $request->validated();
        try {

            // Find the existing OurMission record
            $current_opening = CurrentOpening::findOrFail($id);

            // Check and upload the image
            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if ($current_opening->image) {
                    $oldImagePath = public_path('/j4c_Group/current_opening/image/' . $current_opening->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Delete the old image file
                    }
                }

                // Process the new image
                $image = $request->file('image');
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/j4c_Group/current_opening/image'), $new_name);

                // Update the banner object with the new image path
                $current_opening->document_file = $new_name;
            }

            $current_opening->designation = $request->designation;
            $current_opening->location = $request->location;
            $current_opening->description = $request->description;
            $current_opening->status = $request->status;
            $current_opening->modified_at = Carbon::now();
            $current_opening->modified_by = Auth::user()->id;
            $current_opening->save();

            return redirect()->route('current-opening.index')->with('success', 'Current Opening updated successfully.');

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

            $current_opening = CurrentOpening::findOrFail($id);
            $current_opening->update($data);

            return redirect()->route('current-opening.index')->with('success','Current Opening has been successfully deleted.');
        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong  - '.$ex->getMessage());
        }
    }
}
