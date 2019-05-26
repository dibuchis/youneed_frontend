<?php require __DIR__ . '../../app/runtime/loadUser.php'; ?>

<script>
    jQuery(".profile-menu").removeClass("active");
    document.getElementById("asoc-notif").classList.add("active");
</script>

<?php 

$nots = null;
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://app.youneed.com.ec/ajax/getnotificaciones?uid=' . $user->id);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Return data instead printing directly in Browser
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10); //Timeout after 7 seconds
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
curl_setopt($ch, CURLOPT_HEADER, 0);

$res = curl_exec($ch);

curl_close($ch);

$nots = json_decode($res);

?>

<h4>Notificaciones</h4>
<div class="row">

    <div class="dashboard-panel col-md-12">
        <div class="dashboard-panel-wrapper">
		<?php //var_dump($nots->notificaciones[0]); ?>
            <div class="row row m-0 p-0">
                <div class="col-xs-2 col-md-2 dashboard-panel-header">ID</div>
                <div class="col-xs-4 col-md-2 dashboard-panel-header">Fecha</div>
                <div class="col-xs-6 col-md-8 dashboard-panel-header">Mensaje</div>
            </div>
				<?php
				foreach($nots->notificaciones as $key => $val){
					echo '<div class="row notif_row">';
						echo '<div class="col-xs-2 col-md-1 notif_id">';
						echo	$val->id;
						echo '</div>';
						echo '<div class="col-xs-4 col-md-2 notif_id">';
						echo	$val->fecha_notificacion;
						echo '</div>';
						echo '<div class="col-xs-6 col-md-9 notif_id">';
						echo	$tipo_notificacion[$val->tipo_notificacion_id];
						echo '</div>';
					echo '</div>';
				}
				?>
            <div class="row notif_row">
                <div class="col-xs-2 col-md-1 notif_id">1</div>
                <div class="col-xs-2 col-md-2 notif_id"><?php echo $user->fecha_creacion ?></div>
                <div class="col-xs-8 col-md-9 notif_msg">Te has registrado al sistema.</div>
			</div>
            <div class="dashboard-panel-footer">
                Ver más
            </div>
        </div>
    </div>    