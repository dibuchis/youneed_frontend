var app_BaseUrl = "https://youneed.com.ec/app/";
//var app_BaseUrl = "http://localhost/youneed_frontend/";
var app_HomeUrl = "https://youneed.com.ec";

function getServicio(srvID){
    jQuery.ajax({
        method:"GET",
        url: app_BaseUrl + 'app/Ajax.php',
        data:{
            fn:'GetServicio',
            servicioID: srvID
        },
        complete:function(data){
            
            var obj = JSON.parse(data.responseText);
            
            var htmlText = '';
            
            htmlText += "<div class='modal-servicio'>";

            htmlText += "<div class='col-srv col-srv-title'>";            
            //htmlText += "<h4>Nombre del servicio</h4>";
            htmlText += "<h4>" + obj.servicio.nombre + "</h4>";
            htmlText += "</div>";

            htmlText += "<div class='col-srv col-srv-1'>";            
            htmlText += "<h4>Incluye</h4>";
            htmlText += "<p>" + obj.servicio.incluye + "</p>";
            htmlText += "</div>";            
            
            htmlText += "<div class='col-srv col-srv-2'>";            
            htmlText += "<h4>No Incluye</h4>";
            htmlText += "<p>" + obj.servicio.no_incluye + "</p>";
            htmlText += "</div>";            
            
            htmlText += "<div class='col-srv col-srv-3'>";
            htmlText += "<h4>Precio</h4>";
            
            if(obj.servicio.total !== null){
                htmlText += "<p>" + obj.servicio.total + "</p>";
            }else{
                htmlText += "<p>No disponible</p>";
            }
            
            htmlText += "</div>";
            
            htmlText += "</div>";
            
            Swal.fire({
                html: htmlText,
                width: 800,
                });
        }
    });
    // return promise.then(function(value){return JSON.parse(value);});
}


(function($){
    
    
    $( document ).ready( function(){
		
		var dashboard = document.getElementById("dashboard-content");
		
		if(dashboard != undefined && dashboard != null){
        
			$("#dashboard-content").LoadingOverlay("show", {maxSize: 70 });
			$.ajax({
				url: "views/_dashboard.php",
				success:function(data){
					$("#dashboard-content").LoadingOverlay("hide");
					$("#dashboard-content").html(data);
				}
			});
		}
		
        var menu = document.getElementById("menu-item-1109");
		
		if(menu != undefined && menu != null){
			$.ajax({
				method:"get",
				url: app_BaseUrl + 'app/Ajax.php',
				data:{
					fn:'getUser'
				},

			   complete:function(data){
				   
				   var res = JSON.parse(data.responseText);
				   
				   //console.log(data.responseText);
				   
				   if(res){
					   var obj = JSON.parse(data.responseText);
					   userMenu(obj);
				   }
				   
			   }
			   
			});
		}
        
        $('#menu-item-1109 > a').click(function(e){ 
	        e.preventDefault();
	        e.stopPropagation();
	        $("#yn-login").toggleClass("yn-login");
        });
        
        $("html").on("click", ".btn-trigger-login", function(e){ 
	        e.preventDefault();
	        e.stopPropagation();
	        $("#yn-login").toggleClass("yn-login");
        });    
        
        var working = false;
        $('.login').on('submit', function(e) {
          e.preventDefault();
          if (working) return;
          working = true;
          var $this = $(this),
            $state = $this.find('button > .state');
              
              $this.addClass('loading');
              $state.html('Autenticando');
              setTimeout(function() {
                $.ajax({
                    traditional: true,
                    method:"post",
                    url:app_BaseUrl + "app/Ajax.php",
                    data:{
                        fn : "login",
                        username: $("#api-username").val(),
                        password: $("#api-password").val(),
                    },
                    //contentType : "application/x-www-form-urlencoded",
                    complete:function(data){

                        var obj = JSON.parse(data.responseText);
                        
                        //console.log(obj);
                        
                        var $this = $('.login'),
                        $state = $this.find('button > .state');
                        
                        if(obj.status){
                        
                            $this.addClass('ok');
                            $state.html(obj.message);
                            setTimeout(function() {
                                $state.html('Log in');
                                $this.removeClass('ok loading');
                                working = false;
                                $("#yn-login").removeClass("yn-login");
                                //userMenu(obj.data);
                                window.location.reload();
                                
                            }, 3000);
                        }else{
                            $this.removeClass('ok loading');
                            //$state.html('Log in');
                            working = false;
                            $("#login-error").html("Error de acceso, intente nuevamente.")
                        }
                        //      window.location.replace("https://youneed.com.ec/app/dashboard");
                    }
                });
            }, 4000);
        });
        
        $(".profile-menu-item").click(function(e){
           e.preventDefault();
			$("#dashboard-content").LoadingOverlay("show", {maxSize: 70 });
            $.ajax({
                url:$(this).attr("href"),
                success:function(data){
					$("#dashboard-content").LoadingOverlay("hide");
                    $("#dashboard-content").html(data);
					$( document ).scrollTop("slow", 0);
               }
           })
           
        });
	});
})(jQuery);

