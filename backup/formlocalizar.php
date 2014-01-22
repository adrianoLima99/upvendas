   
     <?php
	 include_once("conexao/conexao.php");
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
                O que voce procura pode esta bem perto!</h5>
	          </figcaption>
    </figure>
    
    </header>
<section>

	<form  action="?pg=localizando" method="post"  id="frm">
		 Procure:
        <select name="tipo" name="tipo" autofocus>
        								<option>categoria</option>
                                        <optgroup label="autonomo">
        								<option value="1">profissional </option>
                                        </optgroup>
                                        <optgroup label="estabelecimentos">
                                         <?php echo $ob->gera();?>
                                        </optgroup>
         </select>
        <input type="text" name="localizar" id="localizar" size="30"/> 
       <br/>
       <div id="filtro" style="display:none;">
          Estado<select name="estado" id="estado" value="" ></select>
          Cidade <select  name="cidade" id="cidade" value="" ></select>
         
          
         <br/>
         
         </div>
         <a href="#" onclick="filtrar()">filtrar</a>
               <input  type="submit" id="enviar" name="enviar" value="encontrar"/>
         
       
	</form>
</section>

</section>
