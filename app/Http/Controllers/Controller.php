<?php

namespace App\Http\Controllers;

use App\Models\Client;
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

       $users =  User::query()
            ->join('clients', 'users.id', '=', 'clients.user_id')
            ->select('users.*')
            ->paginate(10);
       ;
       $data = [
              'users' => $users
       ];
        return view('dashboard', compact('data'));
    }


}
