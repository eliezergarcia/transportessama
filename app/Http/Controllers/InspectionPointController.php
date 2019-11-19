<?php

namespace App\Http\Controllers;

use App\Box;
use App\Driver;
use App\Coordinator;
use App\InspectionPoint;
use Illuminate\Http\Request;

class InspectionPointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function list()
    {
        $points = InspectionPoint::where('inactive_at', null)->get();

        return $points;
    }

    public function listTTI()
    {
        $points = InspectionPoint::where('inactive_at', null)
                                ->where('type', 'TRUCK & TRAILER')->get();

        $boxes = Box::with(['type', 'brand'])->get();
        $drivers = Driver::where('inactive_at', null)->get();
        $coordinators = Coordinator::where('inactive_at', null)->get();

        $data = [
            'points' => $points,
            'boxes' => $boxes,
            'drivers' => $drivers,
            'coordinators' => $coordinators,
        ];

        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    }
}
