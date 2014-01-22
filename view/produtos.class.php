<?php
 include("../model/upload.php");
class Produtos{
  private $produto;
  private $quantidade;
  private $descricao;
  private $preco;
  private $sql;
  
function __construct()
{
 		$this->conn = new Connection();
} 
public function setProduto($produto)
{
	   $this->produto = $produto;
} 
public function getProduto()
{
   	   return $this->produto ;
} 
public function setDesc($descricao)
{
	   $this->descricao = $descricao;
} 
public function getDesc()
{
   	   return $this->descricao ;
} 
public function setQtd($quantidade)
{
	   $this->quantidade = $quantidade;
 
} 
public function getQtd()
{
   	   return $this->quantidade ;
} 
public function setPreco($preco)
{
	   $this->preco = $preco;
 } 
public function getPreco()
{
       return $this->preco ;
} 
 
public function Add()
{
 
 echo "<fieldset><legend>Adicionar Produto</legend>
        <table>
		  <tr>
		    <form action='#' name='frmProduto' enctype='multipart/form-data' method='post'>
 		      <input type=file name='arquivo' id='arquivo'/>
			  <td> Produto    	   </td><td>  <input  type='text' name='produto' id='produto'/></td></tr>
			   <td> descricao: 	   </td><td>  <textarea name='descricao' id='descricao' cols='24' rows='10'></textarea></td></tr>
 		      <tr><td>  Qtd:   	   </td><td>  <input  type='text' name='qtd' id='qtd'/>   </td></tr>
		      <tr><td>Pre&ccedil;o:  </td><td>  <input  type='text' name='preco' id='preco'/>    </td></tr>
		   	  <tr><td><input type='submit' name='adi' value='adicionar'/>         </td>
		</form></tr></table>
		";
 
}
public function frmAlteracao()
{
 
 
  $this->sql = $this->conn->query("select * from produtos where id_produto=$_GET[id]");
  $l=$this->sql->fetch(PDO::FETCH_OBJ);
 echo "<fieldset><legend>Atualizar Produto</legend>
        <table>
		  <tr>
		    <form action='#' name='frmProdutoatual' enctype='multipart/form-data' method='post'>
 		      <input type=file name='arquivo' id='arquivo'/>
			  <td> Produto    	   </td><td>  <input  type='text' name='produto' id='produto'  value='$l->nome_produto'/></td></tr>
			   <td> descricao: 	   </td><td>  <textarea name='descricao' id='descricao' cols='24' rows='10'  >$l->descricao_produto</textarea></td></tr>
 		      <tr><td>  Qtd/Estoque:   	   </td><td>  <input  type='text' name='qtd' id='qtd' value='$l->qtd_produto'/>   </td></tr>
		      <tr><td>Pre&ccedil;o:  </td><td>  <input  type='text' name='preco' id='preco' value='$l->preco_produto'/>    </td></tr>
		   	  <tr><td><input type='submit' name='alteracao' value='alteracao'/>         </td>
		</form></tr></table>
		";
 
}
public function listar()
{

   $this->sql = $this->conn->query("select * from produtos where id_preciso=$_SESSION[idUs]");
    echo "<a href='?pg=produtos&opcao=adicionar'>Adicionar</a><br/>";
     echo "<table width=560px border=1 cellpadding='0' cellspacing='0'>
	 			<tr><td>Produto</td><td>Descricao</td><td>Quantidade/Estoque</td><td>Preco/Unidade</td><td>Alterar</td><td>Excluir</td></tr>";
	 
      while($l=$this->sql->fetch(PDO::FETCH_OBJ))
       {
  	   echo  "<tr><td>".$l->nome_produto."</td><td>".
	          $l->descricao_produto."</td><td>".
	   		 $l->qtd_produto."</td><td>R$: ".
	    	 $l->preco_produto."</td>
			 <td><a href='?pg=produtos&opcao=altera&id=$l->id_produto'>Alterar</a></td>
			 <td><a href='?pg=produtos&opcao=excluir&id=$l->id_produto'>excluir</a></td></tr>";
		  
	     
  		}
	  echo "</table>";	  	
}
public function efetuaAdd()
{
 $sqlsAdd= $this->conn->exec("INSERT INTO produtos(nome_produto,qtd_produto,preco_produto,id_preciso,descricao_produto) VALUES('$this->produto',$this->quantidade,$this->preco,$_SESSION[idUs],'$this->descricao')")or die("erro");

}

public function efetuaAlter()
{
 $sqlAlter= $this->conn->exec("UPDATE produtos SET nome_produto='$this->produto', qtd_produto=$this->quantidade,descricao_produto='$this->descricao',preco_produto=$this->preco WHERE id_produto=$_GET[id] and id_preciso=$_SESSION[idUs]")or die("erro");
 header("location:?pg=produtos&opcao=altera&id=$_GET[id]");

}
public function exclusao()
{
  $this->sql = $this->conn->query("select * from produtos where id_produto=$_GET[id]");
   $l=$this->sql->fetch(PDO::FETCH_OBJ);
   
 echo "
         <header><h1>Tem Certeza Que Deseja Excluir Esse Registro?</h1></header>
 			<section id='exclusao'>
 			 <table width='570px' cellpadding='0' cellspacing='0'>
	            <tr><td>Produto</td><td>Descricao</td><td>Qtd/Estoque</td><td>Preco</td></tr>
				<tr  style='background:#FF0000;color:#FFFFFF; padding:2px 5px'>
				<td>$l->nome_produto</td><td>$l->descricao_produto</td><td>$l->qtd_produto</td><td>R$: $l->preco_produto</td></tr>				 
			     
			 </table>
			 <div class='exclusao1'><a href='?pg=produtos&opcao=excluir&id=$_GET[id]&decisao=1'>Sim,excluir agora</a></div>
		     <div class='exclusao0'><a href='?pg=produtos&opcao=excluir&id=$_GET[id]&decisao=0'>Nao</a></div>
 		</section>";
	if(isset($_GET['decisao'])  && $_GET['decisao']==1)
	{ $excluido =$this->conn->exec("DELETE FROM produtos WHERE id_produto=$_GET[id]")or die("erro delecao");
	   if($excluido)
	   {    header("location:?pg=produtos");}
	 }else if(isset($_GET['decisao'])  && $_GET['decisao']==0)
	 {   header("location:?pg=produtos");}
	   
	 
}


 
 }






?>