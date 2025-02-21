<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Backend\ProjectsRequest;
use App\Models\ProjectType;
use App\Models\Projects;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Projects::with('projectType')->orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.projects.index', [
            'projects' => $projects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $project_types = ProjectType::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.projects.create',[
            'project_types' => $project_types
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectsRequest $request)
    {
        $request->validated();
        try {

            $project = new Projects();

            // ==== Upload (image)
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/j4c_Group/projects/image'), $new_name);

                $image_path = "/j4c_Group/projects/image/" . $new_name;
                $project->image = $new_name;
            } else {
                $project->image = '';
            }

            $project->project_name = $request->project_name;
            $project->slug = $request->slug;
            $project->project_location = $request->project_location;
            $project->project_type_id = $request->project_type_id;
            $project->project_status = $request->project_status;
            $project->inserted_at = Carbon::now();
            $project->inserted_by = Auth::user()->id;
            $project->save();

            return redirect()->route('projects.index')->with('success','Project has been successfully created.');

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
        $project = Projects::findOrFail($id);
        $project_types = ProjectType::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.projects.edit', [
            'project' => $project,
            'project_types' => $project_types
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectsRequest $request, string $id)
    {
        $request->validated();
        try {

            // Find the existing project record
            $project = Projects::findOrFail($id);

            // Check and upload the image
            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if ($project->image) {
                    $oldImagePath = public_path('/j4c_Group/projects/image/' . $project->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Delete the old image file
                    }
                }

                // Process the new image
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/j4c_Group/projects/image'), $new_name);

                // Update the banner object with the new image path
                $project->image = $new_name;
            }

            $project->project_name = $request->project_name;
            $project->slug = $request->slug;
            $project->project_location = $request->project_location;
            $project->project_type_id = $request->project_type_id;
            $project->project_status = $request->project_status;
            $project->modified_at = Carbon::now();
            $project->modified_by = Auth::user()->id;
            $project->save();

            return redirect()->route('projects.index')->with('success', 'Project updated successfully.');

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

            $project = Projects::findOrFail($id);
            $project->update($data);

            return redirect()->route('projects.index')->with('success','Project has been successfully deleted.');
        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong  - '.$ex->getMessage());
        }
    }
}
