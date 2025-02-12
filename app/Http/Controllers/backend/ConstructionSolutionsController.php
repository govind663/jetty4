<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Backend\ConstructionSolutionsRequest;
use App\Models\ConstructionSolutions;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ConstructionSolutionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $constructionSolutions = ConstructionSolutions::orderBy("id","desc")->whereNull('deleted_at')->get();
        
        return view('backend.construction-solutions.index', [
            'constructionSolutions' => $constructionSolutions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.construction-solutions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ConstructionSolutionsRequest $request)
    {
        $request->validated();
        try {

            $constructionSolutions = new ConstructionSolutions();

            // ==== Upload (image)
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/j4c_Group/construction-solutions/image'), $new_name);

                $image_path = "/j4c_Group/construction-solutions/image/" . $new_name;
                $constructionSolutions->image = $new_name;
            }

            $constructionSolutions->title = $request->title;
            $constructionSolutions->description = $request->description;
            $constructionSolutions->inserted_at = Carbon::now();
            $constructionSolutions->inserted_by = Auth::user()->id;
            $constructionSolutions->save();

            return redirect()->route('construction-solutions.index')->with('success','Construction Solutions has been successfully created.');

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
        $constructionSolutions = ConstructionSolutions::findOrFail($id);

        return view('backend.construction-solutions.edit', [
            'constructionSolutions' => $constructionSolutions
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ConstructionSolutionsRequest $request, string $id)
    {
        $request->validated();
        try {

            // Find the existing ConstructionSolutions record
            $constructionSolutions = ConstructionSolutions::findOrFail($id);

            // Check and upload the image
            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if ($constructionSolutions->image) {
                    $oldImagePath = public_path('/j4c_Group/construction-solutions/image/' . $constructionSolutions->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Delete the old image file
                    }
                }

                // Process the new image
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/j4c_Group/construction-solutions/image'), $new_name);

                // Update the banner object with the new image path
                $constructionSolutions->image = $new_name;
            }
            
            $constructionSolutions->title = $request->title;
            $constructionSolutions->description = $request->description;
            $constructionSolutions->modified_at = Carbon::now();
            $constructionSolutions->modified_by = Auth::user()->id;
            $constructionSolutions->save();

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('construction-solutions.index')->with('success', 'Construction Solutions updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();

        try {

            $constructionSolutions = ConstructionSolutions::findOrFail($id);
            $constructionSolutions->update($data);

            return redirect()->route('construction-solutions.index')->with('success','Construction Solutions has been successfully deleted.');
        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());
        }
    }
}   