<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\hash;

class UserController extends Controller
{
   
        public function login(Request $request){  
            
            $credentials = [
                    'email' => $request->email,
                    'password' => $request->password
                ];
            
                if(Auth::attempt($credentials)){
                    return redirect('/');
                }
                return redirect()->back()->withInput()->withErrors(['os dados informados não correspondem a nenhum  cadastro']);
        }
        
        public function logout()
        {
            Auth::logout();
            return  view('User.UserLogin');
        } 
        
        public function index()
        {
            return  view('User.UserLogin');
        }

        
        public function create()
        {
        return view('User.UserRegister');
        }

    
        public function store(Request $request)
        {
            $validacao = [
                'name'=>'required||max:60|min:3',
                'email'=>'required|string|max:200|email',
                'password'=>'required|min:4|max:15'
            ];
    
            $mensagem = [
                'name.required' =>'O campo nome é obrigatório!',
                'name.min'=>'O nome informado é muito curto',
                'name.max'=>'O campo nome deve conter no maximo 60 caracteres',
                'email.required'=>'O email valor é obrigatório!',
                'email.email'=>'Formato de email inválido',
                'password'=>'O campo senha é obrigatório',
                'password'=>'A senha precisa conter letras e numeros',
                'password.max'=>'A senha é muito longa',
                'password.min'=>'A senha é muito curta '
    
            ];
            $request->validate($validacao,$mensagem);

            $user= new Users();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = 
            Hash::make($request->input('password'));
            $user->save();
            return redirect('user/login');
            

        }
}
