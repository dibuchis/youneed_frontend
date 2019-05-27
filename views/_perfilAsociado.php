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
        <p><img class="asoc-estado" src="https://app.youneed.com.ec/images/on.png"> <?php echo $estado_usuario[$user->estado]; ?> </p>
        <hr>
        <div class="row">
            <div class="col-xs-6 col-md-6">
			<?php //var_dump($user->servicios); ?>
                <h5><b>Nombre</b></h5>
                <p><?php echo $user->nombres ?> <?php echo $user->apellidos ?></p>
                <h5><b>Email</b></h5>
                <p><?php echo $user->email ?></p>
                <h5><b>Identificacion</b></h5>
                <p><?php echo $user->identificacion ?> </p>
                <h5><b>Teléfono celular</b></h5>
                <p><?php echo $user->numero_celular ?></p>
                <h5><b>Teléfono domicilio</b></h5>
                <p><?php echo $user->telefono_domicilio ?></p>
            </div>
            <div class="col-xs-6 col-md-6">
                <h5><b>Fecha de registro</b></h5>
                <p><?php echo $user->fecha_creacion ?></p>
                <!--<h5><b>Fecha de activacion</b></h5>
                <p><?php //echo $user->fecha_activacion ?></p>-->
                <h5><b>Plan</b></h5>
                <p><?php echo $user->plan ?></p>
                <h5><b>Número de cuenta</b></h5>
                <p><?php echo $user->numero_cuenta ?></p>
                <h5><b>País</b></h5>
                <p><?php echo $user->pais ?></p>
                <h5><b>Ciudad</b></h5>
                <p><?php echo $user->ciudad ?></p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <h5><b>Servicios</b></h5>
                <p>
                <ul>
                <?php 
                    $servicios = $user->servicios;
                    //print_r($servicios);
                    foreach($servicios as $key => $val){
                        echo "<li>" . $servicios[$key]->servicio_nombre . "</li>";
                    }
                ?>
                </ul>
                </p>

            </div>
        </div>
    </div>
</div>