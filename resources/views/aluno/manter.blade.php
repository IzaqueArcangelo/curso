@extends('template.template')
@section('conteudo')
    <div class="col-md-10">
        <div class="row">
            <div class="col-md-offset-7 col-md-5 mg-bottom-20">
                <form name="form-consulta" method="get" action="/">
                    <div class="input-group">
                        <input type="text" name="nomeProduto" class="form-control input-lg"
                               placeholder="Pesquisar aluno">
                        <span class="input-group-addon">
                                    <button type="submit" class="btn-search">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @include('template.mensagens')
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 panel-default">
                <div class="content-box-header panel-heading">
                    <div class="panel-title ">Alunos Cadastrados</div>
                    <div class="panel-options">
                        <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
                        <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
                    </div>
                </div>
                <div class="content-box-large box-with-header">
                    <div class="panel-body">
                        <!-- Tabela -->
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th style="text-align: center;">#</th>
                                <th style="text-align: center;">Nome</th>
                                <th style="text-align: center;">CPF</th>
                                <th style="text-align: center;">E-mail</th>
                                <th style="text-align: center;"><i class="glyphicon glyphicon-cog"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($alunos as $aluno)
                                <tr>
                                    <th style="text-align: center;" scope="row">{{$aluno->id}}</th>
                                    <td style="text-align: center;">{{$aluno->nome}}</td>
                                    <td style="text-align: center;">{{$aluno->CPF}}</td>
                                    <td style="text-align: center;">{{$aluno->email}}</td>
                                    <td style="text-align: center;">
                                        <button class="btn-nude" onclick="document.getElementById('info-form-{{$aluno->id}}').submit();"><i class="fa fa-info-circle" title="Informações" aria-hidden="true"></i></button>
                                        <button class="btn-nude" onclick="document.getElementById('editar-form-{{$aluno->id}}').submit();"><i class="fa fa-pencil-square-o" title="Editar" aria-hidden="true"></i></button>
                                        <button class="btn-nude" onclick="document.getElementById('deletar-form-{{$aluno->id}}').submit();"><i class="fa fa-trash-o" title="Apagar" aria-hidden="true"></i></button>
                                        <button class="btn-nude" onclick="document.getElementById('pagamento-form-{{$aluno->id}}').submit();"><i class="fa fa-money" title="Registrar pagamento" aria-hidden="true"></i></button>
                                    </td>
                                    <form id="info-form-{{$aluno->id}}"
                                          method="GET"
                                          action="{{route('/informacoes/aluno',$aluno->id)}}">
                                        {{--{{csrf_field()}}--}}
                                    </form>
                                    <form id="editar-form-{{$aluno->id}}"
                                          method="GET"
                                          action="{{route('/editar/aluno',$aluno->id)}}">
                                        {{--{{csrf_field()}}--}}
                                    </form>
                                    <form id="deletar-form-{{$aluno->id}}"
                                          method="GET"
                                          action="{{route('/deletar/aluno',$aluno->id)}}">
                                        {{--{{csrf_field()}}--}}
                                    </form>
                                    <form id="pagamento-form-{{$aluno->id}}"
                                          method="GET"
                                          action="{{route('/registrar/pagamento/aluno',$aluno->id)}}">
                                        {{--{{csrf_field()}}--}}
                                    </form>
                                </tr>
                            @endforeach
                            @if($alunos->isEmpty())
                                <tr class="no-records-found" style="text-align: center;">
                                    <td colspan="7">Não há alunos cadastrados</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="pull-left pagination-detail"><span class="pagination-info">Exibindo 10
                                            de 20 resultados </span><span class="page-list"><span
                                class="btn-group dropup"><button type="button" class="btn btn-default dropdown-toggle"
                                                                 data-toggle="dropdown"><span
                                        class="page-size">10</span> <span class="caret"></span></button><ul
                                    class="dropdown-menu" role="menu">

                                                                <li><a href="http://dev.beervent.com/eventos/pessoa-juridica/consultar/quantidade=2">2</a></li>
                                                                <li><a href="http://dev.beervent.com/eventos/pessoa-juridica/consultar/quantidade=5">5</a></li>
                                                                <li><a href="http://dev.beervent.com/eventos/pessoa-juridica/consultar/quantidade=10">10</a></li>
                                                                <li><a href="http://dev.beervent.com/eventos/pessoa-juridica/consultar/quantidade=20">20</a></li>
                                                                <li><a href="http://dev.beervent.com/eventos/pessoa-juridica/consultar/quantidade=50">50</a></li>
                                                                <li><a href="http://dev.beervent.com/eventos/pessoa-juridica/consultar/quantidade=100">100</a></li>
                                                                <li><a href="http://dev.beervent.com/eventos/pessoa-juridica/consultar/quantidade=20">20</a></li>


                                                            </ul></span> com 10 linhas por página.</span>
                </div>
                <div class="pull-right pagination">
                    <ul class="pagination">
                        <li class="disabled"><span>«</span></li>
                        <li class="active"><span>1</span></li>
                        <li><a href="http://dev.beervent.com/admin/eventos?page=2">2</a></li>
                        <li><a href="http://dev.beervent.com/admin/eventos?page=2" rel="next">»</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection