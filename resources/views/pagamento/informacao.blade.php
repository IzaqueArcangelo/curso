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
                    <div class="panel-title ">Registrar Pagamento do Aluno</div>
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
                                <legend>Dados do Aluno</legend>
                                <div class="form-group">
                                    <label for="nome">Nome</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="nome" name="nome"
                                               placeholder="Nome completo" value="{{$aluno->nome}}" readonly>
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <div class="input-group">
                                        <input type="email" class="form-control" id="email" name="email"
                                               placeholder="Email" value="{{$aluno->email}}" readonly>
                                        <span class="input-group-addon"><i class="fa fa-at"></i></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="cpf">CPF</label>
                                    <div class="input-group">
                                        <input type="text" id="cpf" name="cpf" class="form-control cpf"
                                               placeholder="CPF" value="{{$aluno->CPF}}" readonly>
                                        <span
                                                class="input-group-addon"><i class="fa fa-id-card-o"
                                                                             aria-hidden="true"></i></span>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>Inscrições</legend>
                                <div class="panel panel-default">
                                    <div class="panel-heading">Lista de Cursos do Aluno</div>
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nome</th>
                                            <th>Valor</th>
                                            <th>Professor</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($aluno->cursos() as $curso)
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                        </tr>
                                        @endforeach
                                        @if($aluno->cursos->isEmpty())
                                            <tr class="no-records-found" style="text-align: center;">
                                                <td colspan="7">O Aluno não possui inscrições</td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                                <legend>Dados da Mensalidade</legend>
                                <div class="form-group">
                                    <label for="nome">Valor</label>
                                    <input type="text" class="form-control" id="valor" name="valor" value="{{($aluno->mensalidade->valor == null)? '0,00': $aluno->mensalidade->valor}}"
                                           readonly>
                                </div>
                                <div class="form-group">
                                    <label for="dtNascimento">Vencimento</label>
                                    <div class="input-group">
                                        <input id="vencimento" name="vencimento" class="form-control"
                                               data-date-end-date="0d"
                                               data-mask="99/99/9999" data-mask-placeholder="-"
                                               placeholder="Data Pagamento" value="{{$aluno->mensalidade->diaVencimento}}" readonly>
                                        <span
                                                class="input-group-addon"><i
                                                    class="glyphicon glyphicon-calendar"></i></span>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>Informações de Pagamento</legend>
                                <div class="form-group">
                                    <label for="dtNascimento">Data Pagamento</label>
                                    <div class="input-group" id="dataPagamento">
                                        <input id="dtPagamento" name="dtPagamento" class="form-control"
                                               data-date-end-date="0d"
                                               data-mask="99/99/9999" data-mask-placeholder="-"
                                               placeholder="Data Pagamento">
                                        <span
                                                class="input-group-addon"><i
                                                    class="glyphicon glyphicon-calendar"></i></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="dtNascimento">Valor</label>
                                    <div class="input-group">
                                        <input type="text" id="valorPg" name="valorPg" class="form-control"
                                               placeholder="Valor Pago" value="189,99">
                                        <span
                                                class="input-group-addon"><i class="fa fa-usd"
                                                                             aria-hidden="true"></i></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="nome">Mês Referência</label>
                                    <div class="input-group">
                                        <select class="selectpicker" name="diaVencimento">
                                            <option disabled selected>Selecione</option>
                                            @foreach($mesReferencia as $mes)
                                                <option value="{{$mes->cod_mes}}">{{$mes->nome}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="nome">Ano Referência</label>
                                    <div class="input-group">
                                        <select class="selectpicker">
                                            <option disabled selected>Selecione</option>
                                            @foreach($anoReferencia as $ano)
                                                <option value="{{$ano->id}}">{{$ano->ano}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </fieldset>

                            <button class="btn btn-primary" type="submit" {{$aluno->cursos->isEmpty() ? 'disabled' : ''}}>
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
    <link href="{{asset('vendors/select/bootstrap-select.min.css')}}" rel="stylesheet">
    <link href="{{asset('datepiker/css/bootstrap-datepicker.css')}}" rel="stylesheet">
@endpush
@push('scripts')
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script src="{{asset('vendors/select/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('vendors/mask/jquery.maskedinput.min.js')}}"></script>
    <!-- bootstrap-datetimepicker -->
    <link href="{{asset('vendors/bootstrap-datetimepicker/datetimepicker.css')}}" rel="stylesheet">
    <script src="{{asset('vendors/bootstrap-datetimepicker/bootstrap-datetimepicker.js')}}"></script>
    <script src="{{asset('datepiker/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('datepiker/locales/bootstrap-datepicker.pt-BR.min.js')}}"></script>
    <script src="{{asset('js/jquery.mask.js')}}"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
    <script src="{{asset('js/forms.js')}}"></script>
@endpush