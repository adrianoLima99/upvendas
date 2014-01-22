


<?php 

 switch($_GET["pg"]){
 case "home";
 	include "../view/formlocalizar.php";
	break;
 case "habilitandoservico";
 	include "../model/negocio.class.php";
        break;
case "localizando";
 	include "../model/localizado.class.php";
	
      break;	
case "planos";
 	include "../model/investimentos.html";
	
      break;		  
	
case "cadastrado";
 	include "estabelecimento.php";
	 break;
case "profissional";
 	include "profissional.html";
	break;	 
case "cadProfissional";
 	include "../model/cadProfissional.class.php";
	break;	
case "logar";
 	include "../view/login.html";
	break;
	
case "logado";
 	include "../model/login.php";
	 break;	  
case "sair";
 	include "../model/logout.php";
	 break;	  	 
case "alterar";
 	include "../model/alteracao.php";
	break;
case "ma";
 	include "../model/mapa.php";
	break;	
case "profiss";
 	include "../model/painelControleProfis.php";
	break;	
case "produtos";
    include "../controller/controleProdutos.php"; ;
	break;	
	
case "adicao";
    include "../model/operacaoProdutos.php"; ;
	break;		

case "Funciona";
    include "../view/ComoFunciona.html"; ;
	break;		


default:	
     
	  include "../view/formlocalizar.php";	
	  break;
 
}
 

?>