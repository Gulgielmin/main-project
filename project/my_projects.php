
<?php

ini_set('display_errors', 'Off');
error_reporting(E_ALL);

require '../app/utils/session_utils.php';
require '../app/domain/usuario.php';
require 'project.do.php';

if(!session_started()) {
	header("location ../account/login.php");
}

$usuario = NULL;
$meusProjetos = NULL;

try {
	//$usuario = $_SESSION['current_user'];
	$usuario = new Usuario(NULL,NULL,NULL);
	$usuario->setEmail($_SESSION['usuario.email']);
	$usuario->setIdUsuario($_SESSION['usuario.id']);
	$usuario->setNome($_SESSION['usuario.nome']);
	$meusProjetos = listaProjeto($usuario->getIdUsuario());
}
catch(Exception $e) {
	echo "Tratar esse erro :/";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="../shared/css/style.css" type="text/css">

<style type="text/css">
@import url("../project/css/myproject.css");
</style>

<title>Savant - Meus projetos</title>
</head>

<body>

	<div class="root">

		<?php require '../shared/header.php';?>

		<?php require '../shared/navigation_bar.php';?>

		<div class="content">

			<div id="content-sidebar">
				<div class="post">

					<div class="myprojectcontent">
                    <center>
                    		<div class="myprojectfont">
								<h2 class="title">Meus Projetos</h2>
						</div>
                     </center>
						<ul>
							<?php foreach ($meusProjetos as $projeto=>$nome){?>
							<li class="first"><a
								href="visualizarProjeto.php?id=<?php echo $nome['idProjeto'];?>"><?php echo $nome['nome_projeto'];?>
							</a></li>
							<?php }?>
						</ul>
                        <center>
                        <a href="create.php">Cadastrar Novo Projeto</a>
                        </center>
	
					</div>
				</div>
			</div>



		</div>
		<?php require '../shared/footer.php';?>
	</div>

</body>
</html>
