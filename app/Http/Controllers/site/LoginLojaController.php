<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginLojaController extends Controller
{
    public function login() {
        return view('site.login');
    }
    //recebe os dados pra fazer login
    public function loginAction(Request $request) {
        $data = $request->only(
            'email',
            'password'
        );

        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:4'
        ]);

        if(Auth::attempt($data)) {
            return redirect()->route('loja.home');
        } else {
            return redirect()->route('loja.login')
            ->with('error', 'E-mail e/ ou senha incorretos!');
        }

    }

    //logout da loja
    public function logout() {
        Auth::logout();
        return redirect()->route('loja.home');
    }

    //view create
    public function create() {
        return view('site.create');
    }
    //recebe os dados
    public function createAction(Request $request) {
        $data = $request->only([
            'name',
            'email',
            'password',
            'password_confirmation'
        ]);

        $request->validate([
            'name' => 'required|string|min:2',
            'email' => 'required|string|email|unique:clients',
            'password' => 'required|string|min:4|confirmed'
        ]);

        $dtHoje = new DateTime();

        $client = new Client;
        $client->name = $data['name'];
        $client->email = $data['email'];
        $client->date_cad = $dtHoje->format("Y-m-d H:i:s");
        $client->password = Hash::make($data['password']);
        $client->save();

        return redirect()->route('loja.login')
        ->with('successCad', 'Cadastro efetuado com sucesso. Faça login!');

    }
}
