<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\OurUspRequest;
use App\Models\OurUsp;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class OurUspController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ourUsps = OurUsp::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.our-usps.index', [
            'ourUsps' => $ourUsps
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.our-usps.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OurUspRequest $request)
    {
        $request->validated();
        try {

            $ourUsp = new OurUsp();

            // Check if new banner_image are uploaded
            if ($request->hasFile('banner_image')) {
                // Add new banner_image to the paths array
                foreach ($request->file('banner_image') as $image) {
                    // Generate a unique filename using time() and rand()
                    $new_name = time() . rand(10, 999) . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('/j4c_Group/our_usp/banner_image'), $new_name);
                    $bannerImagePaths[] = $new_name; // Add the new banner_image to the array
                }
            }

            // Update the banner_image with the new image paths
            $ourUsp->baner_image = json_encode($bannerImagePaths);


            // Check if new banner_icon are uploaded
            if ($request->hasFile('banner_icon')) {
                // Add new banner_icon to the paths array
                foreach ($request->file('banner_icon') as $image) {
                    // Generate a unique filename using time() and rand()
                    $new_name = time() . rand(10, 999) . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('/j4c_Group/our_usp/banner_icon'), $new_name);
                    $bannerIconPaths[] = $new_name; // Add the new banner_icon to the array
                }
            }

            // Update the banner_icon with the new image paths
            $ourUsp->banner_icon = json_encode($bannerIconPaths);

            $ourUsp->title = $request->title;
            $ourUsp->description = $request->description;
            $ourUsp->banner_title = json_encode($request->banner_title);
            $ourUsp->banner_description = json_encode($request->banner_description);
            $ourUsp->inserted_at = Carbon::now();
            $ourUsp->inserted_by = Auth::user()->id;
            $ourUsp->save();

            return redirect()->route('our-usp.index')->with('success','Our Usp has been successfully created.');

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
        $ourUsp = OurUsp::find($id);

        return view('backend.our-usps.edit',[
            'ourUsp' => $ourUsp
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OurUspRequest $request, string $id)
    {
        $request->validated();
        try {

            $ourUsp = OurUsp::findOrFail($id);

            // Handle existing banner images
            $existingBannerImages = $request->input('existing_banner_image', []);
            $storedBannerImages = json_decode($ourUsp->banner_image, true) ?? [];
            $uploadedBannerImages = [];

            if ($request->hasFile('banner_image')) {
                foreach ($request->file('banner_image') as $image) {
                    $new_name = time() . rand(10, 999) . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('/j4c_Group/our_usp/banner_image'), $new_name);
                    $uploadedBannerImages[] = $new_name;
                }
            }

            // Merge existing and new images
            $allBannerImages = array_merge($existingBannerImages, $uploadedBannerImages);
            $imagesToDelete = array_diff($storedBannerImages, $existingBannerImages);

            // Delete removed banner images
            foreach ($imagesToDelete as $oldImage) {
                $imagePath = public_path("/j4c_Group/our_usp/banner_image/{$oldImage}");
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            $ourUsp->baner_image = json_encode(array_unique($allBannerImages));

            // Handle existing banner icons
            $existingBannerIcons = $request->input('existing_banner_icon', []);
            $storedBannerIcons = json_decode($ourUsp->banner_icon, true) ?? [];
            $uploadedBannerIcons = [];

            if ($request->hasFile('banner_icon')) {
                foreach ($request->file('banner_icon') as $image) {
                    $new_name = time() . rand(10, 999) . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('/j4c_Group/our_usp/banner_icon'), $new_name);
                    $uploadedBannerIcons[] = $new_name;
                }
            }

            // Merge existing and new icons
            $allBannerIcons = array_merge($existingBannerIcons, $uploadedBannerIcons);
            $iconsToDelete = array_diff($storedBannerIcons, $existingBannerIcons);

            // Delete removed banner icons
            foreach ($iconsToDelete as $oldIcon) {
                $iconPath = public_path("/j4c_Group/our_usp/banner_icon/{$oldIcon}");
                if (file_exists($iconPath)) {
                    unlink($iconPath);
                }
            }

            $ourUsp->banner_icon = json_encode(array_unique($allBannerIcons));

            // Update text fields
            $ourUsp->title = $request->title;
            $ourUsp->description = $request->description;
            $ourUsp->banner_title = json_encode($request->banner_title);
            $ourUsp->banner_description = json_encode($request->banner_description);
            $ourUsp->modified_at = Carbon::now();
            $ourUsp->modified_by = Auth::user()->id;
            $ourUsp->save();

            return redirect()->route('our-usp.index')->with('success', 'Our Usp updated successfully.');

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

            $ourUsp = OurUsp::findOrFail($id);
            $ourUsp->update($data);

            return redirect()->route('our-usp.index')->with('success','Our Usp has been successfully deleted.');
        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());
        }
    }
}
