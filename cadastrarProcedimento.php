<?php

session_start();
date_default_timezone_set('america/sao_paulo');
include "conexao.php";
include "funcoes.php";

// CADASTRO DO ENDEREÇO ##################

$cep = $_POST['cep'];
$rua = $_POST['rua'];
$complemento = $_POST['complemento'];
$estado = $_POST['estado'];
$cidade = $_POST['cidade'];
$bairro = $_POST['bairro'];

$sql1 = "INSERT INTO tb_endereco(nr_idEndereco, nm_rua, nr_cep, nm_complemento, nm_estado, nm_cidade, nm_bairro) VALUES (NULL, '".$rua."', '".$cep."', '".$complemento."', '".$estado."', '".$cidade."','".$bairro."')";
$resultado1 = mysql_query($sql1) or die();

// FIM CADASTRO DO ENDEREÇO ##################

// CADASTRO DO PACIENTE ##################


$sqlEnd = "SELECT * FROM tb_endereco WHERE  nm_rua = '".$rua."' AND nr_cep = '".$cep."' AND nm_complemento = '".$complemento."' AND nm_estado = '".$estado."' AND nm_cidade = '".$cidade."'  AND nm_bairro = '".$bairro."'";
$resultadoEnd = mysql_query($sqlEnd) or die();
while($linhaEnd = mysql_fetch_array($resultadoEnd)){
	$idEnd = $linhaEnd['nr_idEndereco'];
}

$nome = $_POST['nome'] ;
$cpf = $_POST['cpf'] ;
$sexo = $_POST['sexo'] ;
$nascimento = $_POST['nascimento'] ;
$nascimento = explode("-", $_POST['nascimento']);
$datanascimento = $nascimento[2] . "/" . $nascimento[1] . "/" . $nascimento[0];
$rg = $_POST['rg'] ;

$sql2 = "INSERT INTO tb_paciente(nr_cpf, nm_nome, dt_nascimento, nr_rg, nm_genero, nr_idEndereco) VALUES ('".$cpf."', '".$nome."', '".$datanascimento."', '".$rg."', '".$sexo."', ".$idEnd.")";
$resultado2 = mysql_query($sql2) or die();

// FIM CADASTRO DO PACIENTE ##################

// CADASTRO DO PROCEDIMENTO ##################

$sqlPacient = "SELECT * FROM tb_paciente WHERE nm_nome = '".$nome."' AND dt_nascimento = '".$datanascimento."' AND nr_rg = '".$rg."' AND nm_genero = '".$sexo."' AND nr_idEndereco =".$idEnd;
$resultadoPacient = mysql_query($sqlPacient) or die();
while($linhaPacient = mysql_fetch_array($resultadoPacient)){
	$cpfPaciente = $linhaPacient['nr_cpf'];
}

$procedimento = $_POST['procedimento'] ;
$observacoes = $_POST['observacoes'] ;
$solicitacao = explode("-", $_POST['solicitacao']);
$dataSolicitacao = $solicitacao[2] . "/" . $solicitacao[1] . "/" . $solicitacao[0];
$medico = $_POST['medico'] ;

$sql3 = "INSERT INTO tb_procedimento(nr_idProcedimento, nm_nomeProcedimento, nm_observacoes, dt_solicitacao, nr_cpfMedico, nr_cpfPaciente) VALUES (NULL, '".$procedimento."', '".$observacoes."', '".$dataSolicitacao."', '".$medico."', '".$cpfPaciente."')";
$resultado3 = mysql_query($sql3) or die();
								
// FIM CADASTRO DO PROCEDIMENTO ##################

// CADASTRO DA IMAGEM ##################

//$imagem = $_POST[''];

$sqlProc = "SELECT * FROM tb_procedimento WHERE  nm_nomeProcedimento = '".$procedimento."' AND nm_observacoes = '".$observacoes."' AND dt_solicitacao = '".$dataSolicitacao."' AND nr_cpfMedico = '".$medico."'";
$resultadoProc = mysql_query($sqlProc) or die();
while($linhaProc = mysql_fetch_array($resultadoProc)){
	$idProc = $linhaProc['nr_idProcedimento'];
}

$quem = $_POST['quemCadastrou'];

$imagem1 = $_FILES['imagem1'];
$tipo1 = $_POST['tipo1'];

