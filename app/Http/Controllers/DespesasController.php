<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Despesas;

class DespesasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $desp = Despesas::all();
       return view('usuarios', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Despesas.DespesaNova');
    }

    public function UploadImagem(Request $request){
        $request->file("imagem")->store( path: 'FotosDespesas');
    }


    public function store(Request $request)
    {
        $desp= new Despesas();
        $desp->valor = $request->input('valor');
        $desp->descricao = $request->input('descricao');
        $desp->save();
        return redirect('/despesas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $desp = Despesas::find($id);
        if(isset($desp)) {
            return view('EditarUsuario',compact('user'));
        }
        return redirect('/usuarios');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $desp = Despesas::find($id);
        if(isset($desp)) {
            $desp->nome  = $request->input('NomeUsuario');
            $desp->email = $request->input('email');
            $desp->passoword = $request->input('passoword');
            $desp->save();
        }
        return redirect('/usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $desp = Despesas::find($id);
        if (isset($desp)){
            $desp->delete();
        }
        return redirect('/usuarios');
    }
}
