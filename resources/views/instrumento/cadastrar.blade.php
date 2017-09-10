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
                    <div class="panel-title ">Cadastrar Instrumento</div>
                    <div class="panel-options">
                        <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
                        <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
                    </div>
                </div>
                <div class="content-box-large box-with-header">
                    <div class="panel-body">
                        {{-- Formulário de cadastro --}}
                        <form method="post" action="{{route('/salvar/instrumento')}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <fieldset>
                                <legend>Dados do Instrumento</legend>
                            </fieldset>
                            <div class="form-group {{$errors->has('nome') ? 'has-error' : ''}}">
                                <label for="nome">Nome</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="nome" name="nome"
                                           placeholder="Nome do Instrumento">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                </div>
                                @if ($errors->has('nome'))
                                    <span class="help-block">
                                                <p class="help-block text-danger text-left"><strong>{{ $errors->first('nome') }}</strong></p>
                                            </span>
                                @endif
                            </div>
                            <div class="form-group {{$errors->has('imagem') ? 'has-error' : ''}}">
                                <label for="imagem">Imagem</label>
                                <div class="">
                                    <input type="file" class="btn btn-default" id="imagem" name="imagem">
                                </div>
                                @if ($errors->has('imagem'))
                                    <span class="help-block">
                                                <p class="help-block text-danger text-left"><strong>{{ $errors->first('imagem') }}</strong></p>
                                     </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="file" class="control-label">Imagem do Produto</label>
                                <div class="img-centered img-responsive">
                                    <img src="{{asset("img/beer-bottle.png")}}" class="img-centered img-responsive" id="imagemInstrumento">
                                </div>
                            </div>
                            <div class="form-group {{$errors->has('descricao') ? 'has-error' : ''}}">
                                <label for="descricao">Descrição</label>

                                        <textarea class="form-control" id="descricao" name="descricao"
                                                  placeholder="Descrição do Instrumento"></textarea>
                                   {{-- <span class="input-group-addon"><i class="fa fa-at"></i></span>--}}

                                @if ($errors->has('descricao'))
                                    <span class="help-block">
                                                <p class="help-block text-danger text-left"><strong>{{ $errors->first('descricao') }}</strong></p>
                                            </span>
                                @endif
                            </div>

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
    @push('scripts')
        <script type="text/javascript">
            // TODO exportar código para arquivo externo
            $("#imagem").on('change', function () {
                //alert("ola mundo");
                readURL(this);
            });

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#imagemInstrumento').attr('src', e.target.result);
                        console.log('ola')
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

        </script>
    @endpush