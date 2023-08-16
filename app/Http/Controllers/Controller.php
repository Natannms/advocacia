<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Image;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function dashboard()
    {
        //retornar todos os usuarios contidos na tabela clients

       $users =  User::all();
       ;

       $images = Image::all();
       $data = [
              'users' => $users,
              'images'=>$images
       ];
        return view('dashboard', compact('data'));
    }


}