if($tipo1 == 'prontuario'){
	$msg = false;
 
    // arquivo
	$arquivo = $imagem1;
 
    // Tamanho máximo do arquivo (em Bytes)
    $tamanhoPermitido = 1024 * 1024 * 2; // 2Mb
 
    //Define o diretorio para onde enviaremos o arquivo
    $diretorio = "arquivos/";
 
    // verifica se arquivo foi enviado e sem erros
    if( $arquivo['error'] == UPLOAD_ERR_OK ){
 
        // pego a extensão do arquivo
        $extensao = extensao($arquivo['name']);
 
        // valida a extensão
        if( in_array( $extensao, array("pdf") ) ){
 
            // verifica tamanho do arquivo
            if ( $arquivo['size'] > $tamanhoPermitido ){
 
                $msg = "<strong>Aviso!</strong> O arquivo enviado é muito grande, envie arquivos de até ".$tamanhoPermitido/MB." MB.";
                $class = "alert-warning";
 
            }else{
 
                // atribui novo nome ao arquivo
                $novo_nome  = md5(time()).".".$extensao;
 
                // faz o upload
                $enviou = move_uploaded_file($_FILES['imagem1']['tmp_name'], $diretorio.$novo_nome);
             
				// Insere os dados no banco
				$hoje = date('d/m/Y');
				$sql4 = "INSERT INTO tb_arquivos(nr_idArquivos, nm_arquivo, nr_cpfPaciente, nr_procedimento, dt_dataCadastro, nm_tipo, nm_quemCadastrou) VALUES (NULL, '".$novo_nome."','".$cpf."', ".$idProc.", '".$hoje."', 'prontuario', '".$quem."')";
				$resultado4 = mysql_query($sql4) or die();
            }
        } 
    }
	
}else{
	// Se a foto estiver sido selecionada
	if (!empty($imagem1["name"])) {
		
		$error = array();
 
    	// Verifica se o arquivo é uma imagem
    	if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $imagem1["type"])){
     	   $error[1] = "Isso não é uma imagem.";
   	 	} 
 
		// Se não houver nenhum erro
		if (count($error) == 0) {
		
			// Pega extensão da imagem
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $imagem1["name"], $ext);
 
        	// Gera um nome único para a imagem
        	echo $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
 
        	// Caminho de onde ficará a imagem
        	$caminho_imagem = "radiografias/" . $nome_imagem;
 
			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($imagem1["tmp_name"], $caminho_imagem);
		
			// Insere os dados no banco
			$hoje = date('d/m/Y');
			$sql4 = "INSERT INTO tb_imagem(nr_idImagem, nm_imagem, nr_cpfPaciente, nr_procedimento, dt_dataCadastro, nm_quemCadastrou) VALUES (NULL, '".$nome_imagem."','".$cpf."', ".$idProc.", '".$hoje."', '".$quem."')";
			$resultado4 = mysql_query($sql4) or die();
		
		}
	
	}
}

$imagem2 = $_FILES['imagem2'];
$tipo2 = $_POST['tipo2'];
if($tipo2 == 'prontuario'){
 
	$msg = false;
 
    // arquivo
	$arquivo = $imagem2;
 
    // Tamanho máximo do arquivo (em Bytes)
    $tamanhoPermitido = 1024 * 1024 * 2; // 2Mb
 
    //Define o diretorio para onde enviaremos o arquivo
    $diretorio = "arquivos/";
 
    // verifica se arquivo foi enviado e sem erros
    if( $arquivo['error'] == UPLOAD_ERR_OK ){
 
        // pego a extensão do arquivo
        $extensao = extensao($arquivo['name']);
 
        // valida a extensão
        if( in_array( $extensao, array("pdf") ) ){
 
            // verifica tamanho do arquivo
            if ( $arquivo['size'] > $tamanhoPermitido ){
 
                $msg = "<strong>Aviso!</strong> O arquivo enviado é muito grande, envie arquivos de até ".$tamanhoPermitido/MB." MB.";
                $class = "alert-warning";
 
            }else{
 
                // atribui novo nome ao arquivo
                $novo_nome  = md5(time()).".".$extensao;
 
                // faz o upload
                $enviou = move_uploaded_file($_FILES['imagem2']['tmp_name'], $diretorio.$novo_nome);
             
				// Insere os dados no banco
				$hoje = date('d/m/Y');
				$sql4 = "INSERT INTO tb_arquivos(nr_idArquivos, nm_arquivo, nr_cpfPaciente, nr_procedimento, dt_dataCadastro, nm_tipo, nm_quemCadastrou) VALUES (NULL, '".$novo_nome."','".$cpf."', ".$idProc.", '".$hoje."', 'prontuario', '".$quem."')";
				$resultado4 = mysql_query($sql4) or die();
            }
        } 
    }
	
}else{
	// Se a foto estiver sido selecionada
	if (!empty($imagem2["name"])) {
		
		$error = array();
 
    	// Verifica se o arquivo é uma imagem
    	if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $imagem2["type"])){
     	   $error[1] = "Isso não é uma imagem.";
   	 	} 
 
		// Se não houver nenhum erro
		if (count($error) == 0) {
		
			// Pega extensão da imagem
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $imagem2["name"], $ext);
 
        	// Gera um nome único para a imagem
        	echo $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
 
        	// Caminho de onde ficará a imagem
        	$caminho_imagem = "radiografias/" . $nome_imagem;
 
			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($imagem2["tmp_name"], $caminho_imagem);
		
			// Insere os dados no banco
			$hoje = date('d/m/Y');
			$sql4 = "INSERT INTO tb_imagem(nr_idImagem, nm_imagem, nr_cpfPaciente, nr_procedimento, dt_dataCadastro, nm_quemCadastrou) VALUES (NULL, '".$nome_imagem."','".$cpf."', ".$idProc.", '".$hoje."', '".$quem."')";
			$resultado4 = mysql_query($sql4) or die();
		
		}
	
	}
}

