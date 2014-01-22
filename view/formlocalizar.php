   
     <?php
	 include_once("../model/conexao/conexao.php");
										 class gereCategoria{
										   private $conn;
										   
										     function __construct(){ $this->conn= new Connection();}
											 function  gera()
											 { 
											 	$sql=$this->conn->query("select * from categoria");
											    while($l = $sql->fetch(PDO::FETCH_ASSOC)){
												      echo "<option value=$l[categoria_id]>".$l['categoria_nome']."</option>";
													   										
												 }
											 }	 
										 }
										 $ob= new gereCategoria;
		 ?>
										 
<script type="text/javascript"   src="js/funcoes.js"></script>

<section>
	<header class="logomarca">
	<figure>
      <img src="imagens/logomarca.png" width="380" height="60px" />
              <figcaption>
                <p>O prestador de servi&ccedil;o ou profissional que voce procura  esta aqui!</p>
	          </figcaption>
    </figure>
    
    </header>
<section>

	<form  action="?pg=localizando" method="post"  id="frm">
		Preciso de:
  
        <input type="text" name="localizar" id="localizar" size="60" placeholder="mototaxi,pedreiro,mercadinho,farmarcia.." required/> 
       <br/>
       <div id="filtro" style="display:none;">
           Categoria<select name="tipo" id="tipo" >
           			<option>-----------</option><option>Empresa</option><option> Autonomo</option></select>
          Estado<select name="estado" id="estado" value="" ></select>
          Cidade <select  name="cidade" id="cidade" value="" ></select>
         
          
         <br/>
         
         </div>
         <a href="#" onclick="filtrar()">filtrar</a>
               <input  type="submit" id="enviar" name="enviar" value="encontrar"/>
         
       
	</form>
</section>

</section>
