<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Backend\AboutCareerRequest;
use App\Models\AboutCareer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AboutCareerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about_career = AboutCareer::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.about_careers.index', [
            'about_career' => $about_career
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.about_careers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AboutCareerRequest $request)
    {
        $request->validated();

        try {

            $about_career = new AboutCareer();

            // ==== Upload (image)
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/j4c_Group/about_career/image'), $new_name);

                $image_path = "/j4c_Group/about_career/image/" . $new_name;
                $about_career->image = $new_name;
            }

            $about_career->title = $request->title;
            $about_career->description = $request->description;
            $about_career->inserted_at = Carbon::now();
            $about_career->inserted_by = Auth::user()->id;
            $about_career->save();

            return redirect()->route('about-career.index')->with('success','About Career has been successfully created.');

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
        $about_career = AboutCareer::find($id);

        return view('backend.about_careers.edit',[
            'about_career' => $about_career
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AboutCareerRequest $request, string $id)
    {
        $request->validated();

        try {

            $about_career = AboutCareer::find($id);

            // Check and upload the image
            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if ($about_career->image) {
                    $oldImagePath = public_path('/j4c_Group/about_career/image/' . $about_career->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Delete the old image file
                    }
                }

                // Process the new image
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/j4c_Group/about_career/image'), $new_name);

                // Update the banner object with the new image path
                $about_career->image = $new_name;
            }

            $about_career->title = $request->title;
            $about_career->description = $request->description;
            $about_career->modified_at = Carbon::now();
            $about_career->modified_by = Auth::user()->id;
            $about_career->save();

            return redirect()->route('about-career.index')->with('success','About Career has been successfully updated.');
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

            $about_career = AboutCareer::find($id);
            $about_career->update($data);

            return redirect()->route('about-career.index')->with('success','About Career has been successfully deleted.');
        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong  - '.$ex->getMessage());
        }
    }
}