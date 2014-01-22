
<?php
include_once("../model/conexao/conexao.php");

class negocio
{
 private $estabelecimento;
 private $endereco;
 private $bairro;
 private $cidade;
 private $estado;
 private $descricao;
 private $email;
 private $fone;
 private $site;
 private $conn;
 private $tipo;
 private $usuario;
 private $senha;
 function __construct()
 {
  $this->conn = new Connection();
 }
 
 function conteudoCampos($tipo,$estabelecimento,$endereco,$cidade,$estado,$descricao,$email,$site,$fone,$usuario,$senha)
 {
  
    if(!empty($tipo)){  		   $this->tipo=	$tipo; 								}
   if(!empty($estabelecimento)){   $this->estabelecimento =	trim($estabelecimento); }
   if(!empty($endereco)){		   $this->endereco		 =  $endereco;		  }
   
   if(!empty($cidade)){			   $this->cidade		 =  $cidade;		  }
   if(!empty($estado)){			   $this->estado 		 =  $estado;		  }
   if(!empty($descricao)){		   $this->descricao		 =  trim($descricao);		  }
   if(!empty($email)){             $this->email			 =  $email;			  }
   if(!empty($fone)){			   $this->fone			 =	$fone;			  }
    if(!empty($site)){			   $this->site			 =	$site;			  }
	if(!empty($usuario)){		  $this->usuario		 =	$usuario;		  }
	if(!empty($senha)){			   $this->senha			 =	$senha;			  }
     
   
 }
 
 function Inserir()
 {
		$sql_insercao = $this->conn->exec("INSERT INTO preciso(categoria,preciso_nome,preciso_endereco,preciso_fone,preciso_email,preciso_site,preciso_descricao,cidade,estado,status) VALUES($this->tipo,'$this->estabelecimento','$this->endereco','$this->fone','$this->email','$this->site','$this->descricao','$this->cidade','$this->estado',0) ")or die("erro");
		
	 if($sql_insercao)
	 {
	 $sqlrecu = $this->conn->query("SELECT preciso_id FROM preciso order by preciso_id desc limit 1 ");
	  
	  $id=$sqlrecu->fetch(PDO::FETCH_ASSOC);
	  
	  $ultimoId = $id['preciso_id'];
		 
	 if($sqlrecu)
	 {
	  $codigo=$this->conn->exec(" INSERT INTO login(login_usuario,preciso_id,login_senha) VALUES('$this->usuario',$ultimoId,MD5('$this->senha')) ")or die("erro geracao login");
	  if($codigo){
	            $_SESSION['idUs']	    =	 $ultimoId;
		        $_SESSION['usuario']	=	$this->usuario;
       	        $_SESSION['senha']	=	    MD5('$this->senha');
	  			mkdir("Usuario/".$_SESSION['idUs']."/Imagem/",0777,true);
    			mkdir("Usuario/".$_SESSION['idUs']."/video/",0777,true);
				 header("location:?pg=alterar");
    			
				  
	  	}
	  
	 }
	 }	
 echo "<a href='?pg=home'>Voltar</a>";	
	}

}
 
 $objinsere = new negocio;

 $objinsere->conteudoCampos($_POST['categoria'],$_POST['estabelecimento'],$_POST['end'],$_POST['cidade'],$_POST['estado'],$_POST['descr'],$_POST['email'],$_POST['site'],$_POST['fone'],$_POST['usuario'],$_POST['senha']);
  $objinsere->Inserir();

?>