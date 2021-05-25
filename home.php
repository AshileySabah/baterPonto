<?php
	session_start();
	//print_r($_SESSION);

	if($_SESSION['login'] == false){
		header('Location: index.php');
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- CSS Customizado -->
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <!-- Título -->
    <title>Home</title>
  </head>
  <body>
  	<!-- INÍCIO: NAVEGACAO TOPO -->
  	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <div class="container">
	    <a class="navbar-brand" href="index.php">
	      <img src="imagens/logo.png" width="40">
	      <span style="margin-left: 10px;">BATER SEU PONTO</span>
	    </a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div id="navegacao" style="margin-left: 30px;" class="collapse navbar-collapse" id="navbarText">
	      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
	        <li class="nav-item">
	          <a class="nav-link active" aria-current="page" href="relatorios.php">Relatórios</a>
	        </li>
	      </ul>
	      <span class="navbar-text">
	        <a style="text-decoration: none; color: black;" href="logout.php">Sair</a>
	      </span>
	    </div>
	  </div>
	</nav>
  	<!-- FIM: NAVEGACAO TOPO -->
  	<div align="center" style="margin: 50px 0;" class="display-4">
  		00:00:00
  	</div>
  	<div class="container">
	  <div class="row">
	    <div class="col">
	      <button style="width: 300px;" type="button" class="btn btn-primary">INICIAR</button>
	    </div>
	    <div class="col">
	      Registros
	    </div>
	  </div>
	</div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </body>
</html>
