@if(Session::has('alerta-sucesso'))
<div class="alert alert-success" role="alert">
    <strong>Well done!</strong> You successfully read this important alert message.
</div>
@endif
@if(Session::has('alerta-informacao'))
<div class="alert alert-info" role="alert">
    <strong>Heads up!</strong> This alert needs your attention, but it's not super important.
</div>
@endif
@if(Session::has('alerta-atencao'))
<div class="alert alert-warning" role="alert">
    <strong>Warning!</strong> Better check yourself, you're not looking too good.
</div>
@endif
@if(Session::has('alerta-perigo'))
<div class="alert alert-danger" role="alert">
    <strong>Oh snap!</strong> Change a few things up and try submitting again.
</div>
@endif