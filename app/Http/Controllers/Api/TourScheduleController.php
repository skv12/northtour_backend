<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\TourSchedule;

class TourScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return TourSchedule::where('tour_id', $id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $schedule_data = $request->schedule->validate([
            'tour_id' =>'integer',
            'active' => 'boolean',
            'is_plan' => 'boolean',
            'startdate' => 'datetime',
            'enddate' => 'datetime',
            'price' => 'numeric',
            'space_total' => 'integer'
        ]);
        $schedule_data['space_current'] = $schedule_data['space_total'];
        TourSchedule::create($schedule_data);
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
        //
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
        $schedule_data = $request->schedule->validate([
            'tour_id' =>'integer',
            'active' => 'boolean',
            'is_plan' => 'boolean',
            'startdate' => 'datetime',
            'enddate' => 'datetime',
            'price' => 'numeric',
            'space_total' => 'integer'
        ]);
        $schedule = TourSchedule::findOrFail($id);
        $schedule_data['space_current'] = $schedule['space_current'];
        $schedule->create($schedule_data);
        return response()->json(success);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $schedule = TourSchedule::findOrFail($id);
        if($schedule)
            $schedule->delete();
        else
            response()->json(error);
        return response()->json(success);
    }
}
