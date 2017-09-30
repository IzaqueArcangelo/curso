@extends('template.template')
@section('conteudo')
    <div class="col-md-10">
        <div class="row">
            <div class="col-md-offset-7 col-md-5 mg-bottom-20">
                <form name="form-consulta" method="get" action="/">
                    <div class="input-group">
                        <input type="text" name="nomeProduto" class="form-control input-lg" placeholder="Pesquisar curso">
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
                    <div class="panel-title ">Cursos Cadastrados</div>
                    <div class="panel-options">
                        <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
                        <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
                    </div>
                </div>
                <div class="content-box-large box-with-header">
                    <div class="panel-body">
                        <!-- Tabela -->
                        <table class="table table-striped tabela-centralizada">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Curso</th>
                                <th>Valor</th>
                                <th>Instrumento</th>
                                <th><i class="glyphicon glyphicon-cog"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cursos as $curso)
                            <tr>
                                <td>{{$curso->id}}</th>
                                <td>{{$curso->nome}}</th>
                                <td>{{$curso->valor}}</th>
                                <td>{{$curso->instrumento->nome}}</th>
                                <td style="text-align: center;">
                                    <button class="btn-nude" onclick="document.getElementById('info-form-{{$curso->id}}').submit();"><i class="fa fa-info-circle" title="Informações" aria-hidden="true"></i></button>
                                    <button class="btn-nude" onclick="document.getElementById('editar-form-{{$curso->id}}').submit();"><i class="fa fa-pencil-square-o" title="Editar" aria-hidden="true"></i></button>
                                    <button class="btn-nude" onclick="document.getElementById('deletar-form-{{$curso->id}}').submit();"><i class="fa fa-trash-o" title="Apagar" aria-hidden="true"></i></button>
                                </td>
                                <form id="info-form-{{$curso->id}}"
                                      method="GET"
                                      action="{{route('/informacoes/curso',$curso->id)}}">
                                    {{--{{csrf_field()}}--}}
                                </form>
                                <form id="editar-form-{{$curso->id}}"
                                      method="GET"
                                      action="{{route('/editar/curso',$curso->id)}}">
                                    {{--{{csrf_field()}}--}}
                                </form>
                                <form id="deletar-form-{{$curso->id}}"
                                      method="GET"
                                      action="{{route('/deletar/curso',$curso->id)}}">
                                    {{--{{csrf_field()}}--}}
                                </form>
                            </tr>
                           @endforeach
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