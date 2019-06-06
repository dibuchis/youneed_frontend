<nav id="top-bar" class="navbar navbar-fixed-top navbar-asociado">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#w1-collapse"><span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span></button>
            <a class="navbar-brand" href="/"><img class="logo-main" src="https://app.youneed.com.ec/images/logo2.png" alt=""></a>
        </div>
        <div id="w1-collapse" class="collapse navbar-collapse">
            <ul id="w2" class="nav-pills navbar-right nav">
				<li class="col-xs-12 hidden-md hidden-lg"><a class="hidden-md profile-menu-item" href="views/_perfil<?php echo ($user->tipo == 'asociado' ? "Asociado" : "Cliente"); ?>.php">Perfil</a></li>
                <li class="col-xs-12 hidden-md hidden-lg"><form action="logout" method="post">
                                <input type="hidden" name="_csrf" value="5yMriX0FMED3BXOrHPTt5fs8e2nkPNAHd7FxaZw_TkzXRkL4JE9kCLxyMuokgaCkslgiW6ptt2Qv6UcqxVgtPw=="><a href="logout" onclick="logout(event)" class="btn btn-link logout">Salir</a></form></li>
                <li class="hidden-xs col-md-1"><span class="nav-menu-item"><i class="material-icons">email</i> </span></li>
                <li class="hidden-xs col-md-1"><span class="nav-menu-item hidden-xs"><i class="material-icons">notifications</i> </span></li>
                <li class="dropdown usuario-panel hidden-xs col-md-3">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img class="usuario-icono" src="https://app.youneed.com.ec/images/usuario-icono.png" alt=""> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-header">Bienvenido
                            <?php echo $user->nombres; ?>
                        </li>
                        <li><a class="profile-menu-item" href="views/_perfil<?php echo ($user->tipo == 'asociado' ? "Asociado" : "Cliente"); ?>.php"><i class="icon-user"></i> Mi Perfil</a></li>
                        <li class="divider"></li>
                        <li class="divider"></li>
                        <li>
                            <form action="logout" method="post">
                                <input type="hidden" name="_csrf" value="5yMriX0FMED3BXOrHPTt5fs8e2nkPNAHd7FxaZw_TkzXRkL4JE9kCLxyMuokgaCkslgiW6ptt2Qv6UcqxVgtPw=="><a href="logout" onclick="logout(event)" class="btn btn-link logout">Salir</a></form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>