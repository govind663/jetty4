<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Backend\ProjecTypeRequest;
use App\Models\ProjectType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ProjectTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $project_types = ProjectType::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.project-type.index', [
            'project_types' => $project_types
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.project-type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjecTypeRequest $request)
    {
        $request->validated();

        try {

            $project_types = new ProjectType();

            // ==== Upload (breadcrumbs_image)
            if ($request->hasFile('breadcrumbs_image')) {
                $image = $request->file('breadcrumbs_image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/j4c_Group/projects/breadcrumbs_image'), $new_name);

                $image_path = "/j4c_Group/projects/breadcrumbs_image/" . $new_name;
                $project_types->breadcrumbs_image = $new_name;
            } else {
                $project_types->breadcrumbs_image = '';
            }

            $project_types->project_type = $request->project_type;
            $project_types->slug = $request->slug;
            $project_types->inserted_at = Carbon::now();
            $project_types->inserted_by = Auth::user()->id;
            $project_types->save();

            return redirect()->route('project-type.index')->with('success','Project Type has been successfully created.');

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
        $project_type = ProjectType::find($id);

        return view('backend.project-type.edit', [
            'project_type' => $project_type
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjecTypeRequest $request, string $id)
    {
        $request->validated();

        try {

            $project_types = ProjectType::find($id);

            // Check and upload the breadcrumbs_image
            if ($request->hasFile('breadcrumbs_image')) {
                // Delete the old image if it exists
                if ($project_types->breadcrumbs_image) {
                    $oldImagePath = public_path('/j4c_Group/projects/breadcrumbs_image/' . $project_types->breadcrumbs_image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Delete the old image file
                    }
                }

                // Process the new breadcrumbs_image
                $image = $request->file('breadcrumbs_image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/j4c_Group/projects/breadcrumbs_image'), $new_name);

                // Update the banner object with the new image path
                $project_types->breadcrumbs_image = $new_name;
            }

            $project_types->project_type = $request->project_type;
            $project_types->slug = $request->slug;
            $project_types->modified_at = Carbon::now();
            $project_types->modified_by = Auth::user()->id;
            $project_types->save();

            return redirect()->route('project-type.index')->with('success','Project Type has been successfully updated.');

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

            $project_types = ProjectType::findOrFail($id);
            $project_types->update($data);

            return redirect()->route('project-type.index')->with('success','Project Type has been successfully deleted.');
        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong  - '.$ex->getMessage());
        }
    }
}
