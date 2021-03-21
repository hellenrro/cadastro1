<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Despesa;
use Illuminate\Support\Facades\File;
use Storage;

class DespesasController extends Controller
{    
    
    public function create()
    {
        return view('Despesas.DespesaNova');
    }

    public function UploadImagem(Request $request){
        $request->file("imagem")->store( path: 'FotosDespesas');
    }


    public function store(Request $request)
    {
        
        $validacao = [
            'valor'=>'required',
            'descricao'=>'required|string|max:200',
            'image'=>'required|image'
        ];

        $mensagem = [
            'descricao.required' =>'O campo descrição é obrigatório!',
            'valor.required' =>'O campo valor é obrigatório!',
            'image.required' =>'selecine uma imagem!',
            'descricao.string'=>'Formato de decrição inválido!',
            'image.image'=>'Somente é permitido fotos !',
            'descricao.max'=>'A descrição deve conter no máximo 200 caracteres!'
        ];

        $request->validate($validacao,$mensagem);
    
        $userId=Auth::id();
       

        
        $path = $request->file('image')->store('despesas', 'public');
        
        $despesa= new Despesa();
        $despesa->valor = $request->input('valor');
        $despesa->data =  $request->input('data');
        $despesa->descricao = $request->descricao;
        $despesa->image = $path;
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
            'valor'=>'required',
            'descricao'=>'required|string|max:200',
            'image'=>'required|image'
        ];

        $mensagem = [
            'descricao.required' =>'O campo descrição é obrigatório!',
            'valor.required' =>'O campo valor é obrigatório!',
            'imagem.required' =>'selecine uma imagem!',
            'descricao.string'=>'Formato de decrição inválido!',
            'image.image'=>'Somente é permitido fotos !',
            'descricao.max'=>'A descrição deve conter no máximo 200 caracteres!'

        ];
        $request->validate($validacao,$mensagem);

        $userId = Auth::id();
        $despesa = Despesa::where('user_id', '=', $userId)->where('id', '=', $despesaId)->first();
       
        $path = $request->file('image')->store('despesas', 'public');

        $despesa->valor = $request->input('valor');
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
        
        
        
        $despesa->delete();
        return redirect()->route('dashboard.index');
    }
}
