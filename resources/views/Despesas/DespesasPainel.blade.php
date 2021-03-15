@extends('layouts.modelo',["current"=>"despesas"])

@section('body')
<div class="">
    <h5> Cadastro de despesas</h5>
@if(count($desps)>0)
    <table class="">
        <thead>
            <tr>nome</tr>
                <th> email</th>
                    <th> ações</th>
        </thead>
        <tbody>
            @foreach ($desps as $desp)
            <tr>
                <td>{{$desp->id}}</td>
                <td>{{$desp->nome}}</td>
                <td>{{$desp->descricao}}</td>
                <td>
                    <a href="/despesas/editar/{{$desp->id}}">editar</a>
                    <a href="/despesas/remover/{{$desp->id}}">apagar</a>

                </td>
            </tr>
                
            @endforeach
        </tbody>
    </table>
@endif
</div>
<div class="">
    <a href="/despesas/novo" class="btn-primary" role="button">novo usuario</a>
</div>
    
@endsection