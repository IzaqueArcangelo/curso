@extends('template.template')
@section('conteudo')
    <div class="col-md-10">
        <div class="row">
            <div class="col-md-12">
                @include('template.mensagens')
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 panel-default">
                <div class="content-box-header panel-heading">
                    <div class="panel-title ">Cadastrar Professor</div>
                    <div class="panel-options">
                        <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
                        <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
                    </div>
                </div>
                <div class="content-box-large box-with-header">
                    <div class="panel-body">
                        {{-- Formulário de cadastro --}}
                        <form>
                            <fieldset>
                                <legend>Dados do Professor</legend>
                                <div class="form-group">
                                    <label for="nome">Nome</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome completo">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <div class="input-group">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                        <span class="input-group-addon"><i class="fa fa-at"></i></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="telefone">Telefone</label>
                                    <div class="input-group">
                                        <input id="telefone" name="telefone" type="text" class="form-control"
                                               data-mask="(99) 99999-9999"
                                               data-mask-placeholder="9" placeholder="Telefone">
                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="matricula">Matricula</label>
                                    <div class="input-group">
                                        <input type="text" id="matricula" name="matricula" class="form-control"
                                               placeholder="Matrícula">
                                        <span
                                                class="input-group-addon"><i
                                                    class="glyphicon glyphicon-calendar"></i></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="nome">Lista de Cursos</label>
                                    <div class="input-group">
                                        <select class="selectpicker" title="Selecione" name="cursos" multiple>
                                            <option disabled>Selecione os cursos</option>
                                            <option>1</option>
                                            <option>5</option>
                                            <option>10</option>
                                            <option>20</option>
                                        </select>
                                    </div>
                                </div>
                            </fieldset>


                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-save"></i>
                                Salvar
                            </button>
                        </form>
                        {{-- Fim do formulário de cadastro --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('estilos')
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href="{{asset('vendors/form-helpers/css/bootstrap-formhelpers.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/select/bootstrap-select.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/tags/css/bootstrap-tags.css')}}" rel="stylesheet">
    <link href="{{asset('datepiker/css/bootstrap-datepicker.css')}}" rel="stylesheet">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css"
          rel="stylesheet"/>
@endpush
@push('scripts')
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script src="{{asset('vendors/form-helpers/js/bootstrap-formhelpers.min.js')}}"></script>
    <script src="{{asset('vendors/select/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('vendors/tags/js/bootstrap-tags.min.js')}}"></script>
    <script src="{{asset('vendors/mask/jquery.maskedinput.min.js')}}"></script>
    <script src="{{asset('vendors/moment/moment.min.js')}}"></script>
    <script src="{{asset('vendors/wizard/jquery.bootstrap.wizard.min.js')}}"></script>
    <!-- bootstrap-datetimepicker -->
    <link href="{{asset('vendors/bootstrap-datetimepicker/datetimepicker.css')}}" rel="stylesheet">
    <script src="{{asset('vendors/bootstrap-datetimepicker/bootstrap-datetimepicker.js')}}"></script>
    <script src="{{asset('datepiker/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('datepiker/locales/bootstrap-datepicker.pt-BR.min.js')}}"></script>
    <script src="{{asset('js/jquery.mask.js')}}"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
    <script src="{{asset('js/forms.js')}}"></script>
@endpush