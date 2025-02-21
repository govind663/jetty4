<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Backend\MediaEventsRequest;
use App\Models\MediaEvents;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MediaEventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $media_events = MediaEvents::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.media-events.index', [
            'media_events' => $media_events
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.media-events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MediaEventsRequest $request)
    {
        $request->validated();

        try {

            $media_events = new MediaEvents();

            // ==== Upload (image)
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/j4c_Group/media-events/image'), $new_name);

                $image_path = "/j4c_Group/media-events/image/" . $new_name;
                $media_events->image = $new_name;
            }

            $media_events->title = $request->title;
            $media_events->slug = $request->slug;
            $media_events->description = $request->description;
            $media_events->event_date = date('Y-m-d', strtotime($request->event_date));
            $media_events->event_location = $request->event_location;
            $media_events->status = $request->status;
            $media_events->inserted_at = Carbon::now();
            $media_events->inserted_by = Auth::user()->id;
            $media_events->save();

            return redirect()->route('media-events.index')->with('success','Media Events has been successfully created.');

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
        $media_events = MediaEvents::findOrFail($id);

        return view('backend.media-events.edit', [
            'media_events' => $media_events
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MediaEventsRequest $request, string $id)
    {
        $request->validated();

        try {

            $media_events = MediaEvents::findOrFail($id);

            // Check and upload the image
            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if ($media_events->image) {
                    $oldImagePath = public_path('/j4c_Group/media-events/image/' . $media_events->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Delete the old image file
                    }
                }

                // Process the new image
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/j4c_Group/media-events/image'), $new_name);

                // Update the banner object with the new image path
                $media_events->image = $new_name;
            }

            $media_events->title = $request->title;
            $media_events->slug = $request->slug;
            $media_events->description = $request->description;
            $media_events->event_date = date('Y-m-d', strtotime($request->event_date));
            $media_events->event_location = $request->event_location;
            $media_events->status = $request->status;
            $media_events->modified_at = Carbon::now();
            $media_events->modified_by = Auth::user()->id;
            $media_events->save();

            return redirect()->route('media-events.index')->with('success','Media Events has been successfully updated.');
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

            $media_events = MediaEvents::findOrFail($id);
            $media_events->update($data);

            return redirect()->route('media-events.index')->with('success','Media Events has been successfully deleted.');
        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong  - '.$ex->getMessage());
        }
    }
}
