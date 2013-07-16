<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<?php require '../app/utils/session_utils.php';?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" href="../shared/css/style.css" type="text/css">
		<link rel="stylesheet" href="css/login.css" type="text/css">
		<script type="text/javascript" src="../shared/js/jquery-2.0.2.js"></script>
		<script type="text/javascript" src="../shared/js/jquery-ui-1.10.3.js"></script>
		<script type="text/javascript" src="../shared/js/jquery.maskedinput.js"></script>
		<script type="text/javascript" src="../shared/js/scripts.js"></script>
		<script type="text/javascript" src="../shared/js/jquery.price_format.1.8.min.js"></script>
		<link href="../shared/css/jquery-ui-1.10.3.custom.css" rel="stylesheet">
		<title>Savant - Login</title>
	</head>
	
<body>

	<div class="root">
		
		<?php require '../shared/header.php';?>
		
		<?php require '../shared/navigation_bar.php';?>
		
		<div class="content">
			
			<div class="login">
				<h1>Retornando a esta página?</h1>
				Acesse aqui, usando seu e-mail e a sua senha.
				<form action="account.do.php?action=login" method="post">

					<label for="email">Email: </label> <input type="text" name="email" id="email" value="" style="height:25px;" /><br /><br />
					<label for="senha">Senha: </label> <input type="password" name="senha" id="senha" value="" style="height:25px;" />
					
					<input class="button" type="submit" value="Entrar">

				</form>
			</div>
			
			<div class="register">
			<h1>É seu primeiro acesso?</h1>
				Para o acesso completo ao Savant você precisa se cadastrar como
				usuário do site. Siga os seguintes passos:
				<ul>
					<li>Preencha o Formulário de Cadastramento com os seus dados.</li>
				</ul>
				<form action="register.php">
					<input class="button" type="submit" value="Cadastro" />
				</form>
			</div>
			
		</div>
			<?php if (isset ($_GET["message"]))
			{
			?>
            <div class="ui-state-highlight">
            <?php
			echo ($_GET["message"]);
			}
			?>
            </div>
		<?php require '../shared/footer.php';?>
	</div>
</body>
</html>