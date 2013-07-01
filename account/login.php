<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<link rel="stylesheet" href="../shared/css/style.css" type="text/css">
<link rel="stylesheet" href="css/login.css" type="text/css">
<title>Savant</title>
</head>
<body>

	<div class="root">
		<div class="header">
			<div id="left">
				<img src="../shared/img/savant_logo_small.png" />
			</div>
			<div id="right"></div>
		</div>
		<div class="navbar">
			<div id="left">
				<ul>
					<li><a href="">Dashboard</a></li>
					<li><a href="">Projeto</a></li>
					<li><a href="">Administra��o</a></li>
				</ul>
			</div>

			<div id="right">

				<div id="left">
					<ul>
						<li><a href="">Entrar</a></li>
					</ul>
				</div>

			</div>
		</div>
		<div class="content">
			<div class="login">
				<h1>Retornando a esta p�gina?</h1>
				Acesse aqui, usando seu nome de usu�rio e a sua senha.
				<form action="account.do.php?action=login">

					<label for="email">Usuário: </label> <input type="text" name="email" id="email" value="" />
					<label for="senha">Senha:</label> <input type="password" name="senha" id="senha" value="" />
					
					<input class="button" type="submit" value="Entrar">

				</form>
			</div>
			<div class="register">
			<h1>� seu primeiro acesso?</h1>
				Para o acesso completo ao Savant voc� precisa se cadastrar como
				usu�rio do site. Siga os seguintes passos:
				<ul>
					<li>Preencha o Formul�rio de Cadastramento com os seus dados.</li>
					<li>Uma mensagem de confirma��o da inscri��o ser� enviada
						imediatamente ao seu endere�o de email.</li>
					<li>Visite o endere�o web indicado na mensagem para confirmar
						o seu cadastramento automaticamente e come�ar a navegar.</li>
					<li>Acesse o seu curso clicando o nome correspondente na lista
						de cursos dispon�veis.</li>
					<li>Quando voc� retornar ao site, para entrar no curso basta
						usar o seu nome de usu�rio e a sua senha nesta p�gina de acesso.</li>
				</ul>
				<button class="button">Cadastro</button>
			</div>
		</div>
		<div class="footer">Savant, 2013. Todos os direitos reservados.</div>
	</div>

</body>
</html>