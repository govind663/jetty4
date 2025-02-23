<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Backend\ProjectDetailsRequest;
use App\Models\Projects;
use App\Models\ProjectDetails;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ProjectDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projectDetails = ProjectDetails::with('projectName')->orderBy("id","desc")->whereNull('deleted_at')->get();
        // dd($projectDetails);

        return view('backend.project-details.index', [
            'projectDetails' => $projectDetails
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Projects::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.project-details.create',[
            'projects' => $projects
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectDetailsRequest $request)
    {
        $request->validated();

        try {

            $projectDetails = new ProjectDetails();

            // Check if new images are uploaded
            if ($request->hasFile('image')) {
                // Add new images to the paths array
                foreach ($request->file('image') as $image) {
                    // Generate a unique filename using time() and rand()
                    $new_name = time() . rand(10, 999) . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('/j4c_Group/project_details/image'), $new_name);
                    $imagePaths[] = $new_name; // Add the new image to the array
                }
            }

            // Update the image with the new image paths
            $projectDetails->image = json_encode($imagePaths);

            $projectDetails->projects_id = $request->projects_id;
            $projectDetails->project_slug = $request->slug;
            $projectDetails->built_up_area = $request->built_up_area;
            $projectDetails->it_load = $request->it_load;
            $projectDetails->developers = $request->developers;
            $projectDetails->client_name = $request->client_name;
            $projectDetails->structural_consultant = $request->structural_consultant;
            $projectDetails->architect = $request->architect;
            $projectDetails->inserted_at = Carbon::now();
            $projectDetails->inserted_by = Auth::user()->id;
            $projectDetails->save();

            return redirect()->route('project-details.index')->with('success','Project Details has been successfully created.');

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
        $projectDetails = ProjectDetails::findOrFail($id);

        $projects = Projects::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.project-details.edit', [
            'projectDetails' => $projectDetails,
            'projects' => $projects
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectDetailsRequest $request, string $id)
    {
        $request->validated();
        try {

            $projectDetails = ProjectDetails::findOrFail($id);

            // Retrieve existing images from request or use an empty array
            $existingImages = $request->input('existing_project_gallery_images', []);

            // Decode stored images from the database (if any)
            $storedImages = json_decode($projectDetails->image, true) ?? [];

            // Initialize an array to store new image paths
            $uploadedImages = [];

            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $image) {
                    // Generate a unique filename
                    $new_name = time() . rand(10, 999) . '.' . $image->getClientOriginalExtension();

                    // Move uploaded file to the specified directory
                    $image->move(public_path('/j4c_Group/project_details/image'), $new_name);

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
                $imagePath = public_path("/j4c_Group/project_details/image/{$oldImage}");
                if (file_exists($imagePath)) {
                    unlink($imagePath); // Delete file
                }
            }

            // Update the associate record with new images
            $projectDetails->image = json_encode(array_unique($allImages)); // Ensure no duplicates

            $projectDetails->projects_id = $request->projects_id;
            $projectDetails->project_slug = $request->slug;
            $projectDetails->built_up_area = $request->built_up_area;
            $projectDetails->it_load = $request->it_load;
            $projectDetails->developers = $request->developers;
            $projectDetails->client_name = $request->client_name;
            $projectDetails->structural_consultant = $request->structural_consultant;
            $projectDetails->architect = $request->architect;
            $projectDetails->modified_at = Carbon::now();
            $projectDetails->modified_by = Auth::user()->id;
            $projectDetails->save();

            return redirect()->route('project-details.index')->with('success', 'Project Details has been successfully updated.');
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

            $projectDetails = ProjectDetails::findOrFail($id);
            $projectDetails->update($data);

            return redirect()->route('project-details.index')->with('success','Project Details has been successfully deleted.');
        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());
        }
    }

    public function fetchProjectSlug(Request $request)
    {
        $project_slug = Projects::find($request->projects_id);
        $slug = $project_slug->slug;

        if ($project_slug) {
            return response()->json(['slug' => $slug]);
        } else {
            return response()->json(['slug' => null]);
        }
    }
}
