<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Despesa;
use App\Models\Categoria;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DespesasController extends Controller
{

    public function create()
    {
        $userId = Auth::id();
        $categorias = Categoria::where('user_id', '=', $userId)->get();


        return view('Despesas.DespesaNova', ['categorias' => $categorias]);
    }


    public function store(Request $request)
    {

        $validacao = [
            'valor' => 'required',
            'descricao' => 'required|string|max:200',
            'image' => 'required|image',
            'data'=>'required'
        ];

        $mensagem = [
            'descricao.required' => 'O campo descrição é obrigatório!',
            'valor.required' => 'O campo valor é obrigatório!',
            'image.required' => 'selecine uma imagem!',
            'descricao.string' => 'Formato de decrição inválido!',
            'image.image' => 'Somente é permitido fotos !',
            'descricao.max' => 'A descrição deve conter no máximo 200 caracteres!',
            'data.required'=>'O campo data é obrigatório'
        ];

        $request->validate($validacao, $mensagem);

        $userId = Auth::id();



        $path = $request->file('image')->store('despesas', 'public');
        $valor= $request->input('valor');
        $valorDespesa  = str_replace(',', '.', $valor );

        $despesa = new Despesa();
        $despesa->valor = $valorDespesa;
        $despesa->data =  $request->input('data');
        $despesa->descricao = $request->descricao;
        $despesa->image = $path;
        $despesa->categoria_id = $request->categoria;
        $despesa->user_id = $userId;


        $despesa->save();
        return redirect()->route('dashboard.index');
    }




    public function edit($despesaId)
    {
        $userId = Auth::id();
        $despesa = despesa::where('user_id', '=', $userId)->where('id', '=', $despesaId)->first();
        return view('Despesas.DespesasEdit', ['despesa' => $despesa]);
    }


    public function update(Request $request, $despesaId)
    {
        $validacao = [
            'valor' => 'required',
            'descricao' => 'required|string|max:200',
            'image' => 'required|image',
            'data'=>'required'
        ];

        $mensagem = [
            'descricao.required' => 'O campo descrição é obrigatório!',
            'valor.required' => 'O campo valor é obrigatório!',
            'imagem.required' => 'selecine uma imagem!',
            'descricao.string' => 'Formato de decrição inválido!',
            'image.image' => 'Somente é permitido fotos !',
            'descricao.max' => 'A descrição deve conter no máximo 200 caracteres!',
            'data.required'=>'O campo data é obrigatório'

        ];
        $request->validate($validacao, $mensagem);

        $userId = Auth::id();
        $despesa = Despesa::where('user_id', '=', $userId)->where('id', '=', $despesaId)->first();

        $path = $request->file('image')->store('despesas', 'public');

        $valor= $request->input('valor');
        $valorDespesa  = str_replace(',', '.', $valor );

        $despesa->valor = $valorDespesa;
        $despesa->data =  $request->input('data');
        $despesa->image = $path;
        $despesa->descricao = $request->descricao;


        $despesa->save();
        return redirect()->route('dashboard.index');
    }


    public function delete($despesaId)
    {
        $userId = Auth::id();
        $despesa = Despesa::where('user_id', '=', $userId)->where('id', '=', $despesaId)->first();
        
        Storage::disk('public')->delete($despesa->image);
        


        $despesa->delete();
        return redirect()->route('dashboard.index');
    }
}
