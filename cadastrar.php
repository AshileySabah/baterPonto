<?php
	include 'configuracoes.php';
	$tipoConta = '- empresa';
	$marcarTipoConta = 'checked';
?>
<?php
	if(isset($_GET['tipo_conta']) && $_GET['tipo_conta'] == 'funcionario'){
		$marcarTipoConta = '';
		$tipoConta = '- funcionário';
	}
?>
<?php
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if($_POST['emailLogin'] == null || strlen($_POST['emailLogin'])<3){
			$erroEmailLogin = "*Endereço de email inválido.";
		}
		if($_POST['senhaLogin'] == null || strlen($_POST['senhaLogin'])<9){
			//4 números, 2 letras minúsculas, 2 letras maiúsculas, 1 caracter especial
			if($_POST['senhaLogin'] == null){
				$erroSenhaLogin = "*Senha inválida.";
			}
			else{
				$erroSenhaLogin = "*A senha deve conter pelo menos 9 caracteres.";
			}
		}
		else{
			$emailLogin = $_POST['emailLogin'];
			$senhaLogin = $_POST['senhaLogin'];
			
			//se email não estiver no banco de dados, valida cadastro
				//senão: alert - Esse email já possui cadastro	
		}
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
    <title>Cadastre-se</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
  </head>
  <body>
  	<!-- INÍCIO: NAVEGACAO TOPO -->
  	<nav class="navbar navbar-light bg-light">
	  <div class="container">
	    <a class="navbar-brand" href="index.php">
	      <img src="imagens/logo.png" width="40">
	      <span style="margin-left: 10px;">BATER SEU PONTO</span>
	      <span id="caixaTipoConta">
		    <input style="font-family: 'Dancing Script', cursive; font-size: 30px;" disabled type="text" id="cadastrarConta">
	      </span>
	    </a>
	  </div>
	</nav>
	<!-- FIM: NAVEGACAO TOPO -->
	<!-- INÍCIO: FORMULÁRIO CADASTRO -->
	<div class="card text-dark bg-light mb-3 mt-5" style="max-width: 50rem; margin: 0 auto;">
	  <div class="card-header">Cadastre-se</div>
	  <div class="card-body">
    	<form method="post">
    		<div>
    			<span style="float: right; display: inline-block;">
    				<input type="radio" id="funcionario" name="tipo_conta" value="funcionario"><label>Funcionário</label>
    			</span>
		  		<span style="float: right; display: inline-block; margin-right: 20px;">
		  			<input type="radio" id="empresa" name="tipo_conta" value="empresa" <?php echo $marcarTipoConta;?> ><label>Empresa</label>
		  		</span>
    		</div>
			<div style="clear: both;"></div>
			<div class="mb-3">
			    <label for="exampleInputEmail1" maxlength="100" class="form-label">E-mail</label>
			    <input name="emailLogin" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
			</div>
			<div class="mb-3">
			    <label for="exampleInputPassword1" class="form-label">Senha</label>
			    <input name="senhaLogin" maxlength="50" type="password" class="form-control" id="exampleInputPassword1">
			</div>
			  	<button type="submit" class="btn btn-primary">Entrar</button>
			</form>
	  </div>
	</div>
	<script>
		function tipoDaConta(){
			if(document.getElementById("funcionario").checked == true){
				document.getElementById("cadastrarConta").value = " - funcionario";
			}
			else if(document.getElementById("empresa").checked == true){
				document.getElementById("cadastrarConta").value = " - empresa";
			}
			else{
				document.getElementById("cadastrarConta").value = "";
			}
		}
		var pegarStatus = setInterval(tipoDaConta, 500);
	</script>
	<!-- FIM: FORMULÁRIO LOGIN -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </body>
</html>