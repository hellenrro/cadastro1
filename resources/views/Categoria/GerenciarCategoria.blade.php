@extends('layouts.modelo')

<div class="align-items-center mt-5">
    <a href="{{ route('categoria.create.index') }}">
        <center><button class="btn btn-success col-sm-2" id="btn-preto">Adicionar Categorias</button></center>
    </a>

    <div class="col-sm-12 d-flex flex-column mt-2 ">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">
                        protocolo
                    </th>
                    <th scope="col">
                        nome
                    </th>
                    <th scope="col">
                        ação
                    </th>
                </tr>
            </thead>
            <tbody>
                @if (count($categorias) > 0)
                    @foreach ($categorias as $categoria)
                        <tr>
                            <th scope="row">
                                {{ $categoria->id }}
                            </th>
                            <td>
                                {{ $categoria->nome }}
                            </td>
                            <td><a href="{{ route('categoria.delete', $categoria->id) }}">
                                    <ion-icon name="trash-outline"></ion-icon>
                                </a></td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
