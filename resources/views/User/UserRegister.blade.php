@extends('layouts.modelo')

<div class="container-central-form">
    <div id="container-form" class="col-sm-6">
        <div class="col-sm-12 d-flex flex-column justify-content-center">
            <form action="{{ route('user.register') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" id="input" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                        name="name" id="name" placeholder="Usuario">
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <input type="email" id="input" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                        name="email" id="email" placeholder="Email">
                    @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <input type="password" id="input"
                        class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password"
                        id="password" placeholder="Senha">
                    @if ($errors->has('password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </div>

                <button type="submit" class="btn btn-success col-sm-12" id="btn-rosa">
                    <h5 id="texto-preto">Registrar</h2>
                </button>
            </form>
        </div>
    </div>
</div>
