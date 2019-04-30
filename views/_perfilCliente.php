<?php require __DIR__ . '../../app/runtime/loadUser.php'; ?>
<script>
    jQuery(".profile-menu").removeClass("active");
    document.getElementById("asoc-prof").classList.add("active");
</script>

<h4>Perfil</h4>
<div class="row">
    <div class="col-md-2">
        <img class="img-profile" src="<?php echo $user->imagen ?>">
    </div>
    <div class="col-md-10">
        <h5><b>Estado</b></h5>
        <p><img class="asoc-estado" src="https://app.youneed.com.ec/images/on.png"> <?php //echo $user->estado ?> </p>
        <hr>
        <div class="row">
            <div class="col-xs-6 col-md-6">
                <h5><b>Nombre</b></h5>
                <p><?php echo $user->nombres ?> <?php echo $user->apellidos ?></p>
                <h5><b>Email</b></h5>
                <p><?php echo $user->email ?></p>
            </div>
            <div class="col-xs-6 col-md-6">
                <h5><b>Teléfono celular</b></h5>
                <p><?php echo $user->numero_celular ?></p>
                <h5><b>Fecha de registro</b></h5>
                <p><?php echo $user->fecha_creacion ?></p>
            </div>
        </div>
        <hr>
    </div>
</div>