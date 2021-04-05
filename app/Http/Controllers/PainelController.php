<?php

namespace App\Http\Controllers;

use App\Models\Despesa;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class PainelController extends Controller
{

  public function Dashboard(Request $request)
  {
    $userId = Auth::id();


    $totalDespesa = despesa::where('user_id', '=', $userId)->select('valor')->get();
    $sum = $totalDespesa->sum('valor');

    $categorias = Categoria::where('user_id', '=', $userId)->select('nome', 'id')->get();
     
    $catDesp = Despesa::where('user_id','=',$userId)->with('categoria')->get();
    
    

    $despesas = Despesa::where('user_id', '=', $userId)->with('categoria');
    $filtro = [];
    if (@$request->categoria) {
      $despesas->where('categoria_id', '=', $request->categoria);
    }
    $despesas = $despesas->get();

 
    $charts = despesa::where('user_id', '=', $userId)->orderby('data', 'desc')->select('valor', 'data')->limit(12)->get();
    $valores = [];
    $dates = [];
    foreach ($charts as $chart) {
      array_push($valores, (float) $chart->valor);
      array_push($dates, explode('-', $chart->data)[2] . '/' . explode('-', $chart->data)[1]);
    }


    return view('admin.dashboard', ['despesas' => $despesas, 'valores' => $valores, 'dates' => $dates, 'sum' => $sum, 'categorias' => $categorias, 'filtro' => $filtro, 'catDesp'=> $catDesp]);
  }
  public function auth()
  {
    if (Auth::check()) {
      return redirect()->route('dashboard.index');
    } else {
      return redirect()->route('user.login');
    }
  }
}
