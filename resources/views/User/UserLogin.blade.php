@extends('layouts.modelo')

<div class="container-central-form">
    <div id="container-form" class="col-sm-6">
        <div class="col-sm-12 d-flex flex-column justify-content-center" >
            <form action="{{  route('user.login') }}" method="POST">
                @csrf
                @if($errors->all())
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger role=alert">
                        {{$error}}
                    </div>  
                    @endforeach
               @endif
            
                <div class="form-group">
                            <input type="email" id="input" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" name="email" id="email" placeholder="Email">
                            @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email')}}
                            </div>
                            @endif
                </div>
               
                <div class="form-group">
                            <input type="password" id="input"  class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" name="password" id="password" placeholder="Senha">
                            @if($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password')}}
                            </div>
                            @endif
                </div>
                
                <button type="submit" class="btn btn-success col-sm-12 " id="btn-rosa"><h5 id="texto-preto">Login</h5></button></br>
                <h5 id="texto-link" class="m-2"><a href="{{route('user.register')}}" >Não tem conta? Registre-se aqui</a><h5>
            </form>
        </div>
    </div>
</div>


    
