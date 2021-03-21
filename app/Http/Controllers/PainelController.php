<?php

namespace App\Http\Controllers;

use App\Models\Despesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PainelController extends Controller
{

    public function Dashboard(){
      $userId = Auth::id();
      $despesas = Despesa::where('user_id', '=', $userId)->get();
      
      $totalDespesa= despesa::where('user_id', '=', $userId)->select('valor')->get();
      $sum = $totalDespesa->sum('valor');
      

      $charts = despesa::where('user_id', '=', $userId)->orderby('data', 'desc')->select('valor', 'data')->limit(10)->get();
      $values = [];
      $dates = [];
        foreach($charts as $chart){
            array_push($values, (float) $chart->valor);
            array_push($dates, explode('-', $chart->data)[2].'/'.explode('-', $chart->data)[1]);
        }
        
      
      return view('admin.dashboard', ['despesas' => $despesas, 'values'=>$values, 'dates'=>$dates, 'sum'=>$sum]);


    }
    public function auth(){
         if(Auth::check()){
          return redirect()->route('dashboard.index');
         }else{
             return redirect()->route('user.login');
         }
    }
    public function index(){
      return view('admin.dashboard');
     }
    
}
