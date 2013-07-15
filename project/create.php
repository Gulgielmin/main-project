<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<?php require '../app/utils/session_utils.php';?>

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

			<form method="post" action="handlerProjeto.php?action=2"
				id="formCadastroProjeto">
				<fieldset>
					<legend class="destak">Cadastro de Projeto</legend>
				
					<label for="nomePojeto">Nome:</label>
						<input type="text" name="nomeProjeto" /> <br />
					
					<label for="dataInicio">In&iacute;cio:</label>
						<input type="text" name="dataInicio" id="from" /> <br /> 
					
					<label for="dataTermino">Fim:</label>
						<input type="text" name="dataTermino" id="to" />  <br />
					
					<label for="orcamento">Or&ccedil;amento:</label> 
						R$<input type="text" name="orcamento" id="orcamento" />  <br />
					
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
