<div id="form"> <?php include "formlocalizar.html"; ?></div><!--fim div form-->

<?php
echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
include_once("conexao/conexao.php");
 class localizado
 {
  private $encontre;
  private $bairro;
  private $cidade;
  private $estado;
  private $conn;

 function __construct()
 {
  $this->conn = new connection();
 }
 
 function selections($encontre )
  {
 
   $this->encontre = $encontre;
   $sql_exe = $this->conn->query("SELECT * FROM preciso ");
 
   while($linha= $sql_exe->fetch(PDO::FETCH_ASSOC))
   {
  
     if( $this->encontre == $linha['preciso_nome'])
			 {
			   
			   echo "<h3 style='color:green; text-decoration:underline;'>".$linha['preciso_nome']."</h3>";
			   
			   echo   "<div class=contene >".$linha['preciso_descricao']."<br/>";
			    echo   $linha['preciso_endereco']."<br/>";
				echo	"<p style='color:green;'>FONE: ".$linha['preciso_fone']."</p><br/></div>";
             }
	   
    $divisora = explode(",",$linha['preciso_descricao']);
	
     for($i=0;$i<sizeof($divisora);$i++)
	 {
	
			 if($divisora[$i] == ($this->encontre))
			 {
			   echo "<h3 style='color:green; text-decoration:underline;'>".$linha['preciso_nome']."</h3>";
			   
			   echo     "<div class=contene >".$linha['preciso_descricao']."<br/>";
			    echo     $linha['preciso_endereco']."<br/>";
				echo	"<p style='color:green;'>FONE: ".$linha['preciso_fone']."</p><br/></div>";
             }
       }
	   
   
   }
   
   
   
 
  }
  
 function parteString($encontre)
  {
   $this->encontre = trim($encontre);
   $sql_parte=$this->conn->query("SELECT * FROM preciso WHERE preciso_nome like'%".$this->encontre."%' or preciso_endereco like'%".$this->encontre."%' ");
    while($linha= $sql_parte->fetch(PDO::FETCH_ASSOC))
   {
       echo "<h3  style='color:green; text-decoration:underline;'>".$linha['preciso_nome']."</h3>";
			   
			   echo   "<div class=contene >". $linha['preciso_descricao']."<br/>";
			    echo   $linha['preciso_endereco']."<br/>";
				echo	"<p style='color:green;'>FONE: ".$linha['preciso_fone']."</p><br/></div>";
   }
 
  }
 function maisEspecifico($encontre,$estado,$cidade)
  {
   $this->encontre =$encontre;$this->estado =$estado;$this->cidade =$cidade;
   if(!empty($estado))
   		{
			$this->estado = $estado;
			$selecao = $this->conn->query("SELECT * FROM preciso WHERE preciso_nome like'%$this->encontre%' and estado ='$this->estado'");
				
		}
   if(!empty($cidade))
      {
	  	$this->cidade = $cidade;
			$selecao = $this->conn->query("SELECT * FROM preciso WHERE preciso_nome like'%$this->encontre%' and cidade ='$this->cidade'");
	  }
   if(!empty($estado) && !empty($cidade))
     {
	   	$this->estado = $estado;
			$selecao = $this->conn->query("SELECT * FROM preciso WHERE preciso_nome like'%$this->encontre%' and cidade ='$this->cidade' and estado ='$this->estado'");
	 }
	 if(isset($selecao)){ 
	 
    
    
	while($linha= $selecao->fetch(PDO::FETCH_ASSOC))
   {
       echo "<h3  style='color:green; text-decoration:underline;'>".$linha['preciso_nome']."</h3>";
			   
			   echo   "<div class=contene >". $linha['preciso_descricao']."<br/>";
			    echo   $linha['preciso_endereco']."<br/>";
				echo	"<p style='color:green;'>FONE: ".$linha['preciso_fone']."</p><br/></div>";
   }
 }
 
  }  
 
 function resultado($encontre){  $this->encontre =$encontre; echo "<h3 style='color:blue; text-decoration:underline; font-style:italic;'>Resultados encontrados para: ".$this->encontre."</h3>"; }
 
 }
 if(isset($_POST['enviar'])){
 
$robot = new localizado();
$robot->resultado($_POST['localizar']);
//$robot->selections($_POST['localizar']);
$robot->parteString($_POST['localizar']);
$robot->maisEspecifico($_POST['localizar'],$_POST['estado'],$_POST['cidade']);

//$robot->selectionsbairro($_POST['localizar'],$_POST['bairro']);

}

?>