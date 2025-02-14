<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Backend\AssociateRequest;
use App\Models\Associate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AssociateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $associates = Associate::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.associates.index', [
            'associates' => $associates
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.associates.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AssociateRequest $request)
    {
        $request->validated();

        try {

            $associate = new Associate();

            // Check if new images are uploaded
            if ($request->hasFile('image')) {
                // Add new images to the paths array
                foreach ($request->file('image') as $image) {
                    // Generate a unique filename using time() and rand()
                    $new_name = time() . rand(10, 999) . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('/j4c_Group/associates/image'), $new_name);
                    $imagePaths[] = $new_name; // Add the new image to the array
                }
            }

            // Update the image with the new image paths
            $associate->image = json_encode($imagePaths);

            $associate->title = $request->title;
            $associate->description = $request->description;
            $associate->inserted_at = Carbon::now();
            $associate->inserted_by = Auth::user()->id;
            $associate->save();

            return redirect()->route('associates.index')->with('success','Associate has been successfully created.');

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
        $associate = Associate::findOrFail($id);

        return view('backend.associates.edit', [
            'associate' => $associate
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AssociateRequest $request, string $id)
    {
        $request->validated();
        try {

            $associate = Associate::findOrFail($id);

            // Retrieve existing images from request or use an empty array
            $existingImages = $request->input('existing_images', []);

            // Decode stored images from the database (if any)
            $storedImages = json_decode($associate->image, true) ?? [];

            // Initialize an array to store new image paths
            $uploadedImages = [];

            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $image) {
                    // Generate a unique filename
                    $new_name = time() . rand(10, 999) . '.' . $image->getClientOriginalExtension();

                    // Move uploaded file to the specified directory
                    $image->move(public_path('/j4c_Group/associates/image'), $new_name);

                    // Add the new image path to the array
                    $uploadedImages[] = $new_name;
                }
            }

            // Merge existing images with new uploads
            $allImages = array_merge($existingImages, $uploadedImages);

            // Find images that are removed (not in the updated list)
            $imagesToDelete = array_diff($storedImages, $existingImages);

            // Delete old images from storage if they are removed
            foreach ($imagesToDelete as $oldImage) {
                $imagePath = public_path("/j4c_Group/associates/image/{$oldImage}");
                if (file_exists($imagePath)) {
                    unlink($imagePath); // Delete file
                }
            }

            // Update the associate record with new images
            $associate->image = json_encode(array_unique($allImages)); // Ensure no duplicates

            $associate->title = $request->title;
            $associate->description = $request->description;
            $associate->modified_at = Carbon::now();
            $associate->modified_by = Auth::user()->id;
            $associate->save();

            return redirect()->route('associates.index')->with('success', 'Associate has been successfully updated.');
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

            $associate = Associate::findOrFail($id);
            $associate->update($data);

            return redirect()->route('associates.index')->with('success','Associate has been successfully deleted.');
        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());
        }
    }
}
