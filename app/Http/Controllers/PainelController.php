<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PainelController extends Controller
{
    public function Dashboard(){
        return view('admin.dashboard');
    
        //   if(Auth::check() === true){
     //       return view('admin.dashboard');
     //   }
     //   return redirect()->route('user.login.index');
    }
    
}
