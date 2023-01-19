<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\OccupationArea;
use App\Models\OccupationAreaItem;
use App\Models\Team;
use Illuminate\Http\Request;

class OccupationAreaController extends Controller
{

    public function about()
    {
        return view('about.index');
    }

    public function dashboardOccupationAreaIndex()
    {
        $data = [
            'areas' => OccupationArea::all(),
        ];

        return view('OccupationArea.dashboard.index', compact('data'));
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
            'images'=> Image::all(),
        ];

        return view('welcome', compact('result'));
    }

    public function welcome()
    {
        $occupationAreas = OccupationArea::paginate(4);
        $team  = Team::all();
        $images = Image::all();

        $result = [
            'occupationAreas' => $occupationAreas,
            'team' => $team,
            'images' => $images,
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

        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);


        $occupationArea = OccupationArea::create([
            'name' => $request->name,
        ]);

        if (!$occupationArea) {
            return 'nao foi possivel primeiro passo';
            return redirect()->back()->with('error', 'Erro ao criar área de atuação');
        }

        // separe por virgula
        $items = explode(';', $request->description);

        // retire espaços vazios
        $items = array_map('trim', $items);


        foreach ($items as $key => $item) {
            if ($item == '') {
                unset($items[$key]);
            }
        }

        foreach ($items as $key => $item) {
            $occupationAreaItems = OccupationAreaItem::create([
                'description' => $item,
                'occupation_area_id' => $occupationArea->id,
            ]);

            if (!$occupationArea) {
                return 'nao foi possivel';
                return redirect()->back()->with('error', 'Erro ao criar área de atuação');
            }
        }

        return $items;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OccupationArea  $occupationArea
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $occupationArea = OccupationArea::find($id);
        $occupationAreaItem = $occupationArea->occupationAreaItems;
        return view('OccupationArea.index')->with('occupationArea', [
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
