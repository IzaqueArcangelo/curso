<div class="col-md-2">
    <div class="sidebar content-box" style="display: block;">
        <ul class="nav">
            <!-- Main menu -->
            <li class="current"><a href="{{route('/')}}"><i class="glyphicon glyphicon-home"></i> Inicio</a></li>
            <li><a href="{{route('/agenda')}}"><i class="glyphicon glyphicon-calendar"></i> Agenda </a></li>
            <li class="submenu">
                <a href="#"><i class="fa fa-users" aria-hidden="true"></i> Alunos <span
                            class="caret pull-right"></span> </a>
                <!-- Sub menu de alunos -->
                <ul>
                    <li><a href="{{route('/cadastrar/aluno')}}"><i class="fa fa-user-plus" aria-hidden="true"></i>
                            Cadastrar</a>
                    </li>
                    <li><a href="{{route('/manter/cadastros/aluno')}}"> <i class="fa fa-table" aria-hidden="true"></i> Manter
                    Cadastro</a></li>

        </ul>
            </li>
            <li class="submenu">
                <a href="#"><i class="glyphicon glyphicon-tasks"></i> Professores <span
                            class="caret pull-right"></span>  </a>
                <!-- Sub menu de alunos -->
                <ul>
                    <li><a href="{{route('/cadastrar/professor')}}"> <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            Cadastrar</a>
                    </li>
                    <li><a href="{{route('/manter/cadastros/professor')}}"> <i class="fa fa-table" aria-hidden="true"></i> Manter
                            Cadastro</a></li>
                </ul>
            </li>
            <li class="submenu">
                <a href="#"><i class="glyphicon glyphicon-tasks"></i> Usuários <span
                            class="caret pull-right"></span>  </a>
                <!-- Sub menu de alunos -->
                <ul>
                    <li><a href="{{route('/cadastrar/usuario')}}"> <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            Cadastrar</a>
                    </li>
                    <li><a href="{{route('/manter/cadastros/usuario')}}"> <i class="fa fa-table" aria-hidden="true"></i> Manter
                            Cadastro</a></li>
                </ul>
            </li>
            <li class="submenu">
                <a href="#"><i class="glyphicon glyphicon-tasks"></i> Cursos <span
                            class="caret pull-right"></span>  </a>
                <!-- Sub menu de alunos -->
                <ul>
                    <li><a href="{{route('/cadastrar/curso')}}"> <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            Cadastrar</a>
                    </li>
                    <li><a href="{{route('/manter/cadastros/curso')}}"> <i class="fa fa-table" aria-hidden="true"></i> Manter
                            Cadastro</a></li>
                </ul>
            </li>
            <li class="submenu">
                <a href="#"><i class="glyphicon glyphicon-tasks"></i> Instrumentos <span
                            class="caret pull-right"></span>  </a>
                <!-- Sub menu de alunos -->
                <ul>
                    <li><a href="{{route('/cadastrar/instrumento')}}"> <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            Cadastrar</a>
                    </li>
                    <li><a href="{{route('/manter/cadastros/instrumento')}}"> <i class="fa fa-table" aria-hidden="true"></i> Manter
                            Cadastro</a></li>
                </ul>
            </li>
            <li><a href="stats.html"><i class="glyphicon glyphicon-stats"></i> Relatórios </a></li>
            <!-- <li><a href="tables.html"><i class="glyphicon glyphicon-list"></i> Tables</a></li>
             <li><a href="buttons.html"><i class="glyphicon glyphicon-record"></i> Buttons</a></li>
             <li><a href="editors.html"><i class="glyphicon glyphicon-pencil"></i> Editors</a></li>-->

            <li class="submenu">
                <a href="#">
                    <i class="glyphicon glyphicon-list"></i> Pages
                    <span class="caret pull-right"></span>
                </a>
                <!-- Sub menu -->
                <ul>
                    <li><a href="login.html">Login</a></li>
                    <li><a href="signup.html">Signup</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>