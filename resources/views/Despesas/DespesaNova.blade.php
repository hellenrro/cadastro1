<html>
    <head >
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title> nova categoria </title>
        <meta name="csrf-token" content="{{ csrf_token() }}"
    </head>
<body>
  
        <h1> Novo usuario</h1>
        <form action="{{ route('despesas.create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div> 
                <label for="descricao">Nome da despesa</label>
                <input type="text" class="" name="descricao"
                    id="descricao" placeholder="despesa">
               
                <label for="valor">valor</label>
                 <input type="text" class="" name="valor"
                    id="valor" placeholder="valor">
                
                <label for="imagem">submeta sua imagemmmmmmmmmmmm</label>
                <input type="file" name"imagem">
               
            </div>
            <button type="submit" class="btn">salvar</button>
            <button type="cancel" class="btn">cancel</button>
        </form>
       
</body>
</html>