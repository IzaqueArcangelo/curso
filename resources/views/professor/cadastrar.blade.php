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
                        @isset($professor)
                            <form action="{{route('/atualizar/professor', $professor->id)}}" method="POST">
                                {!! method_field('PUT') !!}
                                @else
                                    <form action="{{route('/salvar/professor')}}" method="post">
                                        @endisset
                                        {{csrf_field()}}
                                        <fieldset>
                                            <legend>Dados do Professor</legend>
                                            <div class="form-group {{ $errors->has('nome') ? ' has-error' : '' }}">
                                                <label for="nome" class="control-label">Nome</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="nome" name="nome"
                                                           placeholder="Nome completo"
                                                           value="{{$professor->nome or old('nome')}}">
                                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                </div>
                                                @if ($errors->has('nome'))
                                                    <span class="help-block">
                                            <p class="help-block text-danger text-left"><strong>{{ $errors->first('nome') }}</strong></p>
                                        </span>
                                                @endif
                                            </div>
                                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label for="email" class="control-label">Email</label>
                                                <div class="input-group">
                                                    <input type="email" class="form-control" id="email" name="email"
                                                           placeholder="Email"
                                                           value="{{$professor->email or old('email')}}">
                                                    <span class="input-group-addon"><i class="fa fa-at"></i></span>
                                                </div>
                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                            <p class="help-block text-danger text-left"><strong>{{ $errors->first('email') }}</strong></p>
                                        </span>
                                                @endif
                                            </div>
                                            <div class="form-group {{ $errors->has('telefone') ? ' has-error' : '' }}">
                                                <label for="telefone" class="control-label">Telefone</label>
                                                <div class="input-group">
                                                    <input id="telefone" name="telefone" type="text"
                                                           class="form-control"
                                                           data-mask="(99) 99999-9999"
                                                           data-mask-placeholder="9" placeholder="Telefone"
                                                           value="{{$professor->telefone or old('telefone')}}">
                                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                                </div>
                                                @if ($errors->has('telefone'))
                                                    <span class="help-block">
                                            <p class="help-block text-danger text-left"><strong>{{ $errors->first('telefone') }}</strong></p>
                                        </span>
                                                @endif
                                            </div>

                                            <div class="form-group {{ $errors->has('matricula') ? ' has-error' : '' }}">
                                                <label for="matricula" class="control-label">Matricula</label>
                                                <div class="input-group">
                                                    <input type="text" id="matricula" name="matricula"
                                                           class="form-control"
                                                           placeholder="Matrícula"
                                                           value="{{$professor->matricula or old('matricula')}}">
                                                    <span
                                                            class="input-group-addon"><i
                                                                class="glyphicon glyphicon-calendar"></i></span>
                                                </div>
                                                @if ($errors->has('matricula'))
                                                    <span class="help-block">
                                            <p class="help-block text-danger text-left"><strong>{{ $errors->first('matricula') }}</strong></p>
                                        </span>
                                                @endif
                                            </div>

                                            <div class="form-group {{ $errors->has('cursos') ? ' has-error' : '' }}">
                                                <label for="nome" class="control-label">Lista de Cursos</label>
                                                <div class="input-group">
                                                    <select class="selectpicker" title="Selecione" name="cursos[]"
                                                            multiple data-live-search="true">
                                                        <option disabled>Selecione os cursos</option>
                                                        @foreach($cursos as $curso)
                                                            @isset($professor)
                                                                @if($professor->cursos->contains($curso->id))
                                                                    <option value="{{$curso->id}}"
                                                                            data-tokens="{{$curso->nome}}"
                                                                            data-subtext="{{$curso->valor}}"
                                                                            selected>{{$curso->nome}}</option>
                                                                @else
                                                                    <option value="{{$curso->id}}"
                                                                            data-tokens="{{$curso->nome}}"
                                                                            data-subtext="{{$curso->valor}}"
                                                                            >{{$curso->nome}}</option>
                                                                @endif
                                                                @else
                                                                    @if(collect(old('cursos'))->contains($curso->id))
                                                                        <option value="{{$curso->id}}"
                                                                                data-tokens="{{$curso->nome}}"
                                                                                data-subtext="{{$curso->valor}}"
                                                                                selected>{{$curso->nome}}</option>
                                                                    @else
                                                                        <option value="{{$curso->id}}"
                                                                                data-tokens="{{$curso->nome}}"
                                                                                data-subtext="{{$curso->valor}}"
                                                                                >{{$curso->nome}}</option>
                                                                    @endif
                                                            @endisset

                                                       @endforeach
                                                    </select>
                                                    @if ($errors->has('cursos'))
                                                        <span class="help-block">
                                            <p class="help-block text-danger text-left"><strong>{{ $errors->first('cursos') }}</strong></p>
                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </fieldset>


                                        <button class="btn btn-primary" type="submit">
                                            <i class="fa fa-save"></i>
                                            Salvar
                                        </button>
                                    </form>
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