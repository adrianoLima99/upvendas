<?php
		
		
	
		
		$arquivo			   = isset($_FILES["arquivo"]) ? $_FILES["arquivo"] : FALSE;
		
		$config 				= 	array();
		$config["tamanho"] 		= 	1068883;
		$config["largura"] 		= 	2000;
		$config["altura"] 		= 	2000;
		$config["diretorio"]	=	"../view/Usuario/".$_SESSION['idUs']."/Imagem/";
		
function nome($extensao)
{
	global $config;
	
	$temp  =  substr(md5(uniqid(time())),0,10);
	$imagem_nome = $temp . "." . $extensao;
	
	if (file_exists($config["diretorio"].$imagem_nome))
	{
		$imagem_nome = nome($extensao);
		
	}
	return $imagem_nome;
}		
	
	if($arquivo)
	{
	
			$erro = array();
			
			if (!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $arquivo["type"]))
			{
				echo 	$erro[0] = "arquivo em formato inválido! a imagem deve ser jpg, jpeg, bmp, gif ou png";
			}
			else
			{
					if($arquivo["size"] > $config["tamanho"])
						{
						echo 	$erro[1] = "Arquivo maior do que o permitido!, a imagem deve ser no maximo " .$config["tamanho"] . "bytes" ;
					
						}
					$dimensao = getimagesize($arquivo["tmp_name"]);
					if($dimensao[0] > $config["largura"])
					{
					echo 	$erro[2] = "largura maior que a permitida, a largura deve ser no maximo " . $config["largura"] . "pixels";
					}
					
					if($dimensao[1] > $config["altura"])
					{
					echo 	$erro[3] = "Altura eh maior que a permitida, a altura deve ser no maximo ". $config["altura"] . "pixels";
					}	
			}
			
				if(!sizeof($erro))
				{
						preg_match("/\.(gif|bmp|png|jpg|jpeg)(1)$/i",$arquivo["name"],$ext);
						
						$imagem_nome 	= 	nome($ext[1]);
 						$imagem_dir 	= 	$config["diretorio"] . $imagem_nome;
						move_uploaded_file($arquivo["tmp_name"],$imagem_dir);
						echo "feito com sucesso";
				}
	}	 

?>