$imagem3 = $_FILES['imagem3'];
$tipo3 = $_POST['tipo3'];
if($tipo3 == 'prontuario'){
 
	$msg = false;
 
    // arquivo
	$arquivo = $imagem3;
 
    // Tamanho máximo do arquivo (em Bytes)
    $tamanhoPermitido = 1024 * 1024 * 2; // 2Mb
 
    //Define o diretorio para onde enviaremos o arquivo
    $diretorio = "arquivos/";
 
    // verifica se arquivo foi enviado e sem erros
    if( $arquivo['error'] == UPLOAD_ERR_OK ){
 
        // pego a extensão do arquivo
        $extensao = extensao($arquivo['name']);
 
        // valida a extensão
        if( in_array( $extensao, array("pdf") ) ){
 
            // verifica tamanho do arquivo
            if ( $arquivo['size'] > $tamanhoPermitido ){
 
                $msg = "<strong>Aviso!</strong> O arquivo enviado é muito grande, envie arquivos de até ".$tamanhoPermitido/MB." MB.";
                $class = "alert-warning";
 
            }else{
 
                // atribui novo nome ao arquivo
                $novo_nome  = md5(time()).".".$extensao;
 
                // faz o upload
                $enviou = move_uploaded_file($_FILES['imagem3']['tmp_name'], $diretorio.$novo_nome);
             
				// Insere os dados no banco
				$hoje = date('d/m/Y');
				$sql4 = "INSERT INTO tb_arquivos(nr_idArquivos, nm_arquivo, nr_cpfPaciente, nr_procedimento, dt_dataCadastro, nm_tipo, nm_quemCadastrou) VALUES (NULL, '".$novo_nome."','".$cpf."', ".$idProc.", '".$hoje."', 'prontuario', '".$quem."')";
				$resultado4 = mysql_query($sql4) or die();
            }
        } 
    }
	
}else{
	// Se a foto estiver sido selecionada
	if (!empty($imagem3["name"])) {
		
		$error = array();
 
    	// Verifica se o arquivo é uma imagem
    	if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $imagem3["type"])){
     	   $error[1] = "Isso não é uma imagem.";
   	 	} 
 
		// Se não houver nenhum erro
		if (count($error) == 0) {
		
			// Pega extensão da imagem
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $imagem3["name"], $ext);
 
        	// Gera um nome único para a imagem
        	echo $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
 
        	// Caminho de onde ficará a imagem
        	$caminho_imagem = "radiografias/" . $nome_imagem;
 
			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($imagem3["tmp_name"], $caminho_imagem);
		
			// Insere os dados no banco
			$hoje = date('d/m/Y');
			$sql4 = "INSERT INTO tb_imagem(nr_idImagem, nm_imagem, nr_cpfPaciente, nr_procedimento, dt_dataCadastro, nm_quemCadastrou) VALUES (NULL, '".$nome_imagem."','".$cpf."', ".$idProc.", '".$hoje."', '".$quem."')";
			$resultado4 = mysql_query($sql4) or die();
		
		}
	
	}
}

