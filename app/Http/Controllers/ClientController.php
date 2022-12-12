<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ClientData;
use App\Models\Document;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{

    public function login()
    {
        return view('client.login');
    }

    public function enter(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('client.dashboard');
        }

        return back()->with('error', 'Login inválido');
     }

     public function ClientDashboard()
    {

        $user = Auth::user();
        $client = Client::where('user_id', $user->id)->first();
        $clientData = ClientData::where('user_id',  $user->id)->first();
        $documents =  Document::where('user_id',  $user->id)->paginate(10);
        $allClients = Client::all();

        return $documents;

        $data = [
            'user' => $user,
            'client' => $client,
            'clientData' => $clientData,
            'documents' => $documents,
            'allClients' => $allClients,
        ];

        return view('client.dashboard', compact('data'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //client craate page
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //validate
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'cpf' => 'required|unique:client_data',
            'nacionalidade' => 'required',
            'profissao' => 'required',
            'rg' => 'required',
            'estado_civil' => 'required',
            'data_nascimento' => 'required',
            'phone' => 'required',
            'cep' => 'required',
            'logradouro' => 'required',
            'numero' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'uf' => 'required',
            'trabalha_como' => '',
        ]);

        //criar ym no user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->cpf),
        ]);

        if (!$user) {
            return redirect()->back()->with('error', 'Erro ao criar o usuário');
        }
        //criar um novo client

        $client = Client::create([
            'user_id' => $user->id,
        ]);

        if (!$client) {
            $deleteClient = User::find($user->id);
            $deleteClient->delete();
            return redirect()->back()->with('error', 'Erro ao criar usuario #002');
        }

        //criar um novo client data
        $clientData =  ClientData::create([
            'user_id' => $user->id,
            'client_id' => $client->id,
            "nacionalidade" => $request->nacionalidade,
            "profissao" => $request->profissao,
            "rg" => $request->rg,
            "cpf" => $request->cpf,
            "estado_civil" => $request->estado_civil,
            "data_nascimento" => $request->data_nascimento,
            "phone" => $request->phone,
            "email" => $request->email,
            "cep" => $request->cep,
            "logradouro" => $request->logradouro,
            "numero" => $request->numero,
            "complemento" => $request->complemento,
            "bairro" => $request->bairro,
            "cidade" => $request->cidade,
            "uf" => $request->uf,
            "trabalha_como" => $request->trabalha_como,
            "atua_na_esfera" => $request->atua_na_esfera != '' || $request->atua_na_esfera != null ? $request->atua_na_esfera : 'Não informado',
        ]);

        if (!$clientData) {
            $deleteClient = Client::find($user->id);
            $deleteClient->delete();

            $deleteClient = User::find($user->id);
            $deleteClient->delete();

            return redirect()->back()->with('error', 'Erro ao criar dados do novo usuario #003');
        }

        return redirect()->route('client.login')->with('status', 'Cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
