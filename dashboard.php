<?php require __DIR__ . '\views\layouts\header.php'; ?>

<body>

<?php require __DIR__ . '\views\layouts\navbar.php'; ?>

<div class="container-fluid p-0 dashboard-asociado">
    <div class="row p-0">
        <div class="col-md-2 col-xs-12 p-0">
            <div class="profile-side-bar">
                <div class="center-block col-md-12 col-xs-2 img-profile-container">
                    <img class="img-responsive img-profile hidden-xs" src="<?php echo $user->imagen; ?>" alt="">
                </div>
                <div class="profile-greet col-md-12 hidden-xs">¡Hola <?php echo $user->nombres; ?>!</div>
                <nav class="col-xs-12 col-md-12 p-0">
                    <div class="profile-menu col-md-12 col-xs-2 active" id="asoc-dash"><a class="profile-menu-item" href="views/_dashboard.php"><i class="material-icons">home</i> <span class="hidden-xs">Dashboard</span></a></div>
                    <div class="profile-menu col-md-12 col-xs-2" id="asoc-orders"><a class="profile-menu-item" href="views/_pedidos.php"><i class="material-icons">star_border</i> <span class="hidden-xs">Pedidos</span></a></div>
                    <div class="profile-menu col-md-12 col-xs-2" id="asoc-notif"><a class="profile-menu-item" href="views/_notificaciones.php"><i class="material-icons">inbox</i> <span class="hidden-xs">Notificaciones</span></a></div>
                    <div class="profile-menu col-md-12 col-xs-2" id="asoc-hist"><a class="profile-menu-item" href="views/_historial.php"><i class="material-icons">folder_open</i> <span class="hidden-xs">Historial</span></a></div>
                    <div class="profile-menu col-md-12 col-xs-2" id="asoc-prof"><a class="profile-menu-item" href="views/_perfil.php"><i class="material-icons">person_outline</i> <span class="hidden-xs">Mi Perfil</span></a></div>
                </nav>
            </div>
        </div>
        <div class="col-md-10 p-0">
            <div class="profile-dashboard-panel" id="dashboard-content">
                
            </div>
        </div>
    </div>
</div>

<?php require __DIR__ . '\views\layouts\footer.php'; ?>

</body></html>
