<?php require __DIR__ . '../../app/runtime/loadUser.php'; ?>
<script>
    jQuery(".profile-menu").removeClass("active");
    document.getElementById("asoc-orders").classList.add("active");
</script>

<?php 

$res = $api->cargarPedidos($user->id);

?>

<h4>Dashboard</h4>

<div class="row">
    <div class="dashboard-panel col-md-12">
        <div class="dashboard-panel-wrapper">
            <?php if(count($res)){; ?>
				<div class="row row m-0 p-0">
					<div class="col-xs-2 col-md-1 dashboard-panel-header">ID</div>
					<div class="col-xs-5 col-md-3 dashboard-panel-header">Razón social</div>
					<!-- <div class="col-xs-5 col-md-2 dashboard-panel-header">Email</div> -->
					<div class="col-xs-2 col-md-2 dashboard-panel-header">Fecha de creación</div>
					<div class="col-xs-5 col-md-2 dashboard-panel-header">Fecha para servicio</div>
					<div class="col-xs-5 col-md-1 dashboard-panel-header">Valor Total</div>
					<div class="col-xs-5 col-md-1 dashboard-panel-header">Estado</div>
					<div class="col-xs-5 col-md-1 dashboard-panel-header">Acciones</div>
				</div>
                <div class="dashboard-panel-content-item">
					<?php
					foreach($res->pedidos as $key => $val){
						echo '<div class="row notif_row">';
							echo '<div class="col-xs-2 col-md-1 notif_id">';
							echo	$val->id;
							echo '</div>';
							echo '<div class="col-xs-5 col-md-3 notif_id">';
							echo	$val->razon_social;
							echo '</div>';
							// echo '<div class="col-xs-5 col-md-2 notif_id">';
							// echo	$val->email;
							// echo '</div>';
							echo '<div class="col-xs-5 col-md-2 notif_id">';
							echo	$val->fecha_creacion;
							echo '</div>';
							echo '<div class="col-xs-5 col-md-2 notif_id">';
							echo	$val->fecha_para_servicio;
							echo '</div>';
							echo '<div class="col-xs-5 col-md-1 notif_id">';
							echo	$val->total;
							echo '</div>';
							echo '<div class="col-xs-5 col-md-1 notif_id">';
							echo	$estados_pedido[$val->estado];
							echo '</div>';
							echo '<div class="col-xs-5 col-md-1 notif_id">';
							if($val->estado == 0) {
								echo '<a href="javascript:void(0)" class="btn btn-success btn-small" onclick="aceptarPedido(' . $val->id . ')">Aceptar</a>';
								echo '<a href="javascript:void(0)" class="btn btn-danger btn-small" onclick="cancelarPedido(' . $val->id . ')">Cancelar</a>';
							}
							if($val->estado == 1) {
								echo '<a href="javascript:void(0)" class="btn btn-warning btn-small" onclick="ejecutarPedido(' . $val->id . ')">Ejecutar</a>';
								echo '<a href="javascript:void(0)" class="btn btn-danger btn-small" onclick="cancelarPedido(' . $val->id . ')">Rechazar</a>';
							}
							if($val->estado == 2) {
								echo '<a href="javascript:void(0)" class="btn btn-danger btn-small" onclick="cancelarPedido(' . $val->id . ')">Rechazar</a>';
							}
							echo '</div>';
						echo '</div>';
					}
					?>
				<?php }else{ ?>
				<div class="dashboard-panel-header">Pedidos</div>
					<div class="dashboard-panel-content">
						<i>Por el momento no tiene ningún pedido.</i>
					</div>
                <?php }; ?>
            </div>
            <div class="dashboard-panel-footer">
				<?php if(count($res) > 10){ echo "Ver más pedidos"; } ?>
            </div>
        </div>
    </div>

</div>