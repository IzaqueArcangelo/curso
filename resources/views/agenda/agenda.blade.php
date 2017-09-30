@extends('template.template')
@section('conteudo')
    <div class="col-md-10">
        <div class="row">
            <div class="col-md-12">
                @include('template.mensagens')
            </div>
        </div>
        @foreach($dias as $dia)
            <div class="row">
                <div class="col-md-12">
                    <div class="content-box-header">
                        <div class="panel-title">{{$dia->nome}}</div>
                        <div class="panel-options">
                            <a href="{{route('/agendar/aula/dia', $dia->id)}}"><i class="glyphicon glyphicon-plus"
                                                                                  aria-hidden="true"></i></a>
                            {{--<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>--}}
                            <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
                        </div>
                    </div>

                    <div class="content-box-large box-with-header">
                        <table class="table table-striped tabela-centralizada">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Curso</th>
                                <th>Professor</th>
                                <th>Aluno</th>
                                <th>Inicio</th>
                                <th>Término</th>
                                <th><i class="glyphicon glyphicon-cog"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($inscricoes as $inscricao)
                                @if($inscricao->dia->id == $dia->id)
                                    <tr>
                                        <td>{{$inscricao->id}}</td>
                                        <td>{{$inscricao->curso->nome}}</td>
                                        <td>{{$inscricao->professor->nome}}</td>
                                        <td>{{$inscricao->aluno->nome}}</td>
                                        <td>{{$inscricao->horaInicio}}</td>
                                        <td>{{$inscricao->horaTermino}}</td>
                                        <td style="text-align: center;">
                                            <button class="btn-nude" onclick="document.getElementById('editar-form-{{$inscricao->id}}').submit();"><i class="fa fa-pencil-square-o" title="Editar" aria-hidden="true"></i></button>
                                            <button class="btn-nude" onclick="document.getElementById('deletar-form-{{$inscricao->id}}').submit();"><i class="fa fa-trash-o" title="Apagar" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                    <form id="editar-form-{{$inscricao->id}}"
                                          method="GET"
                                          action="{{route('/editar/agendamento',$inscricao->id)}}">
                                        {{--{{csrf_field()}}--}}
                                    </form>
                                    <form id="deletar-form-{{$inscricao->id}}"
                                          method="GET"
                                          action="{{route('/deletar/agendamento',$inscricao->id)}}">
                                        {{--{{csrf_field()}}--}}
                                    </form>
                                @endif
                            @endforeach
                            @if($inscricoes->contains('id_dia', $dia->id) == false)
                                <tr class="no-records-found">
                                    <td colspan="7">Não há cursos agendados para este dia</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                        <br/><br/>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection