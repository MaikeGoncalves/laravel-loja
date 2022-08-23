<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index() {
        return view('admin.login');
    }
    //recebendos os dados do login
    public function loginAction(Request $request) {
        $data = $request->only(
            'email',
            'password',
            'password_confirmation'
        );

        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:4|confirmed'
        ]);

        if(Auth::attempt($data)) {
            return redirect()->route('admin.home');
        } else {
            return redirect()->route('login')
            ->with('error', 'E-mail e/ ou senha incorretos!');
        }

    }

    //logout
    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }

    //Cadastro
    public function register() {
        return view('admin.register');
    }

    //recebe os dados pra cadastrar
    public function registerAction(Request $request) {
        $data = $request->only(
            'name',
            'email',
            'password',
            'password_confirmation'
        );

        $validator = $this->validator($data);
        if($validator->fails()) {
            return redirect()->route('register')
            ->withErrors($validator)
            ->withInput();
        }

        //verificar primeiro se aquele email já existe ou não
        $emailExists = User::where('email', $data['email'])->count();
            //só cadastro se for 0, significa que não existe esse email ainda, então cadastra
            if($emailExists === 0 ) {
                //se não existe esse email ainda aí eu posso cadastrar no bando
                $newUser = new User();
                $newUser->name = $data['name'];
                $newUser->email = $data['email'];
                $newUser->password = Hash::make($data['password']);
                $newUser->save();

                Auth::login($newUser);
                return redirect()->route('admin.home');

            } else {
                //mensagem de erro falando que este email já existe

                return redirect()->route('register');
            }
    }

    //Função de validar os dados
    protected function validator(array $data) 
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:200', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'max:200', 'confirmed'],
        ]);
    }
}
