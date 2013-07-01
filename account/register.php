<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<link rel="stylesheet" href="../shared/css/style.css" type="text/css">
<link rel="stylesheet" href="css/register.css" type="text/css">
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
					<li><a href="">Administra&ccedil;&atilde;o</a></li>
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
			<div class="register">
				<form action="register.do.php?action=new" method="post">
					<div class="labels">
						<label for="nome">Nome:</label> <label for="usuario">Usu&aacute;rio:</label>
						<label for="email">Email:</label> <label for="senha">Senha:</label>
						<label for="confirmacao">Confirma&ccedil;&atilde;o:</label>

					</div>
					<div class="inputs">
						<input id="nome" name="nome" type="text"> <input id="usuario"
							name="usuario" type="text"> <input id="email" name="email"
							type="text"> <input id="senha" name="senha" type="password"> <input
							id="confirmacao" name="confirmacao" type="password"> <input
							type="submit" value="Registrar" />
					</div>
				
				</form>

			</div>
		</div>
		<div class="footer">Savant, 2013. Todos os direitos reservados.</div>
	</div>

</body>
</html>
