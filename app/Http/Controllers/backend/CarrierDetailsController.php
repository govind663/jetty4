<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Backend\CarrierDetailsRequest;
use App\Models\CarrierDetails;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CarrierDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carrier_details = CarrierDetails::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.carrier_details.index', [
            'carrier_details' => $carrier_details
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.carrier_details.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarrierDetailsRequest $request)
    {
        $request->validated();

        try {

            $carrier_details = new CarrierDetails();

            // ==== Upload (image)
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/j4c_Group/carrier_details/image'), $new_name);

                $image_path = "/j4c_Group/carrier_details/image/" . $new_name;
                $carrier_details->image = $new_name;
            }

            $carrier_details->title = $request->title;
            $carrier_details->description = $request->description;
            $carrier_details->other_description = $request->other_description;
            $carrier_details->inserted_at = Carbon::now();
            $carrier_details->inserted_by = Auth::user()->id;
            $carrier_details->save();

            return redirect()->route('carrier-details.index')->with('success','Carrier Details has been successfully created.');

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
        $carrier_details = CarrierDetails::findOrFail($id);

        return view('backend.carrier_details.edit', [
            'carrier_details' => $carrier_details
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarrierDetailsRequest $request, string $id)
    {
        $request->validated();

        try {

            $carrier_details = CarrierDetails::findOrFail($id);

            // Check and upload the image
            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if ($carrier_details->image) {
                    $oldImagePath = public_path('/j4c_Group/carrier_details/image/' . $carrier_details->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Delete the old image file
                    }
                }

                // Process the new image
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/j4c_Group/carrier_details/image'), $new_name);

                // Update the banner object with the new image path
                $carrier_details->image = $new_name;
            }

            $carrier_details->title = $request->title;
            $carrier_details->description = $request->description;
            $carrier_details->modified_at = Carbon::now();
            $carrier_details->modified_by = Auth::user()->id;
            $carrier_details->save();

            return redirect()->route('carrier-details.index')->with('success','Carrier Details has been successfully updated.');
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

            $carrier_details = CarrierDetails::findOrFail($id);
            $carrier_details->update($data);

            return redirect()->route('carrier-details.index')->with('success','Carrier Details has been successfully deleted.');
        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong  - '.$ex->getMessage());
        }
    }
}
