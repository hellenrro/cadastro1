@extends('layouts.modelo',["current"=>"usuarios"])


    <h1> Novo usuario</h1>
    <div>
        <form action="{{ route('user.register') }}" method="POST">
            @csrf
            <div> 
                <label for="NomeUsuario">Nome do usuario</label>
                <input type="text" class="" name="name"
                    id="name" placeholder="usuario">
               <label for="email">email do usuario</label>
                 <input type="text" class="" name="email"
                    id="email" placeholder="email">
              <label for="senha">senha do usuario</label>
                <input type="text" class="" name="password"
                    id="password" placeholder="senha">
            </div>
            <button type="submit" class="btn">salvar</button>
            <button type="cancel" class="btn">cancel</button>
        </form>
     </div>

