<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Backend\TeamsRequest;
use App\Models\Teams;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Teams::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.teams.index', [
            'teams' => $teams
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.teams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeamsRequest $request)
    {
        $request->validated();
        try {

            $team = new Teams();

            // ==== Upload (image)
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/j4c_Group/teams/image'), $new_name);

                $image_path = "/j4c_Group/teams/image/" . $new_name;
                $team->image = $new_name;
            }

            $team->title = $request->title;
            $team->description = $request->description;
            $team->inserted_at = Carbon::now();
            $team->inserted_by = Auth::user()->id;
            $team->save();

            return redirect()->route('teams.index')->with('success','Teams has been successfully created.');

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
        $teams = Teams::findOrFail($id);

        return view('backend.teams.edit', [
            'teams'=> $teams
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeamsRequest $request, string $id)
    {
        $request->validated();
        try {

            $teams = Teams::findOrFail($id);

            // Check and upload the image
            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if ($teams->image) {
                    $oldImagePath = public_path('/j4c_Group/teams/image/' . $teams->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Delete the old image file
                    }
                }

                // Process the new image
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/j4c_Group/teams/image/'), $new_name);

                // Update the banner object with the new image path
                $teams->image = $new_name;
            }

            $teams->title = $request->title;
            $teams->description = $request->description;
            $teams->modified_at = Carbon::now();
            $teams->modified_by = Auth::user()->id;
            $teams->save();

            return redirect()->route('teams.index')->with('success', 'Teams has been updated successfully.');

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

            $teams = Teams::findOrFail($id);
            $teams->update($data);

            return redirect()->route('teams.index')->with('success','Teams has been successfully deleted.');
        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());
        }
    }
}
