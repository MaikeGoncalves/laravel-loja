<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() {
        $users = DB::table('users')
        ->orderBy('id', 'desc')
        ->get();

        return view('admin.users', [
            'users' => $users
        ]);
    }

    //adicionar usuario
    public function create() {
        return view('admin.adduser');
    }

    //recebe os dados da adição
    public function createAction(Request $request) {
        $data = $request->only([
            'name',
            'email',
            'password',
            'avatar'
        ]);

        $request->validate([
            'name' => 'required|string|min:2',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:4|confirmed',
            'avatar' => 'image|mimes:jpg,png,jpeg'
        ]);

        //validação a parte da imagem
        if(!empty($data['avatar'])) {
            
            $image = $request->file('avatar');

            $dest = public_path('/media/avatar');
            $imageName = md5(time().rand(0,9999)).'.jpg';

            $img = Image::make($image->getRealPath());
            $img->fit(300, 300)->save($dest.'/'.$imageName);
        }

        $user = new User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->avatar = $imageName;
        $user->save();

        return redirect()->route('admin.users')
        ->with('message', 'Novo usuário adicionado com sucesso!');

    }

    //Editar usuario
    public function edit(Request $request, $id) {
        $user = User::find($id);

        if($user) {
            return view('admin.edituser', [
                'user' => $user
            ]);
        }
        return redirect()->route('admin.users');
    }

    //recebe os dados
    public function editAction(Request $request, $id) {

    }


    //Deletar usuário

    
}
