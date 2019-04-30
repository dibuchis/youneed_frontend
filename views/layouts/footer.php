
<script
  src="https://code.jquery.com/jquery-3.4.0.min.js"
  integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
  crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>
/*jQuery(function ($) {
setTimeout(function () {$.notify({"message":"Por ahora no tiene notificaciones","icon":"glyphicon glyphicon-ok-sign","title":"Notificaciones","url":"","target":"_blank"}, notify_3844e4ee);}, 1);
});*/</script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<!-- <script>	

    jQuery(document).ready(function(){
        jQuery('.owl-carousel-cat').owlCarousel({
            items: 6,
            margin:45,
            nav:true
        });
    });
</script> -->

<script type="text/javascript">
    jQuery(function($){
        $.ajax({
            url: "views/_dashboard.php",
            success:function(data){
                $("#dashboard-content").html(data);
            }
        })
    });

</script>