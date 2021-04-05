<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Categoria;
use App\Models\Despesa;


class CategoriaController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::id();
        $categorias = Categoria::where('user_id', '=', $userId)->get();


        $tests = DB::table('despesas')
            ->join('categorias', function ($join) {
                $join->on('categorias.id', '=', 'despesas.categoria_id')
                    ->where('despesas.valor', '>', 0);
            })
            ->select('categorias.nome', DB::raw('SUM(valor) AS total'))
            ->groupBy('categorias.nome')
            ->get();
        $cat = [];
        foreach ($tests as $test) {
            array_push($cat, [
                "name" => $test->nome,
                "y" => (float) $test->total
            ]);
        }

        return view('Categoria.GerenciarCategoria', ['categorias' => $categorias, 'cat' => $cat]);
    }

    public function create()
    {
        return view('Categoria.CategoriaNova');
    }

    public function store(Request $request)
    {
        $validacao = [
            'nome' => 'required'

        ];
        $mensagem = [
            'nome.required' => 'O campo nome é obrigatório!'
        ];

        $request->validate($validacao, $mensagem);



        $userId = Auth::id();
        $categoria = new Categoria();
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
