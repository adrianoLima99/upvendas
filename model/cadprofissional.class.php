<?php
include_once("../model/conexao/conexao.php");

class profissional
{
 private $nome;
 private $endereco;
 private $bairro;
 private $cidade;
 private $estado;
 private $profissao;
 private $email;
 private $fone;
 private $fone2;
 private $site;
 private $conn;
 private $experiencia;
 private $usuario;
 private $senha;
 private $descricao;
 function __construct()
 {
  $this->conn = new Connection();
 }
 
 function conteudoCampos($experiencia,$nome,$endereco,$cidade,$estado,$profissao,$email,$site,$fone,$fone2,$usuario,$senha,$descricao)
 {
  
    if(!empty($experiencia)){  		   $this->experiencia=	$experiencia; 								}
   if(!empty($nome)){     $this->nome =	$nome; }
   if(!empty($endereco)){	 	   $this->endereco		 =  $endereco;		  }
   
   if(!empty($cidade)){		 	   $this->cidade		 =  $cidade;		  }
   if(!empty($estado)){	  		   $this->estado 		 =  $estado;		  }
   if(!empty($profissao)){		   $this->profissao		 =  $profissao;		  }
   if(!empty($email)){            $this->email			 =  $email;			  }
   if(!empty($fone)){			  $this->fone			 =	$fone;			  }
   if(!empty($fone2)){			  $this->fone2			 =	$fone2;			  }else{ $this->fone2			 =	"null";}
    if(!empty($site)){			  $this->site			 =	$site;			  }
	if(!empty($usuario)){		 $this->usuario				 =	$usuario;		  }
	if(!empty($senha)){			$this->senha				 =	$senha;			  }
	if(!empty($descricao)){		$this->descricao			 =	$descricao;			  }
     
   
 }
 
 function Inserir()
 {
/*



*/		
		
		
		
		
		$sql_insercao = $this->conn->exec("insert into preciso_profissional(nome_profissional,profissao_profissional,tempo_experiencia,endereco_profissional,site_profissional,email_profissional,fone_profissional,fone2_profissional,estado_profissional,cidade_profissional,descricao_profissional) values('$this->nome','$this->profissao','$this->experiencia','$this->endereco','$this->site','$this->email','$this->fone','$this->fone','$this->estado','$this->cidade','$this->descricao') ")or die("erro");
		
	 if($sql_insercao)
	 {
	 $sqlrecu = $this->conn->query("SELECT id_profissional FROM preciso_profissional order by id_profissional desc limit 1");
	  
	  $id=$sqlrecu->fetch(PDO::FETCH_ASSOC);
	 /* 
	             echo  $ultimoId = $id['id_profissional']."<br>";
				*/
	 if($sqlrecu)
	 {
	$codigo=$this->conn->exec("INSERT INTO login_profissional(login_usuario,login_preciso_prof,login_senha) VALUES ('$this->usuario',$id[id_profissional],MD5('$this->senha'))")or die("erro de login");
	 if($sqlrecu)
	 		{
			  $_SESSION['idUs']	    =	 $id['id_profissional'];
		        $_SESSION['usuario']	=	$this->usuario;
       	        $_SESSION['senha']	=	    MD5('$this->senha');
				mkdir("Usuario/".$_SESSION['idUs']."/Imagem/",0777,true);
    			mkdir("Usuario/".$_SESSION['idUs']."/video/",0777,true);
				 header("location:?pg=profiss");
    			
			
			
			}
	 }
	 }	
 echo "<a href='?pg=home'>Voltar</a>";	
	}

}
 
 $objinsere = new profissional;

 $objinsere->conteudoCampos($_POST['exp'],$_POST['nome'],$_POST['end'],$_POST['cidade'],$_POST['estado'],$_POST['prof'],$_POST['email'],$_POST['site'],$_POST['fone'],$_POST['fone2'],$_POST['usuario'],$_POST['senha'],$_POST['desc']);
  $objinsere->Inserir();

?>