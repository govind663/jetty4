<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Backend\UniqueApproachRequest;
use App\Models\UniqueApproach;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UniqueApproachController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $uniqueApproaches = UniqueApproach::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.unique-approaches.index', [
            'uniqueApproaches' => $uniqueApproaches
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.unique-approaches.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UniqueApproachRequest $request)
    {
        $request->validated();
        try {

            $uniqueApproach = new UniqueApproach();

            // ==== Upload (image)
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/j4c_Group/unique-approaches/image'), $new_name);

                $image_path = "/j4c_Group/unique-approaches/image/" . $new_name;
                $uniqueApproach->image = $new_name;
            } else {
                $uniqueApproach->image = '';
            }

            $uniqueApproach->title = $request->title;
            $uniqueApproach->description = $request->description;
            $uniqueApproach->service_name = json_encode($request->service_name);
            $uniqueApproach->service_description = json_encode($request->service_description);
            $uniqueApproach->inserted_at = Carbon::now();
            $uniqueApproach->inserted_by = Auth::user()->id;
            $uniqueApproach->save();

            return redirect()->route('unique-approach.index')->with('success','Unique Approach has been successfully created.');

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
        $uniqueApproach = UniqueApproach::find($id);
        
        return view('backend.unique-approaches.edit',[
            'uniqueApproach' => $uniqueApproach
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UniqueApproachRequest $request, string $id)
    {
        $request->validated();
        try {

            $uniqueApproach = UniqueApproach::find($id);

             // Check and upload the image
             if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if ($uniqueApproach->image) {
                    $oldImagePath = public_path('/j4c_Group/unique-approaches/image/' . $uniqueApproach->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Delete the old image file
                    }
                }

                // Process the new image
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/j4c_Group/unique-approaches/image'), $new_name);

                // Update the banner object with the new image path
                $uniqueApproach->image = $new_name;
            }

            $uniqueApproach->title = $request->title;
            $uniqueApproach->description = $request->description;
            $uniqueApproach->service_name = json_encode($request->service_name);
            $uniqueApproach->service_description = json_encode($request->service_description);
            $uniqueApproach->modified_at = Carbon::now();
            $uniqueApproach->modified_by = Auth::user()->id;
            $uniqueApproach->save();

            return redirect()->route('unique-approach.index')->with('success','Unique Approach has been successfully updated.');

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

            $uniqueApproach = UniqueApproach::find($id);
            $uniqueApproach->update($data);

            return redirect()->route('unique-approach.index')->with('success','Unique Approach has been successfully deleted.');
        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());
        }
    }
}