$imagem4 = $_FILES['imagem4'];
$tipo4 = $_POST['tipo4'];
if($tipo4 == 'prontuario'){
 
	$msg = false;
 
    // arquivo
	$arquivo = $imagem4;
 
    // Tamanho máximo do arquivo (em Bytes)
    $tamanhoPermitido = 1024 * 1024 * 2; // 2Mb
 
    //Define o diretorio para onde enviaremos o arquivo
    $diretorio = "arquivos/";
 
    // verifica se arquivo foi enviado e sem erros
    if( $arquivo['error'] == UPLOAD_ERR_OK ){
 
        // pego a extensão do arquivo
        $extensao = extensao($arquivo['name']);
 
        // valida a extensão
        if( in_array( $extensao, array("pdf") ) ){
 
            // verifica tamanho do arquivo
            if ( $arquivo['size'] > $tamanhoPermitido ){
 
                $msg = "<strong>Aviso!</strong> O arquivo enviado é muito grande, envie arquivos de até ".$tamanhoPermitido/MB." MB.";
                $class = "alert-warning";
 
            }else{
 
                // atribui novo nome ao arquivo
                $novo_nome  = md5(time()).".".$extensao;
 
                // faz o upload
                $enviou = move_uploaded_file($_FILES['imagem4']['tmp_name'], $diretorio.$novo_nome);
             
				// Insere os dados no banco
				$hoje = date('d/m/Y');
				$sql4 = "INSERT INTO tb_arquivos(nr_idArquivos, nm_arquivo, nr_cpfPaciente, nr_procedimento, dt_dataCadastro, nm_tipo, nm_quemCadastrou) VALUES (NULL, '".$novo_nome."','".$cpf."', ".$idProc.", '".$hoje."', 'prontuario', '".$quem."')";
				$resultado4 = mysql_query($sql4) or die();
            }
        } 
    }
	
}else{
	// Se a foto estiver sido selecionada
	if (!empty($imagem4["name"])) {
		
		$error = array();
 
    	// Verifica se o arquivo é uma imagem
    	if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $imagem4["type"])){
     	   $error[1] = "Isso não é uma imagem.";
   	 	} 
 
		// Se não houver nenhum erro
		if (count($error) == 0) {
		
			// Pega extensão da imagem
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $imagem4["name"], $ext);
 
        	// Gera um nome único para a imagem
        	echo $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
 
        	// Caminho de onde ficará a imagem
        	$caminho_imagem = "radiografias/" . $nome_imagem;
 
			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($imagem4["tmp_name"], $caminho_imagem);
		
			// Insere os dados no banco
			$hoje = date('d/m/Y');
			$sql4 = "INSERT INTO tb_imagem(nr_idImagem, nm_imagem, nr_cpfPaciente, nr_procedimento, dt_dataCadastro, nm_quemCadastrou) VALUES (NULL, '".$nome_imagem."','".$cpf."', ".$idProc.", '".$hoje."', '".$quem."')";
			$resultado4 = mysql_query($sql4) or die();
		
		}
	
	}
}

