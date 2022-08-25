<?php

session_start();
date_default_timezone_set('america/sao_paulo');
include "conexao.php";

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

// CADASTRO DO MEDICO ##################


$sqlEnd = "SELECT * FROM tb_endereco WHERE  nm_rua = '".$rua."' AND nr_cep = '".$cep."' AND nm_complemento = '".$complemento."' AND nm_estado = '".$estado."' AND nm_cidade = '".$cidade."'  AND nm_bairro = '".$bairro."'";
$resultadoEnd = mysql_query($sqlEnd) or die();
while($linhaEnd = mysql_fetch_array($resultadoEnd)){
	$idEnd = $linhaEnd['nr_idEndereco'];
}

$cpf = $_POST['cpf'];
$nome = $_POST['nome'];
$senha = $_POST['senha'];
$cro = $_POST['cro'];

$sql2 = "INSERT INTO tb_medico(nr_cpfMedico, nm_senha, nm_nomeMedico, nr_cro, nr_idEndereco) VALUES ('".$cpf."', '".$senha."', '".$nome."', '".$cro."', ".$idEnd.")";
$resultado2 = mysql_query($sql2) or die();

// FIM CADASTRO DO MEDICO ##################

echo "
	<script>
		window.location = 'novoMedico.php';
	</script>
";

?>