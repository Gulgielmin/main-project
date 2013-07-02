<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<?php require '../app/utils/session_utils.php';?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<link rel="stylesheet" href="../shared/css/style.css" type="text/css">
		<link rel="stylesheet" href="css/register.css" type="text/css">
		<title>Savant - Cadastro de usuário</title>
	</head>
	
<body>

	<div class="root">
		
		<?php require '../shared/header.php';?>
		
		<?php require '../shared/navigation_bar.php';?>
		
		<div class="content">
			
			<div class="register">
				<form action="account.do.php?action=new" method="post">
					<div class="labels">
						<label for="nome">Nome:</label> 
						<label for="email">Email:</label>
						<label for="senha">Senha:</label>
						<label for="confirmacao">Confirma&ccedil;&atilde;o:</label>

					</div>
					<div class="inputs">
						<input id="nome" name="nome" type="text">
						<input id="email" name="email" type="text">
						<input id="senha" name="senha" type="password">
						<input id="confirmacao" name="confirmacao" type="password">
						<input class="button" type="submit" value="Registrar" />
					</div>
				
				</form>

			</div>
		
		</div>
		<?php require '../shared/footer.php';?>
	</div>

</body>
</html>
