<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Backend\AboutJ4cRequest;
use App\Models\AboutJ4C;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AboutJ4cController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aboutj4c = AboutJ4C::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.aboutj4c.index', [
            'aboutj4c' => $aboutj4c
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.aboutj4c.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AboutJ4cRequest $request)
    {
        $request->validated();

        try {

            $aboutj4c = new AboutJ4C();

            // ==== Upload (image)
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/j4c_Group/about-us/image'), $new_name);

                $image_path = "/j4c_Group/about-us/image/" . $new_name;
                $aboutj4c->image = $new_name;
            } else {
                $aboutj4c->image = '';
            }

            $aboutj4c->title = $request->title;
            $aboutj4c->description = $request->description;
            $aboutj4c->inserted_at = Carbon::now();
            $aboutj4c->inserted_by = Auth::user()->id;
            $aboutj4c->save();

            return redirect()->route('about-j4c.index')->with('success','About J4C has been successfully created.');

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
        $aboutj4c = AboutJ4C::findOrFail($id);

        return view('backend.aboutj4c.edit', [
            'aboutj4c' => $aboutj4c
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AboutJ4cRequest $request, string $id)
    {
        $request->validated();
        try {

            $aboutj4c = AboutJ4C::findOrFail($id);

            // Check and upload the image
            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if ($aboutj4c->image) {
                    $oldImagePath = public_path('/j4c_Group/about-us/image/' . $aboutj4c->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Delete the old image file
                    }
                }

                // Process the new image
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/j4c_Group/about-us/image'), $new_name);

                // Update the banner object with the new image path
                $aboutj4c->image = $new_name;
            }

            $aboutj4c->title = $request->title;
            $aboutj4c->description = $request->description;
            $aboutj4c->modified_at = Carbon::now();
            $aboutj4c->modified_by = Auth::user()->id;
            $aboutj4c->save();

            return redirect()->route('about-j4c.index')->with('success', 'About J4C has been successfully updated.');
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

            $aboutj4c = AboutJ4C::findOrFail($id);
            $aboutj4c->update($data);

            return redirect()->route('about-j4c.index')->with('success','About J4C has been successfully deleted.');
        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());
        }
    }
}
