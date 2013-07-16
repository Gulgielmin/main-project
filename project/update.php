<?php
require 'project.do.php';

if(!isset($_GET['id'])) {
	header ("location: index.php");
}

$projeto = NULL;
try {
	$projeto =  buscaProjeto($_REQUEST['id']);
} catch(Exception $e) {
	echo "Tratar esse erro :/";
}

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="../shared/css/style.css" type="text/css">
<link rel="stylesheet" href="css/create.css" type="text/css">
<script type="text/javascript" src="../shared/js/jquery-2.0.2.js"></script>
<script type="text/javascript" src="../shared/js/jquery-ui-1.10.3.js"></script>
<script type="text/javascript" src="../shared/js/jquery.maskedinput.js"></script>
<script type="text/javascript" src="../shared/js/scripts.js"></script>
<script type="text/javascript" src="../shared/js/jquery.price_format.1.8.min.js"></script>
<link href="../shared/css/jquery-ui-1.10.3.custom.css" rel="stylesheet">
<link rel="stylesheet" href="../shared/css/style.css" type="text/css">
<title>Savant - Novo projeto</title>
</head>

<style type="text/css">
@import url("../project/css/myproject.css");
</style>

<body>

	<div class="root">

		<?php require '../shared/header.php';?>

		<?php require '../shared/navigation_bar.php';?>

		<div class="content">		
		
			<div id="sidebar" class="box">
				<div>
					<div id="title-sidebar" class="destak">
						Opções
					</div>
					<ul id="options-list">
						<li><a href="index.php">Meus Projetos</a></li>
					</ul>
				</div>
			</div>
        
			<div class="inputs box">

			<form method="post" action="project.do.php?action=update"
				id="formCadastroProjeto">
				<fieldset>
					<legend class="destak">Editar Projeto</legend>
				
					<label for="nomePojeto">Nome:</label>
						<input type="text" name="nomeProjeto" value="<?php echo $projeto->getNome()?>" /> <br />
					
					<label for="dataInicio">In&iacute;cio:</label>
						<input type="text" name="dataInicio" value="<?php echo $projeto->getInicio()?>" id="from" /> <br /> 
					
					<label for="dataTermino">Fim:</label>
						<input type="text" name="dataTermino" value="<?php echo $projeto->getFim()?>" id="to" />  <br />
					
					<label for="orcamento">Or&ccedil;amento:</label> 
						R$<input type="text" name="orcamento" value="<?php echo $projeto->getOrcamento()?>" id="orcamento" />  <br />
					
					<input type="submit" value="Enviar" class="button" /> 
					<input type="button" class="button" value="Cancelar" id="botaoCancelar" />
				
				</fieldset>				
				</form>
				
				</div>
		</div>
		<?php require '../shared/footer.php';?>
	</div>

</body>
</html>
