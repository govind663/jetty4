<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Backend\AwardRequest;
use App\Models\Award;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AwardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $award = Award::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.awards.index', [
            'award' => $award
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.awards.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AwardRequest $request)
    {
        $request->validated();

        try {

            $award = new Award();

            // ==== Upload (image)
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/j4c_Group/award/image'), $new_name);

                $image_path = "/j4c_Group/award/image/" . $new_name;
                $award->image = $new_name;
            }

            $award->title = $request->title;
            $award->description = $request->description;
            $award->inserted_at = Carbon::now();
            $award->inserted_by = Auth::user()->id;
            $award->save();

            return redirect()->route('award.index')->with('success','Award has been successfully created.');

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
        $award = Award::findOrFail($id);;

        return view('backend.awards.edit', [
            'award' => $award
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AwardRequest $request, string $id)
    {
        $request->validated();

        try {

            $award = Award::findOrFail($id);

            // Check and upload the image
            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if ($award->image) {
                    $oldImagePath = public_path('/j4c_Group/award/image/' . $award->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Delete the old image file
                    }
                }

                // Process the new image
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/j4c_Group/award/image'), $new_name);

                // Update the banner object with the new image path
                $award->image = $new_name;
            }

            $award->title = $request->title;
            $award->description = $request->description;
            $award->modified_at = Carbon::now();
            $award->modified_by = Auth::user()->id;
            $award->save();

            return redirect()->route('award.index')->with('success','Award has been successfully updated.');
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

            $award = Award::findOrFail($id);
            $award->update($data);

            return redirect()->route('award.index')->with('success','Award has been successfully deleted.');
        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong  - '.$ex->getMessage());
        }
    }
}