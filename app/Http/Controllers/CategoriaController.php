<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index(){
        $userId = Auth::id();
        $categorias = Categoria::where('user_id', '=', $userId)->get();
        return view('Categoria.GerenciarCategoria', ['categorias' => $categorias]);
    }

    public function create()
    {
        return view('Categoria.CategoriaNova');
    }



    public function store(Request $request)
    {
        $userId=Auth::id();
        $categoria= new Categoria();
        $categoria->nome = $request->input('nome');
        $categoria->user_id = $userId;
        $categoria->save();
        return redirect()->route('dashboard.index');
    }

    public function delete($categoriaId)
    {
        $userId = Auth::id();
        $categoria = Categoria::where('user_id', '=', $userId)->where('id', '=', $categoriaId)->first();
        
        
        
        $categoria->delete();
        return redirect()->route('gerenciar.categoria');
    }
}