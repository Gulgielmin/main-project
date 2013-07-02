<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<?php require '../app/utils/session_utils.php';?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" href="../shared/css/style.css" type="text/css">
		<link rel="stylesheet" href="css/login.css" type="text/css">
		<title>Savant - Login</title>
	</head>
	
<body>

	<div class="root">
		
		<?php require '../shared/header.php';?>
		
		<?php require '../shared/navigation_bar.php';?>
		
		<div class="content">
			
			<div class="login">
				<h1>Retornando a esta página?</h1>
				Acesse aqui, usando seu nome de usuário e a sua senha.
				<form action="account.do.php?action=login" method="post">

					<label for="email">Usuário: </label> <input type="text" name="email" id="email" value="" />
					<label for="senha">Senha:</label> <input type="password" name="senha" id="senha" value="" />
					
					<input class="button" type="submit" value="Entrar">

				</form>
			</div>
			
			<div class="register">
			<h1>É seu primeiro acesso?</h1>
				Para o acesso completo ao Savant você precisa se cadastrar como
				usuário do site. Siga os seguintes passos:
				<ul>
					<li>Preencha o Formulário de Cadastramento com os seus dados.</li>
					<li>Uma mensagem de confirmação da inscrição será enviada
						imediatamente ao seu endereço de email.</li>
					<li>Visite o endereço web indicado na mensagem para confirmar
						o seu cadastramento automaticamente e começar a navegar.</li>
					<li>Acesse o seu curso clicando o nome correspondente na lista
						de cursos disponíveis.</li>
					<li>Quando você retornar ao site, para entrar no curso basta
						usar o seu nome de usuário e a sua senha nesta página de acesso.</li>
				</ul>
				<form action="register.php">
					<input class="button" type="submit" value="Cadastro" />
				</form>
			</div>
		</div>
		<?php require '../shared/footer.php';?>
	</div>

</body>
</html>