<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Backend\MediaEventsDetailsRequest;
use App\Models\MediaEventsDetails;
use App\Models\MediaEvents;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MediaEventsDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $media_events_details = MediaEventsDetails::with('mediaEvents')->orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.media-events-details.index', [
            'media_events_details' => $media_events_details
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $media_events = MediaEvents::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.media-events-details.create', [
            'media_events' => $media_events
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MediaEventsDetailsRequest $request)
    {
        $request->validated();
        try {

            $media_events_details = new MediaEventsDetails();

            // ==== Upload (image)
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/j4c_Group/media_events_details/image'), $new_name);

                $image_path = "/j4c_Group/media_events_details/image/" . $new_name;
                $media_events_details->image = $new_name;
            }

            // Check if new event_gallery_images are uploaded
            if ($request->hasFile('event_gallery_images')) {
                // Add new event_gallery_images to the paths array
                foreach ($request->file('event_gallery_images') as $image) {
                    // Generate a unique filename using time() and rand()
                    $new_name = time() . rand(10, 999) . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('/j4c_Group/media_events_details/event_gallery_images'), $new_name);
                    $bannerImagePaths[] = $new_name; // Add the new event_gallery_images to the array
                }
            }

            // Update the event_gallery_images with the new image paths
            $media_events_details->event_gallery_images = json_encode($bannerImagePaths);

            $media_events_details->media_events_id = $request->media_events_id;
            $media_events_details->slug = $request->slug;
            $media_events_details->description = $request->description;
            $media_events_details->inserted_at = Carbon::now();
            $media_events_details->inserted_by = Auth::user()->id;
            $media_events_details->save();

            return redirect()->route('media-events-details.index')->with('success','Media Events Details has been successfully created.');

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
        $media_events_details = MediaEventsDetails::findOrFail($id);
        $media_events = MediaEvents::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.media-events-details.edit', [
            'media_events_details' => $media_events_details,
            'media_events' => $media_events
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MediaEventsDetailsRequest $request, string $id)
    {
        $request->validated();

        try {

            $media_events_details = MediaEventsDetails::findOrFail($id);

            // Check and upload the image
            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if ($media_events_details->image) {
                    $oldImagePath = public_path('/j4c_Group/media_events_details/image/' . $media_events_details->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Delete the old image file
                    }
                }

                // Process the new image
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/j4c_Group/media_events_details/image'), $new_name);

                // Update the banner object with the new image path
                $media_events_details->image = $new_name;
            }

            // Handle existing banner images
            $existingBannerImages = $request->input('existing_event_gallery_images', []);
            $storedBannerImages = json_decode($media_events_details->event_gallery_images, true) ?? [];
            $uploadedBannerImages = [];

            if ($request->hasFile('event_gallery_images')) {
                foreach ($request->file('event_gallery_images') as $image) {
                    $new_name = time() . rand(10, 999) . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('/j4c_Group/media_events_details/event_gallery_images'), $new_name);
                    $uploadedBannerImages[] = $new_name;
                }
            }

            // Merge existing and new images
            $allBannerImages = array_merge($existingBannerImages, $uploadedBannerImages);
            $imagesToDelete = array_diff($storedBannerImages, $existingBannerImages);

            // Delete removed banner images
            foreach ($imagesToDelete as $oldImage) {
                $imagePath = public_path("/j4c_Group/media_events_details/event_gallery_images/{$oldImage}");
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            $media_events_details->event_gallery_images = json_encode(array_unique($allBannerImages));

            $media_events_details->media_events_id = $request->media_events_id;
            $media_events_details->slug = $request->slug;
            $media_events_details->description = $request->description;
            $media_events_details->modified_at = Carbon::now();
            $media_events_details->modified_by = Auth::user()->id;
            $media_events_details->save();

            return redirect()->route('media-events-details.index')->with('success','Media Events Details has been successfully updated.');
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

            $media_events_details = MediaEventsDetails::findOrFail($id);
            $media_events_details->update($data);

            return redirect()->route('media-events-details.index')->with('success','Media Events Details has been successfully deleted.');
        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong  - '.$ex->getMessage());
        }
    }

    public function fetchMediaEventSlug(Request $request)
    {
        $media_events_slug = MediaEvents::find($request->media_events_id);
        $slug = $media_events_slug->slug;

        if ($media_events_slug) {
            return response()->json(['slug' => $slug]);
        } else {
            return response()->json(['slug' => null]);
        }
    }
}
