// Lê o curso selecionado na inicialização.
$(document).ready(function() {

    var id_curso = $( "#curso" ).val();
    var id_professor = $( "#lista_professor" ).val();

    // utilizado no refresh da página ou quando uma inscrição for editada.
    if(id_curso!=null && id_professor == null){
        $.get('/listar/professores/curso/'+id_curso, function (data) {
            //limpa o select
            $("#lista_professor").empty();
            //mantem a primeira opção habilitada
            $("#lista_professor").append("<option selected disabled>Selecione um professor</option>");
            $.each(data, function (index, professor) {
                //contatena os valores no select
                $("#lista_professor").append('<option value="'+professor.id+'">'+professor.nome+'<option>');
                //atualiza
                $('.professor').selectpicker('refresh');
            })
        })
    }

    //Evento
    $("#curso").on('change', function(e){

        var id_curso = e.target.value;
        //Ajax
        $.get('/listar/professores/curso/'+id_curso, function (data) {
            //limpa o select
            $("#lista_professor").empty();
            //mantem a primeira opção habilitada
            $("#lista_professor").append("<option selected disabled>Selecione um professor</option>");
            $.each(data, function (index, professor) {
                //contatena os valores no select
                $("#lista_professor").append('<option value="'+professor.id+'">'+professor.nome+'<option>');
                //atualiza
                $('.professor').selectpicker('refresh');
            })
        })
    })
});

