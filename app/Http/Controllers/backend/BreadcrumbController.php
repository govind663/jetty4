<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Backend\BreadcrumbRequest;
use App\Models\Breadcrumb;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BreadcrumbController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbs = Breadcrumb::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.breadcrumbs.index', [
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.breadcrumbs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BreadcrumbRequest $request)
    {
        $request->validated();
        try {

            $breadcrumb = new Breadcrumb();

            // ==== Upload (breadcrumb_image)
            if ($request->hasFile('breadcrumb_image')) {
                $image = $request->file('breadcrumb_image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/j4c_Group/breadcrumb_image'), $new_name);

                $image_path = "/j4c_Group/breadcrumb_image/" . $new_name;
                $breadcrumb->breadcrumb_image = $new_name;
            }

            $breadcrumb->breadcrumb_title = $request->breadcrumb_title;
            $breadcrumb->page_type = $request->page_type;
            $breadcrumb->status = $request->status;
            $breadcrumb->inserted_at = Carbon::now();
            $breadcrumb->inserted_by = Auth::user()->id;
            $breadcrumb->save();

            return redirect()->route('breadcrumb.index')->with('success','Breadcrumb has been successfully created.');

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
        $breadcrumb = Breadcrumb::findOrFail($id);

        return view('backend.breadcrumbs.edit', [
            'breadcrumb' => $breadcrumb
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BreadcrumbRequest $request, string $id)
    {
        $request->validated();
        try {
            
            $breadcrumb = Breadcrumb::findOrFail($id);

            // Check and upload the breadcrumb_image
            if ($request->hasFile('breadcrumb_image')) {
                // Delete the old image if it exists
                if ($breadcrumb->breadcrumb_image) {
                    $oldImagePath = public_path('/j4c_Group/breadcrumb_image/' . $breadcrumb->breadcrumb_image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Delete the old image file
                    }
                }

                // Process the new image
                $image = $request->file('breadcrumb_image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/j4c_Group/breadcrumb_image/'), $new_name);

                // Update the banner object with the new image path
                $breadcrumb->breadcrumb_image = $new_name;
            }

            $breadcrumb->breadcrumb_title = $request->breadcrumb_title;
            $breadcrumb->page_type = $request->page_type;
            $breadcrumb->status = $request->status;
            $breadcrumb->modified_at = Carbon::now();
            $breadcrumb->modified_by = Auth::user()->id;
            $breadcrumb->save();

            return redirect()->route('breadcrumb.index')->with('success', 'Breadcrumb has been successfully updated.');

        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Something went wrong while updating the breadcrumb. Please try again.');
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

            $breadcrumb = Breadcrumb::findOrFail($id);
            $breadcrumb->update($data);

            return redirect()->route('breadcrumb.index')->with('success','Breadcrumb has been successfully deleted.');
        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());
        }
    }
}
