@extends('layouts.modelo')
@section('title', 'Criar Despesa')
    <div class="container-central-form-despesa">
        <div id="container-form-despesa" class="col-sm-8">
            <div class="col-sm-12 d-flex flex-column justify-content-center">
                <form action="{{ route('despesas.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row m-1 mx-0">
                        <div class="col mx-0 mt-1">
                            <input type="date" id="input"
                                class="form-control  {{ $errors->has('data') ? 'is-invalid' : '' }}" name="data"
                                placeholder="data">
                            @if ($errors->has('data'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('data') }}
                                </div>
                            @endif
                        </div>
                        <div class="col mx-0 mt-1 ">
                            <input type="text" id="input"
                                class="form-control   {{ $errors->has('valor') ? 'is-invalid' : '' }}" name="valor"
                                placeholder="Valor da Despesa">
                            @if ($errors->has('valor'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('valor') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group m-2">
                        <label>Descrição da Despesa</label>
                        <textarea id="input" class="form-control {{ $errors->has('descricao') ? 'is-invalid' : '' }}"
                            name="descricao" placeholder="Descrição">
                            </textarea>
                        @if ($errors->has('descricao'))
                            <div class="invalid-feedback">
                                {{ $errors->first('descricao') }}
                            </div>
                        @endif
                    </div>

                    <div>
                        <div class="form-group">
                            <label>Selecione a categoria da sua despesa</label>
                            <select class="form-control" id="select" name="categoria">
                                @if (count($categorias) > 0)
                                    <option></option>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="file" id="input" name="image" class="from-control-file
                                {{ $errors->has('image') ? 'is-invalid' : '' }}">
                        @if ($errors->has('image'))
                            <div class="invalid-feedback">
                                {{ $errors->first('image') }}
                            </div>
                        @endif
                    </div>



                    <button type="submit" class="btn col-sm-6" id="btn-rosa">salvar</button>
                    <h5 id="texto-link" class="m-2"><a href="{{ route('dashboard.index') }}">Cancelar</a>


                </form>
            </div>
        </div>
