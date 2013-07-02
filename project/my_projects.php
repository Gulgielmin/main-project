
<?php

require '../app/utils/session_utils.php';
require 'project.do.php';

if(!session_started()) {
	header("location ../account/login.php");
}

$usuario = NULL;
$meusProjetos = NULL;

try {
	$usuario = $_SESSION['current_user'];
	$meusProjetos = listaProjeto($usuario->getIdUsuario());
}
catch(Exception $e) {
	echo "Tratar esse erro :/";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<link rel="stylesheet" href="../shared/css/style.css" type="text/css">
<!--  colocar aqui o css dessa página -->
<title>Savant - Meus projetos</title>
</head>

<body>

	<div class="root">

		<?php require '../shared/header.php';?>

		<?php require '../shared/navigation_bar.php';?>

		<div class="content">

			<div id="content-sidebar">
				<div class="post">
					<div class="meta">
						<h2 class="title">Meus Projetos</h2>
					</div>
					<br />
					<div class="entry">
						<ul>
							<?php foreach ($meusProjetos as $projeto=>$nome){?>
							<li class="first"><a
								href="visualizarProjeto.php?id=<?php echo $nome['idProjeto'];?>"><?php echo $nome['nome_projeto'];?>
							</a></li>
							<?php }?>
						</ul>
					</div>
				</div>
			</div>

			<div id="sidebar">
				<div>
					<h2 class="title">
						Olá
						<?php echo $usuario->getNome()?>
						!
					</h2>
					<ul>
						<li><a href="#">Meus Dados</a></li>
						<li><a href="../account/logout.php">Sair</a></li>
					</ul>
				</div>
				<div>
					<h2 class="title">Opções</h2>
					<ul>
						<li><a href="cadastrarProjeto.php">Cadastrar Novo Projeto</a></li>
					</ul>
				</div>
			</div>


		</div>
		<?php require '../shared/footer.php';?>
	</div>

</body>
</html>
