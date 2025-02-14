<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Backend\CertificationRequest;
use App\Models\Certification;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CertificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $certifications = Certification::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.certifications.index', [
            'certifications' => $certifications
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.certifications.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CertificationRequest $request)
    {
        $request->validated();

        try {

            $certification = new Certification();

            // ==== Upload (image)
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/j4c_Group/certification/image'), $new_name);

                $image_path = "/j4c_Group/certification/image/" . $new_name;
                $certification->image = $new_name;
            }

            $certification->title = $request->title;
            $certification->description = $request->description;
            $certification->inserted_at = Carbon::now();
            $certification->inserted_by = Auth::user()->id;
            $certification->save();

            return redirect()->route('certification.index')->with('success','Certification has been successfully created.');

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

    /*
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $certification = Certification::findOrFail($id);

        return view('backend.certifications.edit', [
            'certification' => $certification
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CertificationRequest $request, string $id)
    {
        $request->validated();

        try {

            $certification = Certification::findOrFail($id);

            // Check and upload the image
            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if ($certification->image) {
                    $oldImagePath = public_path('/j4c_Group/certification/image/' . $certification->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Delete the old image file
                    }
                }

                // Process the new image
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/j4c_Group/certification/image'), $new_name);

                // Update the banner object with the new image path
                $certification->image = $new_name;
            }

            $certification->title = $request->title;
            $certification->description = $request->description;
            $certification->modified_at = Carbon::now();
            $certification->modified_by = Auth::user()->id;
            $certification->save();

            return redirect()->route('certification.index')->with('success','Certification has been successfully updated.');
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

            $certification = Certification::findOrFail($id);
            $certification->update($data);

            return redirect()->route('certification.index')->with('success','Certification has been successfully deleted.');
        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong  - '.$ex->getMessage());
        }
    }
}
