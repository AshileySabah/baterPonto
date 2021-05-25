<?php
	session_start();
	session_destroy();

	if(!(isset($_SESSION)) || $_SESSION == null){
		header('Location: index.php');
	}
?>