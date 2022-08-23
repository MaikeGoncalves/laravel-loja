<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() {
        $loggedId = intval(Auth::id());

        $user = User::find($loggedId);

        if($user) {
            return view('admin.perfil', [
                'user' => $user
        ]);
        }

        return redirect()->route('admin.home');
    }

    //recebe os dados
    public function perfilAction(Request $request) {
        $loggedId = intval(Auth::id());
        $user = User::find($loggedId);

        if($user) {
            //Pegando os dados dos inputs
            $data = $request->only([
                'name',
                'email',
                'password',
                'password_confirmation',
                'avatar'
            ]);

            $request->validate([
                'name' => 'required|string|min:4',
                'email' => 'required|string|email',
                'password' => 'confirmed',
                'avatar' => 'image|mimes:jpg,png,jpeg'
            ]);

            //verificação do nome e alteração
            if($user->name != $data['name']) {
                if(strlen($data['name']) >= 4) {
                    $user->name = $data['name'];
                } else {
                    return redirect()->route('admin.perfil');
                }
            }

            //Alteração do e-mail
            if($user->email != $data['email']) {
                //verificando se o email digitado já existe ou não
                $hasEmail = User::where('email', $data['email'])->get();
                if(count($hasEmail) === 0) {
                    $user->email = $data['email'];
                } else {
                    return redirect()->route('admin.perfil');
                }
                
            }

            //Alteração da senha
            if(!empty($data['password'])) {
                if($data['password'] === $data['password_confirmation']) {
                    if(strlen($data['password']) >= 4 ) {
                        $user->password = Hash::make($data['password']);
                    } else {
                        return redirect()->route('admin.perfil')
                        ->with('error', 'O password precisa conter no mínimo 4 caracteres!');
                    }
                }
            }

            //Avatar-validação
            if(!empty($data['avatar'])) {
            
            $image = $request->file('avatar');

            $dest = public_path('/media/avatar');
            $imageName = md5(time().rand(0,9999)).'.jpg';

            $img = Image::make($image->getRealPath());
            $img->fit(300, 300)->save($dest.'/'.$imageName);

            $user->avatar = $imageName;

            }

            //salvando todas as informações
            $user->save();
            return redirect()->back()->with('message', 'Informações alteradas com sucesso!');

        }
    }

}
