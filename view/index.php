<?php
include_once("../model/conexao/conexao.php");
ini_set('session.cache_expire',60);
  ini_set('session.cookie_httponly',true);
  ini_set('session.use_only_cookie',true);

session_start();
if(strpos(strtolower($_SERVER['REQUEST_URI']),'phpsessid')!==false)
{
 session_destroy();
session_start();
session_regenerate_id();

}

?>
<!DOCTYPE html >
<html lang="pt-br">
<head>
<meta  charset="utf-8" />

<title>DokPrecisa</title>

<link type="text/css" href="css/estilo.css" rel="stylesheet" />
<link type="text/css" href="js/jquery-quick-pagination/css/styles.css" rel="stylesheet" />
<link type="text/css" href="css/estiloUploadImg.css" rel="stylesheet" />
<link type="text/css" href="css/estiloExclusao.css" rel="stylesheet" />
<script type="text/javascript"   src="js/funcoes.js"></script>
<!--<script type="text/javascript" src="http://cidades-estados-js.googlecode.com/files/cidades-estados-v0.2.js"></script>-->
<script type="text/javascript" src="js/cidades-estados-v0.2.js"></script>
<script  type="text/javascript" src="js/jquery-1.6.1.js"></script>
<!--<script type="text/javascript" src="js/jquery.maskedinput-1.2.2.min.js"></script>-->
<script type="text/javascript" src="js/jquery-quick-pagination/js/jquery.quick.pagination.min.js"></script>
<script type="text/javascript" src="js/uploadImagem.js"></script>
<script type="text/javascript" src="js/menu.js"></script>
<script type="text/javascript">
$(document).ready(function() {
		$("ul.pagination1").quickPagination({pageSize:"2"});

});




/////////////////


navigator.geolocation.getCurrentPosition(showpos)
//w=navigator.geolocation.watchPosition(showpos,erropos)
 function showpos(position){
  lat=position.coords.latitude
  lon=position.coords.longitude
 // alert('Your position: '+lat+','+lon)
  
  
  
}
 window.onload = function() {
        new dgCidadesEstados( 
            document.getElementById('estado'), 
            document.getElementById('cidade'), 
            true
        );
	}
 
 


</script>
</head>

<body>

<section id="geral">

		<!--<div id="geral">
   			<!--	<div id="menu">-->
             <nav id="menu">
   					<?php
					 include ("menu.php");
   						?>
              </nav>
   
<section id="conteudo">   

		<article >  
   		<!--			 <div id="conteudo">-->
    	  				<?php include "../controller/paginas.php"; 
							    	
						?>
                       
   					<!--  </div><!--fim div conteudo-->
		</article>

</section>
    <!-- </div> <!--fim div geral-->

</section>

</body>
</html>
