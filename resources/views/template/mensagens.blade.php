@if(Session::has('alerta-sucesso'))
<div class="alert alert-success" role="alert">
    <strong>Sucesso!</strong>  {{ Session::get('alerta-sucesso') }}
</div>
@endif
@if(Session::has('alerta-informacao'))
<div class="alert alert-info" role="alert">
    <strong>Informação!</strong> {{ Session::get('alerta-informacao') }}
</div>
@endif
@if(Session::has('alerta-atencao'))
<div class="alert alert-warning" role="alert">
    <strong>Perigo!</strong> {{ Session::get('alerta-atencao') }}
</div>
@endif
@if(Session::has('alerta-perigo'))
<div class="alert alert-danger" role="alert">
    <strong>Erro!</strong> {{ Session::get('alerta-perigo') }}
</div>
@endif