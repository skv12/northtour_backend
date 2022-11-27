<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\TourImage;
use App\Models\TourPackage;
use App\Models\TourSchedule;
use App\Models\TourBuyer;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tours = Tour::all();
        foreach($tours as $tour){
            $images = TourImage::where('tour_id', $tour->id);
            $schedules = TourSchedule::where('tour_id', $tour->id);
            $tour['images'] = $images;
            $tour['schedules'] = $schedules;
        }
        return $tours;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tour_data = $request->tour->validate([
            'operator_id' =>'integer',
            'title' => 'string',
            'active' => 'boolean',
            'type_id' => 'integer',
            'description' => 'string',
        ]);
        $tour = Tour::create($tour_data);
        foreach ($request->packages as $package){
            $package_data['tour_id'] = $tour->id;
            $package_data['tour_package_id'] = $package->id;
            TourPackage::create($package_data);
        }
        foreach ($request->images as $image){
            $image_data['active'] = true;
            $image_data['tour_id'] = $tour->id;
            $image_data['image_name'] = $image;
            TourImage::create($image_data);
        }
        foreach ($request->schedules as $schedule){
            $schedule_data['tour_id'] = $tour->id;
            $schedule_data['active'] = true;
            $schedule_data['is_plan'] = true;
            $schedule_data['startdate'] = $schedule->startdate;
            $schedule_data['enddate'] = $schedule->enddate;
            $schedule_data['price'] = $schedule->price;
            $schedule_data['space_total'] = $schedule->space;
            $schedule_data['space_current'] = $schedule_data['space_total'];
            TourSchedule::create($schedule_data);
        }
        return response()->json(success);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Tour::find($id);
        $images = TourImage::where('tour_id', $id);
        $packages = TourPackage::where('tour_id', $id);
        $schedules = TourSchedule::where('tour_id', $id);
        $buyers = TourBuyer::where('tour_id', $id);
        $data['images'] = $images;
        $data['packages'] = $packages;
        $data['schedules'] = $schedules;
        $data['buyers'] = $buyers;
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // $data = $request->tour->validate([
        //     'operator_id' =>'integer'
        //     'title' => 'string',
        //     'active' => 'boolean',
        //     'type_id' => 'integer',
        //     'description' => 'string',
        // ]);
        // $tour = Tour::findOrFail($id);
        // if($tour)
        //     $tour->update($data);
        // else
        //     response()->json(error);
        // return response()->json(success);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tour = Tour::findOrFail($id);
        if($tour)
            $tour->delete();
        else
            response()->json(error);
        return response()->json(success);
    }
}
