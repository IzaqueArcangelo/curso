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
                        <a href="{{route('/agendar/aula')}}"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i></a>
                        <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
                        <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
                    </div>
                </div>
                <div class="content-box-large box-with-header">
                    <form id="formAgendamento" method="post" action="#">
                        <fieldset>
                            <legend>Informações do Agendamento</legend>
                        </fieldset>
                        <div class="form-group">
                            <label for="nome">Dia Semana</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="nome" name="nome"
                                       placeholder="Nome completo" value="Segunda-Feira" readonly>
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="nome" class="control-label">Curso</label>
                                    <select class="selectpicker form-control" data-live-search="true">
                                        <option selected disabled>Selecione um Curso</option>
                                        @foreach($cursos as $curso)
                                            <option value="{{$curso->id}}">{{$curso->instrumento->nome}}</option>
                                         @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="nome" class="control-label">Aluno</label>
                                    <select class="selectpicker form-control" data-live-search="true">
                                        <option selected disabled>Selecione um Aluno</option>
                                        @foreach($alunos as $aluno)
                                        <option value="{{$aluno->id}}">{{$aluno->nome}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nome">Horário de Início</label>
                            <div class="bfh-timepicker" data-time="" data-align="right" data-mode="24h" data-name="horaInicio" data-placeholder="Informe o horário de início do curso">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nome">Horário de Término</label>
                            <div class="bfh-timepicker" data-time="" data-align="right" data-mode="24h" data-name="horaTermino" data-placeholder="Informe o horário de termino do curso">
                            </div>
                        </div>

                        <button class="btn btn-primary" type="submit">
                            <i class="fa fa-save"></i>
                            Agendar Aula
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('estilos')
    <link href="{{asset('vendors/select/bootstrap-select.min.css')}}" rel="stylesheet">
    <link href="{{asset('datepiker/css/bootstrap-datepicker.css')}}" rel="stylesheet">
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
    <script src="http://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
    <script src="{{asset('js/forms.js')}}"></script>
@endpush