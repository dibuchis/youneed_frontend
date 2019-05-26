<?php require __DIR__ . '../../app/runtime/loadUser.php'; ?>
<script>
    jQuery(".profile-menu").removeClass("active");
    document.getElementById("asoc-dash").classList.add("active");
</script>

<?php 

$res = null;
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://app.youneed.com.ec/ajax/getpedidos?uid=' . $user->id);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Return data instead printing directly in Browser
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10); //Timeout after 7 seconds
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
curl_setopt($ch, CURLOPT_HEADER, 0);

$res = curl_exec($ch);

curl_close($ch);

$res = json_decode($res);

?>

<h4>Dashboard</h4>

<div class="row">
    <div class="dashboard-panel col-md-6">
        <div class="dashboard-panel-wrapper">
            <?php if(count($res)){; ?>
				<div class="row row m-0 p-0">
					<div class="col-xs-2 col-md-2 dashboard-panel-header">ID</div>
					<div class="col-xs-5 col-md-4 dashboard-panel-header">Fecha de creación</div>
					<div class="col-xs-5 col-md-6 dashboard-panel-header">Cliente</div>
				</div>
                <div class="dashboard-panel-content-item">
					<?php
					foreach($res->pedidos as $key => $val){
						echo '<div class="row notif_row">';
							echo '<div class="col-xs-2 col-md-2 notif_id">';
							echo	$val->id;
							echo '</div>';
							echo '<div class="col-xs-5 col-md-4 notif_id">';
							echo	$val->fecha_creacion;
							echo '</div>';
							echo '<div class="col-xs-5 col-md-6 notif_id">';
							echo	$val->razon_social;
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
                Ver todos los pedidos
            </div>
        </div>
    </div>

    <div class="dashboard-panel col-md-6">
        <div class="dashboard-panel-wrapper">
            <div class="dashboard-panel-header">Historial</div>
            <div class="dashboard-panel-content">
                <div class="dashboard-panel-content-item">
                <i>Por el momento no tiene ningun registro.</i>
                </div>
            </div>
            <div class="dashboard-panel-footer">
                Ver historial completo
            </div>
        </div>
    </div>
    

</div>