function userMenu(obj){
    //console.log(obj);
    jQuery("#menu-item-1109").remove();
    jQuery("#menu-menu-principal").append("<li id='app-user-menu' class='menu-item menu-item-type-custom menu-item-object-custom fusion-menu-item-button fusion-last-menu-item' ><a class='user-box' id='user-box'><i class='fa fa-user'></i><span class='user-name'>" + obj.usuario.nombres + "</span> </a><ul role='menu' class='sub-menu'><li class='menu-item menu-item-type-post_type menu-item-object-page fusion-dropdown-submenu'><div class='user-menu'><div class='left-panel'><img class='user-imagen' src='" + obj.usuario.imagen + "'></div><div class='right-panel'><a href='https://youneed.com.ec/app/dashboard.php'>Mi Cuenta</a> <hr> <a href='logout' onclick='logout(event)'>Salir</a></div></div></li></ul></li>");
    jQuery("#menu-menu-principal").append('<li id="shopping-cart-menu" class="menu-item menu-item-type-custom menu-item-object-custom fusion-menu-item-button fusion-last-menu-item" ><a href="https://youneed.com.ec/contratar"><i class="fas fa-shopping-cart"></i></a></li>');
}

function contratarAsociado(event){
	event.preventDefault();
    jQuery("#btn-contratar").LoadingOverlay("show", {maxSize: 70 });
	jQuery.ajax({
        method:"POST",
        // url: 'https://app.youneed.com.ec/api/contratarasociado',
        url: app_BaseUrl + 'app/Ajax.php',
        data: jQuery('#contratar-asociado').serializeArray(),
        complete:function(data){
			var res = JSON.parse(data.responseText);
            jQuery("#btn-contratar").LoadingOverlay("hide");
			if(res.status == 1){
				// Swal.fire({
				// type: 'success',
				// title: "Solicitud procesada.",
                // text: "Tu solicitud ha sido enviada al Asociado."
                // });
				window.location.replace(app_BaseUrl + 'result.php');
			}else if(res.status == 0){
            Swal.fire({
				type: 'error',
				title: "Error de sericio.",
                text: res.message
                });
				
			}else if(res.status == 2){
			jQuery("#btn-contratar").LoadingOverlay("hide");
            Swal.fire({
				type: 'warning',
				title: "Solicitud Pendiente.",
                text: res.message
                });
				
			}
			//console.log(data.responseText);
        }
    });
}

