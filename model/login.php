 
 <?php

    
	
include_once("../model/conexao/conexao.php");
	
class login{
private $idUs;
private $usuario;
private $senha;
private $conn;
function __construct()
 {
  $this->conn = new connection();
 }
 
function verifica($usuario,$senha)
{
if(!empty($usuario) && !empty($senha) )
{
if(is_string($usuario)&& is_string($senha))

 echo $this->usuario=$usuario;
 echo $this->senha=$senha;
 $this->logar();


}


}


 function logar(){		
	
	$sql =$this->conn->query("SELECT * FROM login WHERE login_usuario = '$this->usuario'  AND  login_senha = MD5('$this->senha')"); //seleciona usuario q tiver dados = variaveis
	
	$sql2 =$this->conn->query("SELECT * FROM login_profissional WHERE login_usuario ='$this->usuario'  AND  login_senha = MD5('$this->senha')");

//verifica loginusuario pessoa fisica	
/*	if($l=$sql->rowCount())
	{
 	$sql 		=	$this->conn->query("SELECT login_id_usuario FROM login WHERE login = '$this->usuario'' and senha=crypt('$this->senha') ");
	
	$resultado 	= 	$sql->fetch(PDO::FETCH_ASSOC);
		
		$idUs		=	 $resultado['login_id_usuario'];
		$consultaUser =$this->conn->query("SELECT * FROM acessos_online WHERE usuarioIdus =".$idUs);
		
         /*       if($consultaUser->rowCount())
                {
	           echo "<br/><h3 align=center>Voc ja esta logado em outro computador!</h3>";
                }else
                {*/
				
		if($sql->rowCount())
		{
		$resultado 	= $sql->fetch(PDO::FETCH_ASSOC);
				
	echo 	$_SESSION['idUs']		=	$resultado['preciso_id'];
	echo  	$_SESSION['usuario']	=	$resultado['login_usuario'];
 	echo 	$_SESSION['senha']		=   $resultado['login_senha'];
	  header("location:?pg=alterar");
		}else if($sql2->rowCount())
		{
		$resultado2 	= $sql2->fetch(PDO::FETCH_ASSOC);
				
	echo 	$_SESSION['idUs']		=	$resultado2['login_preciso_prof'];
	echo  	$_SESSION['usuario']	=	$resultado2['login_usuario'];
 	echo 	$_SESSION['senha']		=   $resultado2['login_senha'];
		 header("location:?pg=profiss");
		}
//$online=$this->conn->exec("INSERT INTO acessos_online(acessos_online_login,acessos_online_ip) VALUES( '$this->usuario','$_SERVER[REMOTE_ADDR]')") or die("errou ");
                 
                
         //   }
   //   }

}
}
if(isset($_POST['entrar']))
{
$obj= new login;
$obj->verifica($_POST['login'],$_POST['senha']);
$obj->logar();
}
 ?>
