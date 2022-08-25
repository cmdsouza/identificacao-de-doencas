<?php
	$servidor = "localhost";
	$usuario = "root";
	$senha = "usbw";
	$db_nome = "db_comparacao";
	
	$link = mysql_connect($servidor, $usuario, $senha);
	mysql_select_db($db_nome);
	
	mysql_set_charset('utf-8', $link);
?>