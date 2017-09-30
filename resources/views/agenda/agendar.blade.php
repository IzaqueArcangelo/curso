@extends('template.template')
@section('conteudo')
    <div class="col-md-10">
        <div class="row">
            <div class="col-md-12">
                @include('template.mensagens')
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="content-box-header">
                    <div class="panel-title">Agendar Aula</div>
                    <div class="panel-options">
                        {{--<a href="{{route('/agendar/aula/dia', 1)}}"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i></a>--}}
                        <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
                        <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
                    </div>
                </div>
                <div class="content-box-large box-with-header">
                    @isset($inscricao)
                        <form id="formAgendamento" method="post" action="{{route('/atualizar/agendamento', $inscricao->id)}}">
                        {!! method_field('PUT') !!}
                        @else
                        <form id="formAgendamento" method="post" action="{{route('/salvar/agendamento')}}">
                        @endisset
                        {{csrf_field()}}
                        <fieldset>
                            <legend>Informações do Agendamento</legend>
                        </fieldset>
                        <div class="row">
                        <div class="form-group col-md-5 {{ $errors->has('diaSemana') ? ' has-error' : '' }}">
                            <label for="nome">Dia Semana</label>
                            @isset($inscricao)
                                <select class="selectpicker form-control" data-live-search="true" name="diaSemana">
                                    <option selected disabled>Selecione um dia</option>
                                    @foreach($dias as $dia)
                                        <option value="{{$dia->id}}" {{ (( isset($inscricao) ? $inscricao->dia->id : old('diaSemana')) == $dia->id) ? "selected" : ""}} >{{$dia->nome}}</option>
                                    @endforeach
                                </select>
                                @else
                               <div class="input-group">
                                    <input type="text" class="form-control"
                                           placeholder="Nome completo" value="{{$dia->nome}}" readonly>

                                    <input type="hidden" class="form-control" id="diaSemana" name="diaSemana"
                                           placeholder="Nome completo" value="{{$dia->id}}" readonly>

                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                </div>
                             @endisset
                            @if ($errors->has('diaSemana'))
                                <span class="help-block">
                                            <p class="help-block text-danger text-left"><strong>{{ $errors->first('diaSemana') }}</strong></p>
                                        </span>
                            @endif
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group {{ $errors->has('curso') ? ' has-error' : '' }}">
                                    <label for="nome" class="control-label">Curso</label>
                                    <select class="selectpicker form-control" data-live-search="true" id="curso" name="curso">
                                        <option selected disabled>Selecione um Curso</option>
                                        @foreach($cursos as $curso)
                                            <option value="{{$curso->id}}" {{ (( isset($inscricao) ? $inscricao->curso->id : old('curso')) == $curso->id) ? "selected" : ""}} >{{$curso->nome}}</option>
                                         @endforeach
                                    </select>
                                    @if ($errors->has('curso'))
                                        <span class="help-block">
                                            <p class="help-block text-danger text-left"><strong>{{ $errors->first('curso') }}</strong></p>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group {{ $errors->has('professor') ? ' has-error' : '' }}">
                                        <label for="professor" class="control-label">Professor</label>
                                        <select class="selectpicker form-control professor" name="professor" id="lista_professor">
                                            <option selected disabled>Selecione um professor</option>

                                            @isset($inscricao)
                                                @foreach($inscricao->curso->professores as $professor)
                                                    {{--<option value="{{$inscricao->professor->id}}" selected>{{$inscricao->professor->nome}}</option>--}}
                                                    <option value="{{$professor->id}}" {{ ( $inscricao->professor->id == $professor->id) ? "selected" : ""}} >{{$professor->nome}}</option>
                                                @endforeach
                                            @endisset

                                        </select>
                                        @if ($errors->has('professor'))
                                            <span class="help-block">
                                            <p class="help-block text-danger text-left"><strong>{{ $errors->first('professor') }}</strong></p>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group {{ $errors->has('aluno') ? ' has-error' : '' }}">
                                    <label for="nome" class="control-label">Aluno</label>
                                    <select class="selectpicker form-control" data-live-search="true" name="aluno" {{isset($inscricao)? 'disabled' : ''}}>
                                        <option selected disabled>Selecione um Aluno</option>
                                        @foreach($alunos as $aluno)
                                        <option value="{{$aluno->id}}" {{ (( isset($inscricao) ? $inscricao->aluno->id : old('aluno')) == $aluno->id) ? "selected" : ""}} >{{$aluno->nome}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('aluno'))
                                        <span class="help-block">
                                            <p class="help-block text-danger text-left"><strong>{{ $errors->first('aluno') }}</strong></p>
                                        </span>
                                    @endif
                                    @isset($inscricao)
                                        <input type="hidden" value="{{$inscricao->aluno->id}}" name="aluno">
                                    @endisset
                                </div>
                            </div>
                        </div>
                        {{--<div class="form-group">
                            <label for="nome">Horário de Início</label>
                            <div class="bfh-timepicker" data-time="now" data-align="right" data-mode="24h" data-name="horaInicio" data-placeholder="Informe o horário de início do curso">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nome">Horário de Término</label>
                            <div class="bfh-timepicker" data-time="now+1" data-align="right" data-mode="24h" data-name="horaTermino" data-placeholder="Informe o horário de termino do curso">
                            </div>
                        </div>--}}

                        <div class="form-group {{ $errors->has('horaInicio') ? ' has-error' : '' }}">
                            <label for="horaInicio" class="control-label">Horário de Início</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="horaInicio" name="horaInicio"
                                       placeholder="Horário de Inicio" value="{{ $inscricao->horaInicio or old('horaInicio')}}">
                                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                            </div>
                            @if ($errors->has('horaInicio'))
                                <span class="help-block">
                                            <p class="help-block text-danger text-left"><strong>{{ $errors->first('horaInicio') }}</strong></p>
                                </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('horaTermino') ? ' has-error' : '' }}">
                            <label for="horaTermino" class="control-label">Horário de Término</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="horaTermino" name="horaTermino"
                                       placeholder="Horário de Término do curso" value="{{$inscricao->horaTermino or old('horaTermino')}}">
                                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                            </div>
                            @if ($errors->has('horaTermino'))
                                <span class="help-block">
                                            <p class="help-block text-danger text-left"><strong>{{ $errors->first('horaTermino') }}</strong></p>
                                        </span>
                            @endif
                        </div>


                        <button class="btn btn-primary" type="submit">
                            <i class="fa fa-save"></i>
                            {{isset($inscricao) ? 'Atualizar Agendamento' : 'Agendar Aula'}}
                        </button>
                    </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('estilos')
    <link href="{{asset('vendors/select/bootstrap-select.min.css')}}" rel="stylesheet">
    <link href="{{asset('datepiker/css/bootstrap-datepicker.css')}}" rel="stylesheet">
    <link href="{{asset('css/jquery.datetimepicker.min.css')}}" rel="stylesheet">
    <!-- Bootstrap Form Helpers -->
    <link href="{{asset('vendors/form-helpers/css/bootstrap-formhelpers.min.css')}}" rel="stylesheet" media="screen">
@endpush
@push('scripts')
    <!-- Bootstrap Form Helpers -->
    <script src="{{asset('vendors/form-helpers/js/bootstrap-formhelpers.min.js')}}"></script>
    <script src="{{asset('vendors/select/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('vendors/mask/jquery.maskedinput.min.js')}}"></script>
    <script src="{{asset('datepiker/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('datepiker/locales/bootstrap-datepicker.pt-BR.min.js')}}"></script>
    <script src="{{asset('js/jquery.mask.js')}}"></script>
    <script src="{{asset('js/jquery.datetimepicker.full.min.js')}}"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
    <script src="{{asset('js/forms.js')}}"></script>
    <script src="{{asset('js/dropdown.js')}}"></script>
@endpush