<?php
include_once("../model/conexao/conexao.php");

echo "id: ".$_SESSION["idUs"];
echo "<br>sessa: ".$_SESSION["usuario"];
echo "<br>senha".$_SESSION["senha"];






class PainelDeControle
{
 private $usuario;
 private $profissao;
 private $experiencia;
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
 
$consulta = $this->conn->query("SELECT * FROM preciso_profissional  WHERE id_profissional=$_SESSION[idUs] ");
  $l = $consulta->fetch(PDO::FETCH_ASSOC);
  echo "<fieldset><legend>Dados Pessoais</legend>";
  echo "<table><tr><form action='#' method=post>
   <td>  	Profissional:</td><td><input type=text name='nome' value='$l[nome_profissional]' size=40/>   			</td></tr>
   <tr><td>	Profissao:	</td><td><input type=text name='tipo' value='$l[profissao_profissional]' size=40/>	</td></tr>
   <tr><td>	Endereco:	</td><td><input type=text name='endereco' value='$l[endereco_profissional]' size=40/>	</td></tr>
   <tr><td>	Descricao:	</td><td> <textarea name =desc rows=20 cols=33> $l[descricao_profissional]</textarea> 		</td></tr>
	<tr><td>Estado :	</td><td> <select name=estado id=estado> <option selected=selected > $l[estado_profissional]</option></select></td></tr>
	<tr><td>Cidade :	</td><td> <select name=cidade id=cidade> <option> $l[cidade_profissional]</option></select></td></tr>
	<tr><td>Fone 1:   	</td><td><input type=text name='fone'  pattern='\(\d\d\)\d\d\d\d\-\d\d\d\d' title='(xx)xxxx-xxxx' value='$l[fone_profissional]' size=40/>	</td></tr>
	<tr><td>Fone 2:   	</td><td><input type=text name='fone2' pattern='\(\d\d\)\d\d\d\d\-\d\d\d\d' title='(xx)xxxx-xxxx'  value='$l[fone2_profissional]' size=40/>	</td></tr>
	<tr><td>Email:   	</td><td><input type=email name='email' value='$l[email_profissional]' size=40/>	</td></tr>
	<tr><td>Site:   	</td><td><input type=text name='site' value='$l[site_profissional]' size=40/>	</td></tr>
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
 $sql_atualiza = $this->conn->exec("UPDATE preciso_profissional SET  nome_profissional='$this->nome',endereco_profissional='$this->endereco', fone_profissional ='$this->fone',fone2_profissional ='$this->fone2',email_profissional='$this->email' ,site_profissional=' $this->site ',descricao_profissional='$this->descricao', cidade_profissional='$this->cidade',estado_profissional='$this->estado' where id_profissional=$_SESSION[idUs]");
header('location:?pg=profiss');
} 

}
$obj = new PainelDeControle;
$obj->formulario();
if(isset($_POST['atualizar'])){
$obj->atualizar($_POST['tipo'],$_POST['nome'],$_POST['endereco'],$_POST['fone'],$_POST['fone2'],$_POST['email'],$_POST['site'],$_POST['desc'],$_POST['cidade'],$_POST['estado']);
}

?>
