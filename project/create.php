﻿<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<?php require '../app/utils/session_utils.php';?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="../shared/css/style.css" type="text/css">
<link rel="stylesheet" href="css/create.css" type="text/css">
<title>Savant - Novo projeto</title>
</head>

<body>

	<div class="root">

		<?php require '../shared/header.php';?>

		<?php require '../shared/navigation_bar.php';?>

		<div class="content">

			<form method="post" action="handlerProjeto.php?action=2"
				id="formCadastroProjeto">
				<div class="labels">
					<label for="nomePojeto">Nome:</label>
					<label for="dataInicio">In&iacute;cio:</label>
					<label for="dataTermino">Fim:</label>
					<label for="dadosCusto">DADOS DE CUSTOS</label><br />
					<label for="previsaoCusto">Or&ccedil;amento:</label>
					<label for="periodiciadade"></label>
					<label for="quantidadePeriodos">Quantidade de Períodos:</label>
					 <label for="dataDesconto">Data do Primeiro Desconto de Valor:</label>
				
				
				</div>
				
				<div class="inputs">
				
					<input type="text" name="nomeProjeto" /> 
					<input type="text" name="dataInicio" id="from" /> 
					<input type="text" name="dataTermino" id="to" />  
					<input type="text" name="previsaoCusto" /> 
					<select name="periodicidade">
						<option value="1">Única</option>
						<option value="2">Diária</option>
						<option value="3">Semanal</option>
						<option value="4">Quinzenal</option>
						<option value="5">Mensal</option>
						<option value="6">Semestral</option>
						<option value="7">Anual</option>
					</select> 
					<input type="text" name="quantidadePeriodos" value="" /> 
					<input type="text" name="dataDesconto" class="datepicker" />
					<input type="submit" value="Enviar" /> 
					<input type="button" class="button" value="Cancelar" id="botaoCancelar" />
				
				</div>
				
				</form>

			<div id="sidebar">
				<div>
					<h2 class="title">Opções</h2>
					<ul id="options-list">
						<li><a href="index.php">Ir para Meus Projetos</a></li>
					</ul>
				</div>
			</div>
		</div>
		<?php require '../shared/footer.php';?>
	</div>

</body>
</html>