$imagem5 = $_FILES['imagem5'];
$tipo5 = $_POST['tipo5'];
if($tipo5 == 'prontuario'){
	
	
 
	$msg = false;
 
    // arquivo
	$arquivo = $imagem5;
 
    // Tamanho máximo do arquivo (em Bytes)
    $tamanhoPermitido = 1024 * 1024 * 2; // 2Mb
 
    //Define o diretorio para onde enviaremos o arquivo
    $diretorio = "arquivos/";
 
    // verifica se arquivo foi enviado e sem erros
    if( $arquivo['error'] == UPLOAD_ERR_OK ){
 
        // pego a extensão do arquivo
        $extensao = extensao($arquivo['name']);
 
        // valida a extensão
        if( in_array( $extensao, array("pdf") ) ){
 
            // verifica tamanho do arquivo
            if ( $arquivo['size'] > $tamanhoPermitido ){
 
                $msg = "<strong>Aviso!</strong> O arquivo enviado é muito grande, envie arquivos de até ".$tamanhoPermitido/MB." MB.";
                $class = "alert-warning";
 
            }else{
 
                // atribui novo nome ao arquivo
                $novo_nome  = md5(time()).".".$extensao;
 
                // faz o upload
                $enviou = move_uploaded_file($_FILES['imagem5']['tmp_name'], $diretorio.$novo_nome);
             
				// Insere os dados no banco
				$hoje = date('d/m/Y');
				$sql4 = "INSERT INTO tb_arquivos(nr_idArquivos, nm_arquivo, nr_cpfPaciente, nr_procedimento, dt_dataCadastro, nm_tipo, nm_quemCadastrou) VALUES (NULL, '".$novo_nome."','".$cpf."', ".$idProc.", '".$hoje."', 'prontuario', '".$quem."')";
				$resultado4 = mysql_query($sql4) or die();
            }
        } 
    }
	
}else{
	// Se a foto estiver sido selecionada
	if (!empty($imagem5["name"])) {
		
		$error = array();
 
    	// Verifica se o arquivo é uma imagem
    	if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $imagem5["type"])){
     	   $error[1] = "Isso não é uma imagem.";
   	 	} 
 
		// Se não houver nenhum erro
		if (count($error) == 0) {
		
			// Pega extensão da imagem
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $imagem5["name"], $ext);
 
        	// Gera um nome único para a imagem
        	echo $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
 
        	// Caminho de onde ficará a imagem
        	$caminho_imagem = "radiografias/" . $nome_imagem;
 
			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($imagem5["tmp_name"], $caminho_imagem);
		
			// Insere os dados no banco
			$hoje = date('d/m/Y');
			$sql4 = "INSERT INTO tb_imagem(nr_idImagem, nm_imagem, nr_cpfPaciente, nr_procedimento, dt_dataCadastro, nm_quemCadastrou) VALUES (NULL, '".$nome_imagem."','".$cpf."', ".$idProc.", '".$hoje."', '".$quem."')";
			$resultado4 = mysql_query($sql4) or die();
		
		}
	
	}
}

$imagem6 = $_FILES['imagem6'];
$tipo6 = $_POST['tipo6'];
if($tipo1 == 'prontuario'){
	$msg = false;
 
    // arquivo
	$arquivo = $imagem6;
 
    // Tamanho máximo do arquivo (em Bytes)
    $tamanhoPermitido = 1024 * 1024 * 2; // 2Mb
 
    //Define o diretorio para onde enviaremos o arquivo
    $diretorio = "arquivos/";
 
    // verifica se arquivo foi enviado e sem erros
    if( $arquivo['error'] == UPLOAD_ERR_OK ){
 
        // pego a extensão do arquivo
        $extensao = extensao($arquivo['name']);
 
        // valida a extensão
        if( in_array( $extensao, array("pdf") ) ){
 
            // verifica tamanho do arquivo
            if ( $arquivo['size'] > $tamanhoPermitido ){
 
                $msg = "<strong>Aviso!</strong> O arquivo enviado é muito grande, envie arquivos de até ".$tamanhoPermitido/MB." MB.";
                $class = "alert-warning";
 
            }else{
 
                // atribui novo nome ao arquivo
                $novo_nome  = md5(time()).".".$extensao;
 
                // faz o upload
                $enviou = move_uploaded_file($_FILES['imagem6']['tmp_name'], $diretorio.$novo_nome);
             
				// Insere os dados no banco
				$hoje = date('d/m/Y');
				$sql4 = "INSERT INTO tb_arquivos(nr_idArquivos, nm_arquivo, nr_cpfPaciente, nr_procedimento, dt_dataCadastro, nm_tipo, nm_quemCadastrou) VALUES (NULL, '".$novo_nome."','".$cpf."', ".$idProc.", '".$hoje."', 'prontuario', '".$quem."')";
				$resultado4 = mysql_query($sql4) or die();
            }
        } 
    }
	
}else{
	// Se a foto estiver sido selecionada
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
        	$caminho_imagem = "radiografias/" . $nome_imagem;
 
			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($imagem6["tmp_name"], $caminho_imagem);
		
			// Insere os dados no banco
			$hoje = date('d/m/Y');
			$sql4 = "INSERT INTO tb_imagem(nr_idImagem, nm_imagem, nr_cpfPaciente, nr_procedimento, dt_dataCadastro, nm_quemCadastrou) VALUES (NULL, '".$nome_imagem."','".$cpf."', ".$idProc.", '".$hoje."', '".$quem."')";
			$resultado4 = mysql_query($sql4) or die();
		
		}
	
	}
}


// fim CADASTRO DA IMAGEM ##################

echo "
	<script>
		window.location = 'novoProcedimento.php';
	</script>
";
?>