function aceptarPedido(id){
    
        jQuery("#pedido-" + id).LoadingOverlay("show", {maxSize: 30 });

        jQuery.ajax({
            method:"POST",
            // url: 'https://app.youneed.com.ec/api/contratarasociado',
            url: app_BaseUrl + 'app/Ajax.php',
            data:{
                fn:'aceptarPedido',
                id: id
            },
            success:function(data){
                var res = JSON.parse(data);

                if(res.status == 1){
                    Swal.fire({
                        type:"success",
                        text:"Has aceptado la solicitud."
                    });
                    jQuery("#pedido-" + id + ' .notif_acciones').html('<a href="javascript:void(0)" class="btn btn-warning btn-xs" onclick="ejecutarPedido(' + id + ')">EJECUTAR</a><a href="javascript:void(0)" class="btn btn-danger btn-xs" onclick="cancelarPedido(' + id + ')">CANCELAR</a>');
                    jQuery("#pedido-" + id).LoadingOverlay("hide");
                }
                //console.log(data.responseText);
            },
            error:function(){
                jQuery("#pedido-" + id).LoadingOverlay("hide");
            }
        });
}

function cancelarPedido(id){
    
    jQuery("#pedido-" + id).LoadingOverlay("show", {maxSize: 30 });

    jQuery.ajax({
        method:"POST",
        // url: 'https://app.youneed.com.ec/api/contratarasociado',
        url: app_BaseUrl + 'app/Ajax.php',
        data:{
            fn:'cancelarPedido',
            id: id
        },
        success:function(data){
            var res = JSON.parse(data);

            if(res.status == 4){
                Swal.fire({
                    type:"info",
                    text:"Solicitud cancelada."
                });
                jQuery("#pedido-" + id + ' .notif_acciones').html('<a href="javascript:void(0)" class="btn btn-warning btn-xs" onclick="ejecutarPedido(' + id + ')">EJECUTAR</a><a href="javascript:void(0)" class="btn btn-danger btn-xs" onclick="cancelarPedido(' + id + ')">CANCELAR</a>');
                jQuery("#pedido-" + id).LoadingOverlay("hide");
            }
            //console.log(data.responseText);
        },
        error:function(){
            jQuery("#pedido-" + id).LoadingOverlay("hide");
        }
    });
}

function clientSave(){
    var valid = 0;
    ready=jQuery('#usuarios-terminos_condiciones:checked').val();
    if(ready){
        var u1 =jQuery("#usuarios-nombres").validationEngine('validate');
        var u2 =jQuery("#usuarios-apellidos").validationEngine('validate');
        var u3 =jQuery("#usuarios-email").validationEngine('validate');
        var u4 =jQuery("#usuarios-numero_celular").validationEngine('validate');
        var u5 =jQuery("#usuarios-clave").validationEngine('validate');
        var u6 =jQuery("#usuarios-confirma-clave").validationEngine('validate');
        if(u1&&u2&&u3&&u4&&u5&&u6){
            
            jQuery("#usuarios-validate").val(1);
            
            var formdata = jQuery("#client-register-form").serialize();

            jQuery.ajax({
                method:"POST",
                url:"https://app.youneed.com.ec/api/register",
                data: formdata,
                complete:function(data){
                    var res = JSON.parse(data.responseText);
                    if(res.status){
                        Swal.fire({
                            type: "success",
                            title: "Bienvenido! " + jQuery("#usuarios-nombres").val(),
                            text: "Ya estás registrado"
                        });
                    }else{
                        var htmlText = '<ul>';
                        for(key in res.data.errors) { 
                            htmlText += '<li>';
                            htmlText += res.data.errors[key]; 
                            htmlText += '</li>';
                        } 
                        htmlText += '<ul>';

                        Swal.fire({
                            type: "error",
                            title: "Lo sentimos! hubo un error.",
                            html: htmlText
                        });
                    }
                }
            });
            
        }
    }else{
        Swal.fire({
            type: "error",
            text: "Debes aceptar los términos y condiciones del sitio antes de continuar."
        });
    };
}

function logout(e){
    e.preventDefault();
    e.stopPropagation();
    jQuery.ajax({
        url: app_BaseUrl + "app/Ajax.php",
        data:{
           fn:"logout"
        },
        complete:function(data){
            
            var res = data.responseText;
            if(res){
                window.location.replace( app_HomeUrl );
            }
            
        }
       
    });
    
}
    