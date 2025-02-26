<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Backend\ProjectStatusDetailRequest;
use App\Models\ProjectStatusDetails;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ProjectStatusDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projectStatusDetails = ProjectStatusDetails::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.project-status-details.index', [
            'projectStatusDetails' => $projectStatusDetails
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.project-status-details.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectStatusDetailRequest $request)
    {
        $request->validated();

        try {

            $projectStatusDetails = new ProjectStatusDetails();

            $projectStatusDetails->title = $request->title;
            $projectStatusDetails->description = $request->description;
            $projectStatusDetails->inserted_at = Carbon::now();
            $projectStatusDetails->inserted_by = Auth::user()->id;
            $projectStatusDetails->save();

            return redirect()->route('project-status-details.index')->with('success','Project Status Details has been successfully created.');

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
        $projectStatusDetails = ProjectStatusDetails::findOrFail($id);

        return view('backend.project-status-details.edit', [
            'projectStatusDetails' => $projectStatusDetails
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectStatusDetailRequest $request, string $id)
    {
        $request->validated();
        try {

            $projectStatusDetails = ProjectStatusDetails::findOrFail($id);

            $projectStatusDetails->title = $request->title;
            $projectStatusDetails->description = $request->description;
            $projectStatusDetails->modified_at = Carbon::now();
            $projectStatusDetails->modified_by = Auth::user()->id;
            $projectStatusDetails->save();

            return redirect()->route('project-status-details.index')->with('success', 'Project Status Details has been successfully updated.');
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

            $projectStatusDetails = ProjectStatusDetails::findOrFail($id);
            $projectStatusDetails->update($data);

            return redirect()->route('project-status-details.index')->with('success','Project Status Details has been successfully deleted.');
        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());
        }
    }
}
