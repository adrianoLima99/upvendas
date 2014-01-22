<?php 

include_once("../model/conexao/conexao.php");
	
	echo  "usuario".	$_SESSION['usuario'];
 	echo 	"<br/>senha".$_SESSION['senha']	;
class alteracao
{
 private $usuario;
 private $categoria;
 private $nome;
 private $endereco;
 private $fone;
 private $fone2;
 private $email;
 private $site;
 private $descricao;
 private $cidade;
 private $estado;
 
 
 private $conn;
 function __construct()
 {
  	$this->conn = new connection();
 }
 function formulario( )
 {
 if(!empty($_SESSION['usuario']) && !empty($_SESSION['senha']) )
{
  echo "<h2>Atualizar Cadastro</h2>";
 echo $this->usuario = $_SESSION['idUs'];
  $consulta = $this->conn->query("SELECT * FROM preciso  WHERE  preciso_id=$_SESSION[idUs]  ");
  $l = $consulta->fetch(PDO::FETCH_ASSOC);
  echo "<fieldset><legend>Dados Pessoais</legend>";
  echo "<table><tr><form action='#' method=post>
   <td>  	Nome:		</td><td><input type=text name='nome' value='$l[preciso_nome]' size=40/>   			</td></tr>
   <tr><td>	Tipo:	</td><td><input type=text name='tipo' value='$l[categoria]' size=40/>	</td></tr>
   <tr><td>	Endereco:	</td><td><input type=text name='endereco' value='$l[preciso_endereco]' size=40/>	</td></tr>
   <tr><td>	Descricao:	</td><td> <textarea name =desc rows=20 cols=33> $l[preciso_descricao]</textarea> 		</td></tr>
	<tr><td>Estado :	</td><td> <select name=estado id=estado> <option selected=selected > $l[estado]</option></select></td></tr>
	<tr><td>Cidade :	</td><td> <select name=cidade id=cidade> <option> $l[cidade]</option></select></td></tr>
	<tr><td>Fone:   	</td><td><input type=tel name='fone' pattern='\(\d\d\)\d\d\d\d\-\d\d\d\d' title='(xx)xxxx-xxxx' value='$l[preciso_fone]' size=40/>	</td></tr>
	<tr><td>Fone2:   	</td><td><input type=tel name='fone2' pattern='\(\d\d\)\d\d\d\d\-\d\d\d\d' title='(xx)xxxx-xxxx' value='$l[preciso_fone2]' size=40/>	</td></tr>
	<tr><td>Email:   	</td><td><input type=email name='email' value='$l[preciso_email]' size=40/>	</td></tr>
	<tr><td>Site:   	</td><td><input type=text name='site' value='$l[preciso_site]' size=40/>	</td></tr>
  <tr><td>   	</td><td><input type=submit name='atualizar' value='atualizar' />	</td></tr>
	
	</form>
		 </table></fieldset>	";
}else{ echo "usuario ou senha estao incorretos";}		 
 
 }
function atualizar($categoria,$nome,$endereco,$fone,$fone2,$email,$site,$descricao,$cidade,$estado)
{
 $this->categoria 		= $categoria;
 $this->nome 		= $nome;
 $this->endereco 	= $endereco;
 $this->fone		= $fone;
 $this->fone2		= $fone2;
 $this->email       = $email;
 $this->site 	    = $site;
 $this->descricao	= $descricao;
 $this->cidade 		= $cidade;
 $this->estado	 	= $estado;
 $sql_atualiza = $this->conn->exec("UPDATE preciso SET  categoria='$this->categoria', preciso_nome='$this->nome',preciso_endereco='$this->endereco', preciso_fone ='$this->fone',preciso_fone2 ='$this->fone2',preciso_email='$this->email' ,preciso_site=' $this->site ',preciso_descricao='$this->descricao', cidade='$this->cidade',estado='$this->estado' where preciso_id=$this->usuario");
header('location:?pg=alterar');
} 

}
$obj = new alteracao;
$obj->formulario();
if(isset($_POST['atualizar'])){
$obj->atualizar($_POST['tipo'],$_POST['nome'],$_POST['endereco'],$_POST['fone'],$_POST['fone2'],$_POST['email'],$_POST['site'],$_POST['desc'],$_POST['cidade'],$_POST['estado']);
}

?>