<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.8.7/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8.8.7/dist/sweetalert2.min.css">

    <link href="<?php echo $app::APP_BASEURL . "assets/css/validationEngine.jquery.css"; ?>" rel="stylesheet">
    <script type="text/javascript" src="<?php echo $app::APP_BASEURL . 'js/jquery.validate.min.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo $app::APP_BASEURL . 'js/jquery.validationEngine.js'; ?>"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <link rel="stylesheet" href="https://youneed.com.ec/wp-content/themes/Avada-Child-Theme/style.css">
    
    <link rel="stylesheet" href="https://app.youneed.com.ec/css/admin.css">

	<style>
	</style>
    <script type="text/javascript" src="<?php echo $app::APP_BASEURL . 'js/main.js'; ?>"></script>
</head>
    <body>

    <div class="container" id="form-registro-cliente">
        <form id="client-register-form">
        <div class="panel panel-primary setup-content panel-default">
	            <div class="panel-heading">
	                 <h3 class="panel-title">Queremos conocerte mejor</h3>
	            </div>
	            <div class="panel-body">
	            	<div class="row">
						<div class="col-md-8 col-md-offset-2">
	                    <h4>Registro Cliente: </h4>
                        <hr>
                        <input type="hidden" id="usuarios-tipo" class="form-control" name="tipo" value="Cliente">
                        <input type="hidden" id="usuarios-es-cliente" class="form-control" name="Usuarios[es_cliente]" value="1">
                        <input type="hidden" id="usuarios-validate" class="form-control" name="validate" value="0">
                        <div class="col-sm-6">
                            <div class="form-group field-usuarios-nombres required">
                                <label class="control-label" for="usuarios-nombres">Nombres</label>
                                <input type="text" id="usuarios-nombres" class="form-control validate[required]" name="Usuarios[nombres]" maxlength="200" aria-required="true" aria-invalid="true">
                                
                                <div class="help-block"></div>
                            </div>
                        </div>
						<div class="col-sm-6">
                            <div class="form-group field-usuarios-apellidos required">
                                <label class="control-label" for="usuarios-apellidos">Apellidos</label>
                                <input type="text" id="usuarios-apellidos" class="form-control validate[required]" name="Usuarios[apellidos]" maxlength="200" aria-required="true">

                                <div class="help-block"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group field-usuarios-email required">
                                <label class="control-label" for="usuarios-email">Email</label>
                                <input type="text" id="usuarios-email" class="form-control validate[required,custom[email]]" name="Usuarios[email]" maxlength="200" aria-required="true" aria-invalid="true">

                                <div class="help-block"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group field-usuarios-numero_celular required">
                                    <label class="control-label" for="usuarios-numero_celular">Número Celular</label>
                                    <div class="intl-tel-input allow-dropdown"><div class="flag-container"><div class="selected-flag" tabindex="0" title="Ecuador: +593"><div class="iti-flag ec"></div><div class="iti-arrow"></div></div><ul class="country-list hide"><li class="country active" data-dial-code="593" data-country-code="ec"><div class="flag-box"><div class="iti-flag ec"></div></div><span class="country-name">Ecuador</span><span class="dial-code">+593</span></li></ul></div>
                                    <input type="tel" id="usuarios-numero_celular" class="form-control validate[required,minSize[10],maxSize[13],custom[number]]" name="Usuarios[numero_celular]" autocomplete="off" placeholder="+593 99 123 4567" aria-invalid="true">
                                    </div>

                                    <div class="help-block"></div>
                            </div>

                        </div>
                        <div class="col-sm-6">
                            <div class="form-group field-usuarios-clave required">
                                <label class="control-label" for="usuarios-clave">Clave</label>
                                <input type="password" id="usuarios-clave" class="form-control validate[required,minSize[8],maxSize[45]]" name="Usuarios[clave]" value="" aria-required="true">

                                <div class="help-block"></div>
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group field-usuarios-confirma-clave required">
                                <label class="control-label" for="usuarios-confirma-clave">Confirmar Clave</label>
                                <input type="password" id="usuarios-confirma-clave" class="form-control validate[required,minSize[8],maxSize[45]],custom[passwordMatch]" name="ConfirmaClave" value="" aria-required="true">

                                <div class="help-block"></div>
                            </div>
                        </div>

                        <div class="form-group field-usuarios-terminos_condiciones required">

                            <input type="checkbox" id="usuarios-terminos_condiciones" value="1"> Aceptar términos y condiciones</label>

                            <div class="help-block"></div>
                        </div>

                         <div class="col-md-10 col-md-offset-2">
							<button class="btn btn-primary saveBtn pull-right" onclick="clientSave()" type="button">Guardar</button>
						</div>
                        </div>
                    </div>
                </div>
        </div>
        </form>
    </div>
    
    </body>
    <script src="<?php echo $app::APP_BASEURL . 'js/languages/jquery.validationEngine-es.js'; ?>" ></script>
</html>