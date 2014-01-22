
<?php

if(isset($_GET['pg'])=='produtos')
{

 include("../view/produtos.class.php");
  $obj= new Produtos();
  
  
	
  
  if($_GET['opcao']=="adicionar")
  {
     $obj->add();
	if(isset($_POST['adi'])){
		 $obj->setProduto($_POST['produto']);
		 $obj->setDesc($_POST['descricao']);
		 $obj->setQtd($_POST['qtd']);
		 $obj->setpreco($_POST['preco']);
		  $obj-> efetuaAdd();
		}  
  }else
    if($_GET['opcao']=="altera")
  {
    $obj->frmAlteracao();
      if(isset($_POST['alteracao'])){
			$obj->setProduto($_POST['produto']);
			 $obj->setDesc($_POST['descricao']);
			 $obj->setQtd($_POST['qtd']);
			 $obj->setpreco($_POST['preco']);
			 
			  $obj-> efetuaAlter();
          }
  } else
    if($_GET['opcao']=="excluir")
  {
    		  $obj-> exclusao();
 }   
  else
   if(empty($_GET['opcao'])){
     $_GET['opcao']='lista';
   	$obj->listar();
   }

}




?>