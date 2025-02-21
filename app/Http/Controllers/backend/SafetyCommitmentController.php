<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Backend\SafetyCommitmentRequest;
use App\Models\SafetyCommitment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SafetyCommitmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $safetycommitment = SafetyCommitment::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.safetycommitment.index', [
            'safetycommitment' => $safetycommitment
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.safetycommitment.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SafetyCommitmentRequest $request)
    {
        $request->validated();
        try {

            $safetycommitment = new SafetyCommitment();

            $safetycommitment->title = $request->title;
            $safetycommitment->description = $request->description;
            $safetycommitment->inserted_at = Carbon::now();
            $safetycommitment->inserted_by = Auth::user()->id;
            $safetycommitment->save();

            return redirect()->route('safety-commitment.index')->with('success','Safety Commitment has been successfully created.');

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
        $safetycommitment = SafetyCommitment::find($id);

        return view('backend.safetycommitment.edit',[
            'safetycommitment' => $safetycommitment
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SafetyCommitmentRequest $request, string $id)
    {
        $request->validated();
        try {

            $safetycommitment = SafetyCommitment::find($id);

            $safetycommitment->title = $request->title;
            $safetycommitment->description = $request->description;
            $safetycommitment->modified_at = Carbon::now();
            $safetycommitment->modified_by = Auth::user()->id;
            $safetycommitment->save();

            return redirect()->route('safety-commitment.index')->with('success','Safety Commitment has been successfully updated.');

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

            $safetycommitment = SafetyCommitment::findOrFail($id);
            $safetycommitment->update($data);

            return redirect()->route('safety-commitment.index')->with('success','Safety Commitment has been successfully deleted.');
        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong  - '.$ex->getMessage());
        }
    }
}
