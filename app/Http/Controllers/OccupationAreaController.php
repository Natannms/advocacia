<?php

namespace App\Http\Controllers;

use App\Models\OccupationArea;
use App\Models\Team;
use Illuminate\Http\Request;

class OccupationAreaController extends Controller
{

    public function about()
    {
        return view('about.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $occupationAreas = OccupationArea::paginate();
        $team  = Team::all();

        $result = [
            'occupationAreas' => $occupationAreas,
            'team' => $team,
        ];

        return view('welcome', compact('result'));
    }

    public function welcome()
    {
        $occupationAreas = OccupationArea::paginate(4);
        $team  = Team::all();

        $result = [
            'occupationAreas' => $occupationAreas,
            'team' => $team,
        ];
        return view('welcome', compact('result'));
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
     * @param  \App\Models\OccupationArea  $occupationArea
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $occupationArea = OccupationArea::find($id);
        $occupationAreaItem = $occupationArea->occupationAreaItems;
        return view('OccupationArea.index')->with('occupationArea',[
            'occupationArea' => $occupationArea,
            'occupationAreaItem' => $occupationAreaItem,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OccupationArea  $occupationArea
     * @return \Illuminate\Http\Response
     */
    public function edit(OccupationArea $occupationArea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OccupationArea  $occupationArea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OccupationArea $occupationArea)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OccupationArea  $occupationArea
     * @return \Illuminate\Http\Response
     */
    public function destroy(OccupationArea $occupationArea)
    {
        //
    }
}
