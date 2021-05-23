<?php
	session_start();
	print_r($_SESSION);

	if($_SESSION['login'] == false){
		header('Location: index.php');
	}
?>
pode bater o ponto
