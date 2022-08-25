<?php

session_start();
include "conexao.php";

$login = $_POST['login'];
$senha = $_POST['senha'];

$tamanho = strlen($login);

switch($tamanho){
	case 14:
		$tipo = 'cpf';
		break;
		
	case 18:
		$tipo = 'cnpj';
		break;
		
	default:
		$tipo = 'errado';
}

if($tipo == 'cpf'){
	$sql = "SELECT * FROM tb_medico WHERE nr_cpfMedico = '".$login."' and nm_senha = '".$senha."'";
	$resultado = mysql_query($sql) or die();
	$num = mysql_num_rows($resultado);
			
	if($num > 0){
		while($linha = mysql_fetch_array($resultado)){
			$_SESSION['nome'] = $linha['nm_nomeMedico'];
			$_SESSION['cpf'] = $linha['nr_cpfMedico'];
			$_SESSION['tipo'] = 'Dentista';
			echo "
				<script>
					window.location = 'inicial.php';
				</script>
			";
		}
	}else{
		echo "CPF não cadastrado ou senha incorreta";
	}	
}else{
	if($tipo == 'cnpj'){
		$sql = "SELECT * FROM tb_empresa WHERE nr_cnpj = '".$login."' and nm_senha = '".$senha."'";
		$resultado = mysql_query($sql) or die();
		$num = mysql_num_rows($resultado);
				
		if($num > 0){
			while($linha = mysql_fetch_array($resultado)){
				$_SESSION['nome'] = $linha['nm_nomeEmpresa'];
				$_SESSION['cnpj'] = $linha['nr_cnpj'];
				$_SESSION['tipo'] = 'Empresa';
				echo "
				<script>
					window.location = 'inicial.php';
				</script>
			";
			}
		}else{
			echo "CNPJ não cadastrado ou senha incorreta";
		}	
	}else{
		echo "Dados fora do padrão";
	}
}
/*
$sql = "SELECT * FROM tb_aluno WHERE nr_cpfAluno = '".$cpf."' and nm_senha = '$password'";
$resultado = mysql_query($sql) or die();
$numEstudante = mysql_num_rows($resultado);
		
if($numEstudante > 0){
	while($linha = mysql_fetch_array($resultado)){
		$_SESSION['nome'] = $linha['nm_nomeAluno'];
	}
}
*/
?>