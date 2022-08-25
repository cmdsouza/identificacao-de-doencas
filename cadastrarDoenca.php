<?php

include "conexao.php";
$imagem6 = $_FILES['imagem6'];
$nome = $_POST['nome'];

if (!empty($imagem6["name"])) {
		
		$error = array();
 
    	// Verifica se o arquivo é uma imagem
    	if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $imagem6["type"])){
     	   $error[1] = "Isso não é uma imagem.";
   	 	} 
 
		// Se não houver nenhum erro
		if (count($error) == 0) {
		
			// Pega extensão da imagem
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $imagem6["name"], $ext);
 
        	// Gera um nome único para a imagem
        	echo $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
 
        	// Caminho de onde ficará a imagem
        	$caminho_imagem = "doencas/" . $nome_imagem;
 
			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($imagem6["tmp_name"], $caminho_imagem);
		
			// Insere os dados no banco
			$sql4 = "INSERT INTO tb_doenca(nr_idDoenca, nm_nomeDoenca, nm_imagemDoenca) VALUES (NULL, '".$nome."', '".$nome_imagem."')";
			$resultado4 = mysql_query($sql4) or die();
		
		}
	
}

echo "
	<script>
		window.location = 'novaDoenca.php';
	</script>
";

?>