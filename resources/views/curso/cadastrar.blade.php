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
                    <div class="panel-title ">Cadastrar Curso</div>
                    <div class="panel-options">
                        <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
                        <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
                    </div>
                </div>
                <div class="content-box-large box-with-header">
                    <div class="panel-body">
                        {{-- Formulário de cadastro --}}
                        @isset($curso)
                            <form action="{{route('/atualizar/curso', $curso->id)}}" method="POST">
                                {!! method_field('PUT') !!}
                                @else
                                <form action="{{route('/salvar/curso')}}" method="post">
                                    @endisset
                                    {{csrf_field()}}
                                <fieldset>
                                <legend>Dados do Curso</legend>
                                <div class="form-group {{ $errors->has('nome') ? ' has-error' : '' }}">
                                    <label for="nome">Nome Curso</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Curso" value="{{ $curso->nome or old('nome')}}" {{isset($readonly) ? 'readonly' : ''}}>
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    </div>
                                    @if ($errors->has('nome'))
                                        <span class="help-block">
                                            <p class="help-block text-danger text-left"><strong>{{ $errors->first('nome') }}</strong></p>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('valor') ? ' has-error' : '' }}">
                                    <label for="nome">Valor</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="valor" name="valor" placeholder="Valor do Curso" value="{{$curso->valor or old('valor')}}" {{isset($readonly) ? 'readonly' : ''}}>
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    </div>
                                    @if ($errors->has('valor'))
                                        <span class="help-block">
                                            <p class="help-block text-danger text-left"><strong>{{ $errors->first('valor') }}</strong></p>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('instrumento') ? ' has-error' : '' }}">
                                    <label for="nome">Instrumento</label>
                                    <div class="input-group">
                                    <select class="selectpicker " name="instrumento" data-live-search="true" {{isset($readonly) ? 'disabled' : ''}}>
                                        <option disabled selected>Selecione</option>
                                        @foreach($instrumentos as $instrumento)
                                            <option value="{{$instrumento->id}}" data-tokens="{{$instrumento->nome}}" {{ (( isset($curso) ? $curso->instrumento->id : old('instrumento')) == $instrumento->id) ? "selected" : ""}} >{{$instrumento->nome}}</option>
                                        @endforeach
                                    </select>
                                        @if ($errors->has('instrumento'))
                                            <span class="help-block">
                                            <p class="help-block text-danger text-left"><strong>{{ $errors->first('nome') }}</strong></p>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </fieldset>
                            <button class="btn btn-primary" type="submit" {{isset($readonly) ? 'disabled' : ''}}>
                                <i class="fa fa-save"></i>
                                {{isset($curso) ? 'Atualizar' : 'Salvar'}}
                            </button>
                        </form>
                        {{-- Fim do formulário de cadastro --}}
                      </form>
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