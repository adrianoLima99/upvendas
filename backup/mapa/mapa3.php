<html>
<head><title></title>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript">
var map = null; 
function carregar(){
    var latlng = new google.maps.LatLng(-5.089212,-42.801627);
             
    var myOptions = {
            zoom: 12,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
         };
         
    //criando o mapa
   map = new google.maps.Map( document.getElementById("mapa") , myOptions );
   
   
     var marker = new google.maps.Marker({
                position: latlng,
                map: map,
                title:"Você está aqui!"
            });
 
            var infowindow = new google.maps.InfoWindow({
                content: 'Você está aqui!'
            });
 
            google.maps.event.addListener(marker, 'click', function() {
              infowindow.open(map,marker);
            });
}
</script>
</head>
<body onLoad="carregar()">
<div id="mapa"  style="width:400px;height:400px;">
</div>


</body>
</html>