<?php
	$dns = "mysql:host=localhost;dbname=clientes";
	$usuario = "teste";
	$senha = "1234";

	try{
		$conexao = new PDO($dns, $usuario, $senha);
	}catch(PDOException $e){
		echo "Erro na conexão com o banco de dados.<br>";
		print_r($e->getCode()."<br>");
		print_r($e->getMessage()."<br>");
	}
?>