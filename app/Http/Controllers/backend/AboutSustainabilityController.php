<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Backend\AboutSustainabilityRequest;
use App\Models\AboutSustainability;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AboutSustainabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aboutSustainability = AboutSustainability::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.aboutsustainability.index', [
            'aboutSustainability' => $aboutSustainability
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.aboutsustainability.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AboutSustainabilityRequest $request)
    {
        $request->validated();

        try {

            $aboutSustainability = new AboutSustainability();

            // ==== Upload (image)
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/j4c_Group/about_sustainability/image'), $new_name);

                $image_path = "/j4c_Group/about_sustainability/image/" . $new_name;
                $aboutSustainability->image = $new_name;
            } else {
                $aboutSustainability->image = '';
            }

            $aboutSustainability->title = $request->title;
            $aboutSustainability->description = $request->description;
            $aboutSustainability->pillers_title = json_encode($request->pillers_title);
            $aboutSustainability->pillers_description = json_encode($request->pillers_description);
            $aboutSustainability->other_description = $request->other_description;
            $aboutSustainability->inserted_at = Carbon::now();
            $aboutSustainability->inserted_by = Auth::user()->id;
            $aboutSustainability->save();

            return redirect()->route('about-sustainability.index')->with('success','About Sustainability has been successfully created.');

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
        $aboutSustainability = AboutSustainability::find($id);

        // Decode JSON fields
        $pillers_title = json_decode($aboutSustainability->pillers_title, true);
        $pillers_description = json_decode($aboutSustainability->pillers_description, true);

        return view('backend.aboutsustainability.edit', [
            'aboutSustainability' => $aboutSustainability,
            'pillers_title' => $pillers_title,
            'pillers_description' => $pillers_description
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AboutSustainabilityRequest $request, string $id)
    {
        $request->validated();
        try {

            $aboutSustainability = AboutSustainability::findOrFail($id);

            // Check and upload the image
            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if ($aboutSustainability->image) {
                    $oldImagePath = public_path('/j4c_Group/about_sustainability/image/' . $aboutSustainability->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Delete the old image file
                    }
                }

                // Process the new image
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/j4c_Group/about_sustainability/image'), $new_name);

                // Update the banner object with the new image path
                $aboutSustainability->image = $new_name;
            }

            $aboutSustainability->title = $request->title;
            $aboutSustainability->description = $request->description;
            $aboutSustainability->pillers_title = json_encode($request->pillers_title);
            $aboutSustainability->pillers_description = json_encode($request->pillers_description);
            $aboutSustainability->other_description = $request->other_description;
            $aboutSustainability->modified_at = Carbon::now();
            $aboutSustainability->modified_by = Auth::user()->id;
            $aboutSustainability->save();

            return redirect()->route('about-sustainability.index')->with('success', 'About Sustainability has been successfully updated.');
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

            $aboutSustainability = AboutSustainability::findOrFail($id);
            $aboutSustainability->update($data);

            return redirect()->route('about-sustainability.index')->with('success','About Sustainability has been successfully deleted.');
        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());
        }
    }
}
