<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Team;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =[
            'images' => Image::all(),
            'teams' => Team::all()
        ];
        return view('images.index', compact('data'));
    }
    public function profileImages()
    {
        $data =[
            'teams' => Team::all()
        ];
        return view('profile.fotos.create', compact('data'));
    }
    public function logoIndex()
    {
        $data =[
            'images' => Image::all()
        ];
        return view('logo.index', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
        $validate = $request->validate([
            'image' => 'required',
            'local' => 'required'
        ]);


        $request->image->storeAs('public/my_backgrounds', $request->image->getClientOriginalName());

        // $image = Image::create([
        //     'image' => $request->image->getClientOriginalName(),
        //     'local'=> $request->local
        // ]);

        $image = Image::where('local', $request->local)->first();
        if(!$image){
            // criar
            $create =  new Image();
            $create->image = $request->image->getClientOriginalName();
            $create-> local = $request-> local;
            $create->save();
            if(!$create){
                return redirect()->back()->with('error', 'Erro ao salvar imagem');
            }
        }
        if($image){
            // atualizar
            $update = Image::find($image->id);
            $update-> image = $request->image->getClientOriginalName();
            $update->save();

            if(!$update){
                return redirect()->back()->with('error', 'Erro ao salvar imagem');
            }
        }
        return redirect()->back()->with('success', 'Imagem salva com sucesso');
    }
    public function logoStore(Request $request)

    {
        $validate = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $request->image->storeAs('public/img/logo', $request->image->getClientOriginalName());

        $image = Image::create([
            'image' => $request->image->getClientOriginalName(),
            'local'=> 'logo'
        ]);

        if(!$image){
            return redirect()->back()->with('error', 'Erro ao salvar Logo');
        }

        return redirect()->back()->with('success', 'Logo salva com sucesso');
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::find($id);
        if(!$image){
            return redirect()->back()->with('error', 'Erro ao deletar imagem');
        }

        $image->delete();

        return redirect()->back()->with('success', 'Imagem deletada com sucesso');
    }
}
