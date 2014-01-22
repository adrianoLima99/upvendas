<?php
if(empty($_SESSION['usuario']) && empty($_SESSION['senha']) )
    					   {
							?>
   							<div id="menus">
                            
                                                            
                            <ul id="nav">
                                  <li><a href="?pg=home" >Pagina Inicial</a></li>
                                   <li><a href="?pg=Funciona" >Como funciona?</a></li>
                                   <li><a href="?pg=logar"  title="ir para painel de controle " >login</a></li>
                                <li><a href="#"  >cadastre-se</a>
                              
                               <ul >
                               <li> <a href="?pg=cadastrado" onClick="escondePesquisa()" >Empresa[+] </a></li>
                               <li>	<a href="?pg=profissional" onClick="escondePesquisa()">profissional[+] </a></li>
   					       	
                            </ul>
                            </li>
                           
                            </ul>
                           </div>
                            	
                			
   						<?php
     						}
	 						else{
	 					 ?>
                             <a href="?pg=produtos" class="plano" title="Meus Produtos">Meus Produtos</a> 
                            <a href="?pg=AlterarLogin" class="plano" title="Alterar Usuario e Senha">Trocar Senha</a>
     						<a href="?pg=sair" class="plano" title="sair do painel de controle ">sair</a>
   							
   							<?php }?>
   	  						<!--<a href="?pg=planos" class="plano" title="tenha mais visibilidade no site ">plano solucao</a>
                            -->
  						  <!--  </div>-->