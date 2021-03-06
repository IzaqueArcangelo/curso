$(document).ready(function(){
	// Select
	$('.selectpicker').selectpicker();

	//Date picker
    $('#dataNascimento input').datepicker({
        format: 'dd/mm/yyyy',
        language: 'pt-BR',
    });
    //Date picker
    $('#dataPagamento input').datepicker({
        format: 'dd/mm/yyyy',
        language: 'pt-BR',
    });

    // Desabilitando o envio do formulário com o ENTER
    $('#formAgendamento').bind("keypress", function(e) {
        if (e.keyCode == 13) {
            return false;
        }
    });

    //https://xdsoft.net/jqplugins/datetimepicker/
    jQuery('#horaInicio').datetimepicker({
        datepicker:false,
        format:'H:i'
    });

    jQuery('#horaTermino').datetimepicker({
        datepicker:false,
        format:'H:i'
    });

    // Plugin de máscara
    $('.cpf').mask('000.000.000-00', {reverse: true});
    $('.cep').mask('00000-000');

});