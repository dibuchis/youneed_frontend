var app_BaseUrl = "https://youneed.com.ec/app/";
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
                    url:app_BaseUrl + "login.php",
                    data:{
                        username: $("#api-username").val(),
                        password: $("#api-password").val(),
                    },
                    complete:function(data){
                        
                        
                        var obj = JSON.parse(JSON.parse(data.responseText));
                        
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
            $.ajax({
                url:$(this).attr("href"),
                success:function(data){
                    $("#dashboard-content").html(data);
					$( document ).scrollTop("slow", 0);
               }
           })
           
        });
	});
})(jQuery);

function userMenu(obj){
    //console.log(obj);
    jQuery("#menu-item-1109").html("<a class='user-box' id='user-box'><i class='fa fa-user'></i><span class='user-name'>" + obj.usuario.nombres + "</span></a><ul role='menu' class='sub-menu'><li class='menu-item menu-item-type-post_type menu-item-object-page fusion-dropdown-submenu'><div class='user-menu'><div class='left-panel'><img class='user-imagen' src='" + obj.usuario.imagen + "'></div><div class='right-panel'><a href='https://youneed.com.ec/app/dashboard.php'>Mi Cuenta</a> <hr> <a href='logout' onclick='logout(event)'>Salir</a></div></div></li></ul>");
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
    