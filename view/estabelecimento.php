<!DOCTYPE HTML>
<html lang="pt-br">
<head>
<title>DoKpreciso - Pagina Inicial </title>
<meta charset="utf-8" />

<script type="text/javascript">
 window.onload = function() {
        new dgCidadesEstados( 
            document.getElementById('estado'), 
            document.getElementById('cidade'), 
            true
        );
		
}
</script>


</head>
<body>
<section>
	<header class="logomarca">
	<figure>
      <img src="imagens/logomarcamin.png" width="280" height="40" />
             
              
    </figure>
    
    </header>
<section>
<fieldset>
<legend>Faca parte de nossas consultas </legend>
	         
<table border="0">
<tr><form action="?pg=habilitandoservico" method="post">
  <td> 	Nome:	</td><td>	<input type="text" name="estabelecimento" id="estabelecimento" placeholder="nome da empresa" required/></td>
</tr>
<tr>
  <td>	Endereco:			</td><td>	<input type="text" name="end" id="end" placeholder="av,rua,numero.... " required/>				</td>
</tr>
<tr>
  <td>	Descricao			</td><td>	<textarea cols="40" rows="20" name="descr" placeholder="produto ou serviço oferecido pela sua empresa" required></textarea> </td>
</tr>
  
  											<?php 
                                             include_once("../model/conexao/conexao.php");
                                               class categoria
											   { 
											   private $conn;
											   	private $escolha;										
												function __construct(){ $this->conn = new connection();}
												
												
											function cat(){
											    echo "<tr><td>Categoria:</td><td><select name='categoria' id='categoria' required/>";										 
												 echo "<option></option>";
												 $sql_categoria = $this->conn->query("select * from categoria");
												 while($l = $sql_categoria->fetch(PDO::FETCH_OBJ))
												 {
												 	echo "<option value=$l->categoria_id>".$l->categoria_nome."</option>";
													$this->escolha=$l->categoria_id;
												 } 
                                            	echo "</select></td></tr>";
												}
											
											}
                                            $ob= new categoria;
											$ob->cat();
											
                                            ?>
                                            
       
 
 
 

 <tr>
 <td>	Estado:				</td><td><select name="estado" id="estado" required/>	</select>			</td>
</tr>
<tr>
 <td>	Cidade:				</td><td><select name="cidade" id="cidade" required/></select>					</td>
</tr>
<tr>
<td>	Fone:				</td><td><input type="tel" name="fone" id="fone" placeholder="numero de contato" pattern="\(\d\d\)\d\d\d\d\-\d\d\d\d" title="(xx)xxxx-xxxx"  required/>					</td>
</tr>
<tr>
<td>	Email:				</td><td><input type="email" name="email" id="email" />				</td>
</tr>
<tr>
<td>	Site:				</td><td><input type="text" name="site" id="site"  />				</td>
</tr>
<tr>
<td colspan="2">	
		
        <fieldset class="seguranca">
        	<legend>Seguran&ccedil;a</legend>
            	Login:<input type="text" name="usuario" id="usuario"  required /><br/>	
                Senha:<input type="password" name="senha" id="senha" required /><br/>
             repita Senha:<input type="password" name="confsenha" id="confsenha" required />
         </fieldset>       			</td>
</tr>


<tr>

<td></td>				<td>	<input type="submit" name="cadastro" value="cadastrar"/>	</td>
</tr>
</form>
</table>
</fieldset>

<br/>
<a href="?pg=home">Voltar</a>
</body>
</html>
