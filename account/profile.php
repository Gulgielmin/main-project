<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<?php

require_once '../app/utils/session_utils.php';
redirect_if_no_user('../account/login.php');
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="../shared/css/style.css" type="text/css">
<link rel="stylesheet" href="css/profile.css" type="text/css">
<script type="text/javascript" src="../shared/js/jquery-2.0.2.js"></script>
<script type="text/javascript" src="../shared/js/jquery-ui-1.10.3.js"></script>
<script type="text/javascript" src="../shared/js/jquery.maskedinput.js"></script>
<script type="text/javascript" src="../shared/js/scripts.js"></script>
<script type="text/javascript" src="../shared/js/jquery.price_format.1.8.min.js"></script>
<link href="../shared/css/jquery-ui-1.10.3.custom.css" rel="stylesheet">

<title>Savant - Perfil</title>
</head>

<body>

	<div class="root">

		<?php require '../shared/header.php';?>

		<?php require '../shared/navigation_bar.php';?>

		<div class="content">
		

			<div class="profile_user">
				<img alt="imagem do usuário"
					src="../shared/img/user_photo_example.png">
			</div>

			<div class="profile_update">
				<form action="account.do.php?action=update_profile" method="post">
					<div>
						<div class="labels">
							<label>Nome:</label> <label>Email:</label>
						</div>
						<input type="text" name="nome"
							value="<?php echo $_SESSION["usuario.nome"]?>"> <input
							type="text" name="email"
							value="<?php echo $_SESSION["usuario.email"]?>"> <input
							class="button" type="submit" value="Alterar dados">
					</div>
				</form>
			</div>

			<div class="profile_password box">
				<form action="account.do.php?action=update_password" method="post">
					<div>
						<div class="labels">
							<label>Senha:</label> <label>Confirmação:</label>
						</div>
						<input type="password" name="senha" value=""> <input
							type="password" name="confirmacao" value=""> <input
							class="button" type="submit" value="Alterar senha">
					</div>
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
