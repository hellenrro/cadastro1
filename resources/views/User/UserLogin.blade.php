@extends('layouts.modelo',["current"=>"usuarios"])


    <h1> bem vindo</h1>
    <div>
        <form action="{{ route('user.login') }}" method="POST">
            @csrf
            <div> 
               <label for="email">email do usuario</label>
                 <input type="text" class="" name="email"
                    id="email" placeholder="email">
              <label for="senha">senha do usuario</label>
                <input type="text" class="" name="password"
                    id="password" placeholder="senha">
            </div>
            <button type="submit" class="btn">entrar</button>
            <button type="cancel" class="btn">cancel</button>
        </form>
     </div>




