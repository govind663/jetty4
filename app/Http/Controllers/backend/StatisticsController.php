<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Backend\StatisticsRequest;
use App\Models\Statistics;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class StatisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statistics = Statistics::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.statistics.index', [
            'statistics' => $statistics
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.statistics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StatisticsRequest $request)
    {
        $request->validated();
        try {

            $statistics = new Statistics();

            $statistics->title = $request->title;
            $statistics->description = $request->description;
            $statistics->status = $request->status;
            $statistics->inserted_at = Carbon::now();
            $statistics->inserted_by = Auth::user()->id;
            $statistics->save();

            return redirect()->route('statistics.index')->with('success','Statistics has been successfully created.');

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
        $statistics = Statistics::findOrFail($id);

        return view('backend.statistics.edit', [
            'statistics' => $statistics
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StatisticsRequest $request, string $id)
    {
        $request->validated();
        try {

            $statistics = Statistics::findOrFail($id);

            $statistics->title = $request->title;
            $statistics->description = $request->description;
            $statistics->status = $request->status;
            $statistics->modified_at = Carbon::now();
            $statistics->modified_by = Auth::user()->id;
            $statistics->save();

            return redirect()->route('statistics.index')->with('success', 'Statistics has been successfully updated.');
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

            $statistics = Statistics::findOrFail($id);
            $statistics->update($data);

            return redirect()->route('statistics.index')->with('success','Statistics has been successfully deleted.');
        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());
        }
    }
}
