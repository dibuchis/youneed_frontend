<?php require __DIR__ . '../../app/runtime/loadUser.php'; ?>

<script>
    jQuery(".profile-menu").removeClass("active");
    document.getElementById("asoc-notif").classList.add("active");
</script>

<h4>Notificaciones</h4>
<div class="row">

    <div class="dashboard-panel col-md-12">
        <div class="dashboard-panel-wrapper">
            <div class="row row m-0 p-0">
                <div class="col-xs-2 col-md-1 dashboard-panel-header">ID</div>
                <div class="col-xs-10 col-md-11 dashboard-panel-header">Mensaje</div>
            </div>
            <div class="row notif_row">
                <div class="col-xs-2 col-md-1 notif_id">1</div>
                <div class="col-xs-10 col-md-11 notif_msg">Te has registrado al sistema el <?php echo $user->fecha_creacion ?></div>
            </div>
            <div class="dashboard-panel-footer">
                Ver más
            </div>
        </div>
    </div>    
</row>