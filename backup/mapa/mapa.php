<?php
 $endereco = $_GET['en']."-".$_GET['c'].",".$_GET['et'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript">

function getLatLong($opcao) {
    var $geo = new google.maps.Geocoder();
 
    $geo.geocode({
        address: $opcao.endereco
    },
        function($resultado, $status){
            if($status == google.maps.GeocoderStatus.OK) {
                // Criamos nossas latitude e longitude
                var $coords = $resultado[0].geometry.location;
 
                // Opcoes do mapa
                var $opcoes = {
                    zoom: $opcao.zoom,
                    center: $coords,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                }
 
                // Criamos o mapa
                var $mapDom = document.getElementById($opcao.dom);
                var $map = new google.maps.Map($mapDom, $opcoes);
 
                // Adicionamos o "marker" aquele ponto vermelho
                var $mark = new google.maps.Marker({
                    position: $coords,
                    map: $map
                });
            }
        });
 
}
 
getLatLong({
   // endereco: 'Av. Sete de Setembro - Curitiba, PR',
	endereco:'<?php echo $endereco;?>' ,
    zoom: 15,
    dom: 'mapContent'
});
</script>
</head>

<body>
<div id="mapContent" style="width: 600px; height: 600px;"></div>
<a href="?pg=home">Voltar</a>
</body>
</html>
