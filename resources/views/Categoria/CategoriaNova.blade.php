@extends('layouts.modelo')

<div class="container-central-form">
    <div id="container-form-listagem" class="col-sm-6 ">
        <div class="col-sm-12 d-flex flex-column justify-content-center">
            <h5 id="textos"> Cadastre uma nova categoria</h5>
            <form action="{{ route('categoria.create') }}" method="POST">
                @csrf
                <div class="form-group ">
                    <input type="text" id="input" class="form-control  {{ $errors->has('nome') ? 'is-invalid' : '' }}"
                        name="nome" placeholder="Nome da Categoria">
                    @if ($errors->has('nome'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nome') }}
                        </div>
                    @endif
                    <button type="submit" class="btn btn-success col-sm-10 mt-2" id="btn-rosa">
                        <h5 id="texto-preto">cadastrar</h2>
                    </button>
                    <h5 id="texto-link" class="m-2"><a href="{{ route('dashboard.index') }}">Cancelar</a>
                        <h5>
                </div>
            </form>
        </div>
    </div>
</div>
