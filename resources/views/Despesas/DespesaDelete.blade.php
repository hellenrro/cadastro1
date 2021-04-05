@extends('layouts.modelo')
@section('title', 'deletar despesa')
<form method="POST" action="{{ route('despesa.delete', $despesa->id) }}">
    @csrf
    <div class="modal fade" id="modal-mensagem">
        <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                     <h4 class="modal-title">Título da mensagem</h4>
                 </div>
                 <div class="modal-body">
                     <p>Conteúdo da mensagem</p>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                 </div>
             </div>
         </div>
     </div
</form>