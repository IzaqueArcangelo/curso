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
                    <div class="panel-title ">
                        {{ isset($aluno) ? 'Editar' : 'Cadastrar' }} Aluno
                    </div>
                    <div class="panel-options">
                        <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
                        <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
                    </div>
                </div>
                <div class="content-box-large box-with-header">
                    <div class="panel-body">
                        {{-- Formulário de cadastro --}}
                        @isset($aluno)
                            <form action="{{route('/atualizar/aluno', $aluno->id)}}" method="POST">
                                {!! method_field('PUT') !!}
                                @else
                                    <form action="{{route('/salvar/aluno')}}" method="POST">
                                        @endisset
                                        {{csrf_field()}}
                                        <fieldset>
                                            <legend>Dados do Aluno</legend>
                                            <div class="form-group {{ $errors->has('nome') ? ' has-error' : '' }}">
                                                <label for="nome">Nome</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="nome" name="nome"
                                                           placeholder="Nome completo"
                                                           value="{{ $aluno->nome or old('nome')}}" {{ isset($readonly) ? 'readonly' : ''}}>
                                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                </div>
                                                @if ($errors->has('nome'))
                                                    <span class="help-block">
                                            <p class="help-block text-danger text-left"><strong>{{ $errors->first('nome') }}</strong></p>
                                        </span>
                                                @endif
                                            </div>
                                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label for="email">Email</label>
                                                <div class="input-group">
                                                    <input type="email" class="form-control" id="email" name="email"
                                                           placeholder="Email"
                                                           value="{{ $aluno->email or old('email')}}" {{ isset($readonly) ? 'readonly' : ''}}>
                                                    <span class="input-group-addon"><i class="fa fa-at"></i></span>
                                                </div>
                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                            <p class="help-block text-danger text-left"><strong>{{ $errors->first('email') }}</strong></p>
                                        </span>
                                                @endif
                                            </div>
                                            <div class="form-group {{ $errors->has('telefone') ? ' has-error' : '' }}">
                                                <label for="telefone">Telefone</label>
                                                <div class="input-group">
                                                    <input id="telefone" name="telefone" type="text"
                                                           class="form-control"
                                                           data-mask="(99) 99999-9999"
                                                           data-mask-placeholder="9" placeholder="Telefone"
                                                           value="{{ $aluno->telefone or  old('telefone')}}" {{ isset($readonly) ? 'readonly' : ''}}>
                                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                                </div>
                                                @if ($errors->has('telefone'))
                                                    <span class="help-block">
                                            <p class="help-block text-danger text-left"><strong>{{ $errors->first('telefone') }}</strong></p>
                                        </span>
                                                @endif
                                            </div>
                                            <div class="form-group {{ $errors->has('dtNascimento') ? ' has-error' : '' }}">
                                                <label for="dtNascimento">Data Nascimento</label>
                                                <div class="input-group" id="dataNascimento">
                                                    <input id="dtNascimento" name="dtNascimento" class="form-control"
                                                           data-date-end-date="0d"
                                                           data-mask="99/99/9999"
                                                           data-mask-placeholder="-"
                                                           placeholder="Data de Nascimento"
                                                           value="{{ $aluno->dataNascimento or old('dtNascimento')}}" {{ isset($readonly) ? 'readonly' : ''}}>

                                                    <span
                                                            class="input-group-addon"><i
                                                                class="glyphicon glyphicon-calendar"></i></span>
                                                </div>
                                                @if ($errors->has('dtNascimento'))
                                                    <span class="help-block">
                                            <p class="help-block text-danger text-left"><strong>{{ $errors->first('dtNascimento') }}</strong></p>
                                        </span>
                                                @endif
                                            </div>
                                            <div class="form-group {{ $errors->has('cpf') ? ' has-error' : '' }}">
                                                <label for="cpf">CPF</label>
                                                <div class="input-group">
                                                    <input type="text" id="cpf" name="cpf" class="form-control cpf"
                                                           placeholder="CPF"
                                                           value="{{ $aluno->CPF or old('cpf')}}" {{ isset($readonly) ? 'readonly' : ''}}>
                                                    <span
                                                            class="input-group-addon"><i class="fa fa-id-card-o"
                                                                                         aria-hidden="true"></i></span>
                                                </div>
                                                @if ($errors->has('cpf'))
                                                    <span class="help-block">
                                            <p class="help-block text-danger text-left"><strong>{{ $errors->first('cpf') }}</strong></p>
                                        </span>
                                                @endif
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <legend>Endereço</legend>
                                            <div class="form-group {{ $errors->has('rua') ? ' has-error' : '' }}">
                                                <label for="nome">Rua</label>
                                                <input type="text" class="form-control" id="rua" name="rua"
                                                       placeholder="Rua"
                                                       value="{{ $aluno->endereco->rua or old('rua')}}" {{ isset($readonly) ? 'readonly' : ''}}>
                                                @if($errors->has('rua'))
                                                    <span class="help-block">
                                            <p class="help-block text-danger text-left"><strong>{{ $errors->first('rua') }}</strong></p>
                                        </span>
                                                @endif
                                            </div>
                                            <div class="form-group {{ $errors->has('numero') ? ' has-error' : '' }}">
                                                <label for="nome">Número</label>
                                                <input type="text" class="form-control" id="numero" name="numero"
                                                       placeholder="Número"
                                                       value="{{ $aluno->endereco->numero or old('numero')}}" {{ isset($readonly) ? 'readonly' : ''}}>
                                                @if($errors->has('numero'))
                                                    <span class="help-block">
                                            <p class="help-block text-danger text-left"><strong>{{ $errors->first('numero') }}</strong></p>
                                        </span>
                                                @endif
                                            </div>
                                            <div class="form-group {{ $errors->has('complemento') ? ' has-error' : '' }}">
                                                <label for="nome">Complemento</label>
                                                <input type="text" class="form-control" id="complemento"
                                                       name="complemento"
                                                       placeholder="Complemento"
                                                       value="{{$aluno->endereco->complemento or old('complemento')}}" {{ isset($readonly) ? 'readonly' : ''}}>
                                                @if($errors->has('complemento'))
                                                    <span class="help-block">
                                            <p class="help-block text-danger text-left"><strong>{{ $errors->first('complemento') }}</strong></p>
                                        </span>
                                                @endif
                                            </div>
                                            <div class="form-group {{ $errors->has('cep') ? ' has-error' : '' }}">
                                                <label for="nome">CEP</label>
                                                <input type="text" class="form-control cep" id="cep" name="cep"
                                                       placeholder="CEP"
                                                       value="{{$aluno->endereco->CEP or old('cep')}}" {{ isset($readonly) ? 'readonly' : ''}}>
                                                @if($errors->has('cep'))
                                                    <span class="help-block">
                                            <p class="help-block text-danger text-left"><strong>{{ $errors->first('cep') }}</strong></p>
                                        </span>
                                                @endif
                                            </div>
                                            <div class="form-group {{ $errors->has('bairro') ? ' has-error' : '' }}">
                                                <label for="nome">Bairro</label>
                                                <input type="text" class="form-control" id="bairro" name="bairro"
                                                       placeholder="Bairro"
                                                       value="{{$aluno->endereco->bairro or old('bairro')}}" {{ isset($readonly) ? 'readonly' : ''}}>
                                                @if($errors->has('bairro'))
                                                    <span class="help-block">
                                            <p class="help-block text-danger text-left"><strong>{{ $errors->first('bairro') }}</strong></p>
                                        </span>
                                                @endif
                                            </div>
                                            <div class="form-group {{ $errors->has('municipio') ? ' has-error' : '' }}">
                                                <label for="nome">Municipio</label>
                                                <input type="text" class="form-control" id="municipio" name="municipio"
                                                       placeholder="Municipio"
                                                       value="{{$aluno->endereco->municipio or old('municipio')}}" {{ isset($readonly) ? 'readonly' : ''}}>
                                                @if($errors->has('municipio'))
                                                    <span class="help-block">
                                            <p class="help-block text-danger text-left"><strong>{{ $errors->first('municipio') }}</strong></p>
                                        </span>
                                                @endif
                                            </div>
                                            <div class="form-group {{ $errors->has('UF') ? ' has-error' : '' }}">
                                                <label for="nome">UF</label>
                                                <input type="text" class="form-control" id="nome" name="UF"
                                                       placeholder="UF" value="{{$aluno->endereco->UF or old('UF')}}" {{ isset($readonly) ? 'readonly' : ''}}>
                                                @if($errors->has('UF'))
                                                    <span class="help-block">
                                            <p class="help-block text-danger text-left"><strong>{{ $errors->first('UF') }}</strong></p>
                                        </span>
                                                @endif
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <legend>Mensalidade</legend>
                                            <div class="form-group {{ $errors->has('diaVencimento') ? ' has-error' : '' }}">
                                                <label for="nome">Vencimento da Mensalidade</label>
                                                <div class="input-group">
                                                    <select class="selectpicker" name="diaVencimento" {{ isset($readonly) ? 'disabled' : ''}}>
                                                        <option disabled selected>Selecione</option>
                                                        @isset($aluno)
                                                            <option value="1" {{$aluno->mensalidade->diaVencimento ==  1 ? 'selected' : ''}} >
                                                                1
                                                            </option>
                                                            <option value="5" {{$aluno->mensalidade->diaVencimento ==  5 ? 'selected' : ''}}>
                                                                5
                                                            </option>
                                                            <option value="10" {{$aluno->mensalidade->diaVencimento ==  10 ? 'selected' : ''}}>
                                                                10
                                                            </option>
                                                            @else
                                                                <option value="1" {{old('diaVencimento') ==  1 ? 'selected' : ''}} >
                                                                    1
                                                                </option>
                                                                <option value="5" {{old('diaVencimento') ==  5 ? 'selected' : ''}}>
                                                                    5
                                                                </option>
                                                                <option value="10" {{old('diaVencimento') ==  10 ? 'selected' : ''}}>
                                                                    10
                                                                </option>
                                                                @endisset
                                                    </select>
                                                </div>
                                                @if($errors->has('diaVencimento'))
                                                    <span class="help-block">
                                            <p class="help-block text-danger text-left"><strong>{{ $errors->first('diaVencimento') }}</strong></p>
                                        </span>
                                                @endif
                                            </div>
                                        </fieldset>
                                        <button class="btn btn-primary" type="submit" {{ isset($readonly) ? 'disabled' : ''}}>
                                            <i class="fa fa-save"></i>
                                            {{ isset($aluno) ? 'Atualizar' : 'Salvar'}}
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
    <link href="{{asset('vendors/bootstrap-datetimepicker/datetimepicker.css')}}" rel="stylesheet">
@endpush
@push('scripts')
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script src="{{asset('vendors/form-helpers/js/bootstrap-formhelpers.min.js')}}"></script>
    <script src="{{asset('vendors/select/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('vendors/mask/jquery.maskedinput.min.js')}}"></script>
    <script src="{{asset('vendors/wizard/jquery.bootstrap.wizard.min.js')}}"></script>
    <!-- bootstrap-datetimepicker -->
    <script src="{{asset('vendors/bootstrap-datetimepicker/bootstrap-datetimepicker.js')}}"></script>
    <script src="{{asset('datepiker/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('datepiker/locales/bootstrap-datepicker.pt-BR.min.js')}}"></script>
    <script src="{{asset('js/jquery.mask.js')}}"></script>
    <script src="{{asset('js/forms.js')}}"></script>
@endpush