<div id="form"> <?php include "formlocalizar.php"; ?></div><!--fim div form-->

<?php
echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
include_once("../model/conexao/conexao.php");
 class localizado
 {
  private $encontre = null;
  private $bairro = null;
  private $cidade = null;
  private $estado = null;
  private $selecao = null;
  private $tipo=null;
  
  private $conn = null;
  private $vetor=array();

 function __construct()
 {
  $this->conn = new connection();
 }
 //pesquisa por nome do profissional ou da empresa  ou descricao 
 
 
 function selecao($encontre,$tipo,$estado,$cidade)
 {
 
       $this->encontre = $encontre;
       $this->tipo = $tipo;
		$this->estado  	= $estado;
		$this->cidade	= $cidade;
		
  if(!empty($encontre) && !empty($estado) && !empty($cidade)  )
  	{ 
		if($this->tipo=="autonomo")
		  { 	
		    		 $this->estadosEcidades2(); 
		  } 
		 else if($this->tipo=="Empresa")
		  {
		 			$this->estadosEcidades();
		  }
		 else
		 {		
					$this->estadosEcidades();
					$this->estadosEcidades2();
	     }	
	}
elseif(!empty($encontre) && !empty($estado) && empty($cidade))
	{ 
	   if($this->tipo=="autonomo")
		 {  
		  			$this->estados2(); 
		 } 
	   else if($this->tipo=="Empresa")
	     {
		 			$this->estados();
		 }
	  else
		 {		
					$this->estados();
					$this->estados2();
		   }
	}	   
	  
elseif(!empty($encontre) && empty($estado) && empty($cidade))
	{ 
	  if($this->tipo=="autonomo")
		{ 
		    $this->parteString2();
		} 
	 else if($this->tipo=="Empresa")
	    {
		    	  $this->parteString();
		 }
	else
		{		
		   		   $this->parteString();
	    			$this->parteString2();
	   }
    }
 }
 
 
 function selections()
  {

   
   $sql_exe = $this->conn->query("SELECT * FROM preciso ");
 
   while($linha= $sql_exe->fetch(PDO::FETCH_ASSOC))
   {
  
     $divisora = explode(",",$linha['preciso_descricao']);
	
     for($i=0;$i<sizeof($divisora);$i++)
	 {
	
			 if($divisora[$i] == ($this->encontre))
			 {
			
			 $this->vetor[$i]=$divisora[$i];
			 
			 }
       }
	   
   
   }
   
   
   
 
  }
 
 /*--------------------------------------------EMPRESAS------------------------------------------------------------------------*/
  //pesquisa considerando parte do nome ou do endereco da empresa 
 
 function parteString()
  {
  
   $this->selecao=$this->conn->query("SELECT * FROM preciso WHERE preciso_nome like'%".$this->encontre."%' or preciso_endereco like'%".$this->encontre."%' or preciso_endereco='".trim($this->encontre)."' or preciso_nome='".trim($this->encontre)."'");
   
     $this->resultadPesquisa();

 
  }
  //pesquisa pela estado ou cidade ou pelos dois 
 function estadosEcidades()
  {
  
  	$this->selecao = $this->conn->query("SELECT * FROM preciso WHERE preciso_nome like'%$this->encontre%' and cidade ='$this->cidade' and estado ='$this->estado'")or die("erro");
	 
     $this->resultadPesquisa();

 
  }  
 
 function estados()
  {
  
  		$this->selecao = $this->conn->query("SELECT * FROM preciso WHERE preciso_nome like'%$this->encontre%' and estado ='$this->estado'")or die("erro");
	  
    $this->resultadPesquisa();
	

 
  } 
  function resultadPesquisa()
  {
  
   
   echo "<ul class='pagination1'>";
	while($linha= $this->selecao->fetch(PDO::FETCH_ASSOC))
   {
       
	   echo "<li><div class='contene'><h3  style='color:green; text-decoration:underline; margin-bottom:1px;padding-bottom:2px'>".$linha['preciso_nome']."</h3>";
			   
			   echo    $linha['preciso_descricao']."<br/>";
			    echo   $linha['preciso_endereco']." --$linha[cidade]--$linha[estado]<br/>";
				echo	"$linha[preciso_email]<br/><a href=>$linha[preciso_site]</a>  <a href='?pg=ma&en=$linha[preciso_endereco]&c=$linha[cidade]&et=$linha[estado]'>mapa</a><br/>
				<p style='color:green;'>FONE: ".$linha['preciso_fone']."</p></div></li>";
   }
   echo "</ul>";
  
  } 
/*--------------------------------------------EMPRESAS------------------------------------------------------------------------*/

/*--------------------------------------------PROFISSIONAIS------------------------------------------------------------------------*/
function parteString2()
  {
  
   $this->selecao=$this->conn->query("SELECT * FROM preciso_profissional WHERE profissao_profissional like'%".$this->encontre."%' or fone_profissional like'%".$this->encontre."%' or endereco_profissional='".trim($this->encontre)."' or email_profissional='".trim($this->encontre)."'");
   
     $this->resultadPesquisa2();

 
  }
  //pesquisa pela estado ou cidade ou pelos dois 
 function estadosEcidades2()
  {
  
  	$this->selecao = $this->conn->query("SELECT * FROM preciso_profissional WHERE profissao_profissional like'%$this->encontre%' and cidade_profissional ='$this->cidade' and estado_profissional ='$this->estado'")or die("erro");
	 
     $this->resultadPesquisa2();

 
  }  
 
 function estados2()
  {
  
  		$this->selecao = $this->conn->query("SELECT * FROM preciso_profissional WHERE profissao_profissional like'%$this->encontre%' and estado_profissional ='$this->estado'")or die("erro");
	  
    $this->resultadPesquisa2();
	

 
  } 
  function resultadPesquisa2()
  {
  
     
   echo "<ul class='pagination1'>";
	while($linha= $this->selecao->fetch(PDO::FETCH_ASSOC))
   {
       
	   echo "<li><div class='contene'><h3  style='color:green; text-decoration:underline; margin-bottom:1px;padding-bottom:2px'>".$linha['nome_profissional']."</h3>";
			   
			   echo    $linha['profissao_profissional']."<br/>";
			    echo   $linha['endereco_profissional']." --$linha[cidade_profissional]--$linha[estado_profissional]<br/>";
				echo	"$linha[email_profissional]<br/><a href=>$linha[site_profissional]</a><a href='?pg=ma&en=$linha[endereco_profissional]&c=$linha[cidade_profissional]&et=$linha[estado_profissional]'>mapa</a><br/>
				<p style='color:green;'>FONE: ".$linha['fone_profissional']."</p></div></li>";
   }
   echo "</ul>";
  
  }




/*--------------------------------------------PROFISSIONAIS------------------------------------------------------------------------*/




 function resultado($encontre){  $this->encontre =$encontre; echo "<h3 style='color:blue; text-decoration:underline; font-style:italic;'>Resultados encontrados para: ".$this->encontre."</h3>"; echo "<hr/>";    }
 
 }
 if(isset($_POST['enviar'])){
 
$robot = new localizado();
$robot->resultado($_POST['localizar']);

$robot->selecao($_POST['localizar'],$_POST['tipo'],$_POST['estado'],$_POST['cidade']);
}

?>