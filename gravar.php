<?php

session_start();
include "conexao.php"; 
$foto = $_FILES["imagem"];
require 'image.compare.class.php';

/*
0 = imagens iguais

	these two images are almost the same so the hammered distance will be less than 10
	try it with images like this:
		1. the example images
		2. two complatly different image
		3. the same image (returned number should be 0)
		4. the same image but with different size, even different aspect ratio (returned number should be 0)
	you will see how the returned number will represent the similarity of the images.
*/ 

$class = new compareImages;


// Se a foto estiver sido selecionada
	if (!empty($foto["name"])) {
		
		$error = array();
 
    	// Verifica se o arquivo é uma imagem
    	if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
     	   $error[1] = "Isso não é uma imagem.";
   	 	} 
 
		// Se não houver nenhum erro
		if (count($error) == 0) {
		
			// Pega extensão da imagem
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
 
        	// Gera um nome único para a imagem
        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
 
        	// Caminho de onde ficará a imagem
        	$caminho_imagem = "radiografias/" . $nome_imagem;
 
			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($foto["tmp_name"], $caminho_imagem);
				
		}
	
	}

$_SESSION['imagemPesquisada'] = $nome_imagem;

$sqlEnd = "SELECT * FROM tb_imagem";
$resultadoEnd = mysql_query($sqlEnd) or die();
while($linhaEnd = mysql_fetch_array($resultadoEnd)){
	$img = $linhaEnd['nr_idImagem'];
	$nomeImg = $linhaEnd['nm_imagem'];
	$teste1 = $class->compare('radiografias/'.$nomeImg,'radiografias/'.$_SESSION['imagemPesquisada']);
	$porc1 = 100-(3.12*$teste1);
	
	if($porc1 < 0){
		$porc1 = 0;
	}else{
	}
				
	$sql1 = "INSERT INTO tb_comparacoes(nr_idComparacao, nr_imagem1, nr_imagem2, nr_porcentagem) VALUES (NULL, '".$_SESSION['imagemPesquisada']."', '".$img."', '".$porc1."')";
	$resultado1 = mysql_query($sql1) or die();
}



echo "
	<script>
		window.location = 'comparar.php';
	</script>
";

?>