<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Backend\WhoWeAreRequest;
use App\Models\WhoWeAre;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class WhoWeAreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $whoweare = WhoWeAre::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.whoweare.index', [
            'whoweare' => $whoweare
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.whoweare.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WhoWeAreRequest $request)
    {
        $request->validated();

        try {

            $whoweare = new WhoWeAre();

            $whoweare->title = $request->title;
            $whoweare->description = $request->description;
            $whoweare->inserted_at = Carbon::now();
            $whoweare->inserted_by = Auth::user()->id;
            $whoweare->save();

            return redirect()->route('who-we-are.index')->with('success','Who We Are has been successfully created.');

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
        $whoweare = WhoWeAre::findOrFail($id);;

        return view('backend.whoweare.edit', [
            'whoweare' => $whoweare
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WhoWeAreRequest $request, string $id)
    {
        $request->validated();

        try {

            $whoweare = WhoWeAre::findOrFail($id);

            $whoweare->title = $request->title;
            $whoweare->description = $request->description;
            $whoweare->modified_at = Carbon::now();
            $whoweare->modified_by = Auth::user()->id;
            $whoweare->save();

            return redirect()->route('who-we-are.index')->with('success','Who We Are has been successfully updated.');
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

            $whoweare = WhoWeAre::findOrFail($id);
            $whoweare->update($data);

            return redirect()->route('who-we-are.index')->with('success','Who We Are has been successfully deleted.');
        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong  - '.$ex->getMessage());
        }
    }
}
