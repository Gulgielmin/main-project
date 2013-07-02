<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<?php

require '../app/utils/session_utils.php';
redirect_if_no_user('../account/login.php');
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<link rel="stylesheet" href="../shared/css/style.css" type="text/css">
		<!--  colocar aqui o css dessa página -->
		<title>Savant - Perfil</title>
	</head>
	
<body>

	<div class="root">
		
		<?php require '../shared/header.php';?>
		
		<?php require '../shared/navigation_bar.php';?>
		
		<div class="content">
			
		<?php echo "<h2>Olah ".$_SESSION['usuario.nome']."!</h2>"?>
		
		</div>
		<?php require '../shared/footer.php';?>
	</div>

</body>
</html>