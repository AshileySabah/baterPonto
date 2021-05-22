<?php
	session_start();
	include 'configuracoes.php';
?>
<?php
	$cor = 'black';

	$erroEmailLogin = "";
	$erroSenhaLogin = "";
	$validarLogin = false;

	$validaEmail = false;
	$validaSenha = false;

	$erroValidarLogin = "";
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
			$validarLogin = true;	
		}
	}
?>
<?php
	if($validarLogin){
		$query = "SELECT email, senha FROM cadastro";
		$consulta = $conexao->query($query);
		$arrayRegistrosCadastros = $consulta->fetchAll();

		foreach($arrayRegistrosCadastros as $cadaLinhaRegistrosCadastros){
			$compararEmail = $cadaLinhaRegistrosCadastros['email'];
			$compararSenha = $cadaLinhaRegistrosCadastros['senha'];
			$validaEmail = false;
			$validaSenha = false;
			if($emailLogin == $compararEmail){
				//echo "o email existe no banco do site";
				$validaEmail = true;
				if($senhaLogin == $compararSenha){
					//echo "a senha bate";
					$validaSenha= true;
				}
				else{
					$cor = 'red';
					$erroValidarLogin = "Senha incorreta.";
					//echo "a senha não bate";
				}
				break;
			}
				//echo "o email não existe no banco do site";
				$cor = 'red';
				$erroValidarLogin = "O email digitado não tem cadastro neste site.";
			}
		}
		if($validaEmail && $validaSenha){
			echo "login feito";
			session_start();
			$_SESSION['login'] = true;
			header('Location: home.php');
		}
?>

<?php if(!isset($_SESSION['login'])){ ?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- Título -->
    <title>Login</title>
  </head>
  <body>
  	<!-- INÍCIO: NAVEGACAO TOPO -->
  	<nav class="navbar navbar-light bg-light">
	  <div class="container-fluid">
	    <a class="navbar-brand" href="index.php">
	      <img src="imagens/logo.png" width="40">
	      <span style="margin-left: 10px;">BATER SEU PONTO</span>
	    </a>
	  </div>
	</nav>
	<div id="barra-verificacao" style="height: 2px; background: <?php echo $cor ?>"></div>
	<!-- FIM: NAVEGACAO TOPO -->
	<!-- ALERT: ERRO NO LOGIN -->
	<div id="alerta-erro-login" class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
	  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
	  <div>
	    <?php echo $erroValidarLogin; ?>
	  </div>
	  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
	<!-- ALERT: ERRO NO LOGIN -->
	<!-- INÍCIO - JAVASCRIPT: VISIBILIDADE DO ALERT -->
	<script type="text/javascript">
		if(document.getElementById("barra-verificacao").style.background == "black"){
			document.getElementById("alerta-erro-login").style.visibility = "hidden";
		}
	</script>
	<!-- FIM - JAVASCRIPT: VISIBILIDADE DO ALERT -->
	<!-- INÍCIO: FORMULÁRIO LOGIN -->
	<div class="card text-dark bg-light mb-3 mt-5" style="max-width: 50rem; margin: 0 auto;">
	  <div class="card-header">Login</div>
	  <div class="card-body">
	    	<form method="post">
			  <div class="mb-3">
			    <label for="exampleInputEmail1" maxlength="100" class="form-label">E-mail</label>
			    <input name="emailLogin" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
			    <span style="color: red; display: block;"><?php echo $erroEmailLogin; ?></span>
			  </div>
			  <div class="mb-3">
			    <label for="exampleInputPassword1" class="form-label">Senha</label>
			    <input name="senhaLogin" maxlength="50" type="password" class="form-control" id="exampleInputPassword1">
			    <span style="color: red; display: block;"><?php echo $erroSenhaLogin; ?></span>
			  </div>
			  <button type="submit" class="btn btn-primary">Entrar</button>
			</form>
	  </div>
	</div>
	<!-- FIM: FORMULÁRIO LOGIN -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </body>
</html>
<?php } ?>

<?php 
	if(isset($_SESSION['login']) && $_SESSION['login'] == 1){ 
		header('Location: home.php');
	}
?>
