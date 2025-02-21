<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Backend\ContactDetailsRequest;
use App\Models\ContactDetails;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ContactDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contactDetails = ContactDetails::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.contactdetails.index', [
            'contactDetails' => $contactDetails
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.contactdetails.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactDetailsRequest $request)
    {
        $request->validated();

        try {

            $contactDetails = new ContactDetails();

            $contactDetails->company_mobile_no = $request->company_mobile_no;
            $contactDetails->company_email = $request->company_email;
            $contactDetails->company_address = $request->company_address;
            $contactDetails->location_map_link = $request->location_map_link;
            $contactDetails->location_map_iframe_link = $request->location_map_iframe_link;
            $contactDetails->inserted_at = Carbon::now();
            $contactDetails->inserted_by = Auth::user()->id;
            $contactDetails->save();

            return redirect()->route('contact-details.index')->with('success','Contact Details has been successfully created.');

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
        $contactDetails = ContactDetails::find($id);

        return view('backend.contactdetails.edit', [
            'contactDetails' => $contactDetails
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContactDetailsRequest $request, string $id)
    {
        $request->validated();
        try {

            $contactDetails = ContactDetails::find($id);

            $contactDetails->company_mobile_no = $request->company_mobile_no;
            $contactDetails->company_email = $request->company_email;
            $contactDetails->company_address = $request->company_address;
            $contactDetails->location_map_link = $request->location_map_link;
            $contactDetails->location_map_iframe_link = $request->location_map_iframe_link;
            $contactDetails->modified_at = Carbon::now();
            $contactDetails->modified_by = Auth::user()->id;
            $contactDetails->save();

            return redirect()->route('contact-details.index')->with('success', 'Contact Details updated successfully.');

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

            $contactDetails = ContactDetails::findOrFail($id);
            $contactDetails->update($data);

            return redirect()->route('contact-details.index')->with('success','Contact Details has been successfully deleted.');
        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());
        }
    }
}
