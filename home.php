<?php
	session_start();
	//print_r($_SESSION);

	if($_SESSION['login'] == false){
		header('Location: index.php');
	}

	$tabela = 0;
	$contarRegistro = 0;

	$listaRegistros = [];
	$indiceListaRegistros = 0;
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
	    <div class="collapse navbar-collapse" id="navbarText">
	      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
	        <li class="formatInput" class="nav-item">
	          <a style="margin-left: 30px;" class="nav-link active" aria-current="page" href="relatorios.php">Relatórios</a>
	        </li>
	      </ul>
	      <span class="navbar-text">
	        <a style="text-decoration: none; color: black;" href="logout.php">Sair</a>
	      </span>
	    </div>
	  </div>
	</nav>
  	<!-- FIM: NAVEGACAO TOPO -->
  	<script>
  		function relogio(){
  			var horario = new Date();
  			var hora = horario.getHours();
  			var minuto = horario.getMinutes();
  			var segundo = horario.getSeconds();

  			var tempo = hora+":"+minuto+":"+segundo;

  			document.getElementById("mostrarRelogio").value = tempo;
  		}

  		var temporizar = setInterval(relogio, 50);
  	</script>
  	<div id="caixaRelogio" align="center" style="margin: 50px 0;">
  		<input style="text-align: center;" class="display-4" type="text" disabled id="mostrarRelogio">
  	</div>
  	<div class="container">
	  <div class="row">
	    <form method="post" class="col-sm" align="center">
	      <button style="width: 300px;" name="btnRegistro" type="submit" class="btn btn-primary mb-5">INICIAR</button>
	    </form>
	    <div class="col-sm" align="left">
	      <h5>Registros</h5>
	      <?php if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["btnRegistro"])){ 
	      	$horarioRegistro = date('H:i:s');
	      	$contarRegistro++;
	      	$nomeInput = "registro$contarRegistro";

	      	$listaRegistros[$indiceListaRegistros] = $horarioRegistro;
	      	$indiceListaRegistros++;
	      ?><!-- início SE POST E BOTÃO SETADO -->
	      	<?php if($tabela == 0){
	      		$tabela++;
	      	?><!-- CONDIÇÃO FORMAR TABELA -->
	      		<table class="table table-striped">
	      			<tbody>
						<tr>
							<td>Horário</td>
							<td>Descrição</td>
						</tr>
	      	<?php } ?><!-- CONDIÇÃO FORMAR TABELA -->
	      	<?php if($tabela > 0){ ?><!-- DEMAIS REGISTROS -->
	      		<?php foreach ($listaRegistros as $cadaRegistro){ ?>
	      			<tr>
						<td><?php echo $cadaRegistro ?></td>
						<td>Descrição</td>
					</tr>
	      		<?php } ?>
	      	<?php } ?><!-- DEMAIS REGISTROS -->
	      <?php } ?><!-- fim SE POST E BOTÃO SETADO -->
	    </div>
	  </div>
	</div>
	
	<!--
	<table border="1">
		<tbody>
			<tr>
				<td>Registro</td>
				<td>Descrição</td>
			</tr>
			<tr>
				<td><?php echo $horarioRegistro ?></td>
				<td><input type="text" disabled name="<?php echo $nomeInput ?>" value="Início"></td>
			</tr>-->
	
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </body>
</html>
