<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<?php require '../app/utils/session_utils.php';?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="../shared/css/style.css" type="text/css">
<title>Savant - Novo projeto</title>
</head>

<body>

	<div class="root">

		<?php require '../shared/header.php';?>

		<?php require '../shared/navigation_bar.php';?>

		<div class="content">

			<form method="post" action="handlerProjeto.php?action=2"
				id="formCadastroProjeto">
				<label for="nomePojeto">Nome:</label><input type="text"
					name="nomeProjeto" /> <label for="dataInicio">In&iacute;cio:</label><input
					type="text" name="dataInicio" id="from" /> <label for="dataTermino">Fim:</label>
				<input type="text" name="dataTermino" id="to" /> <label
					for="dadosCusto">DADOS DE CUSTOS</label> <label for="previsaoCusto">Valor:</label><input
					type="text" name="previsaoCusto" /> <label for="periodiciadade"></label>
				<select name="periodicidade">
					<option value="1">Única</option>
					<option value="2">Diária</option>
					<option value="3">Semanal</option>
					<option value="4">Quinzenal</option>
					<option value="5">Mensal</option>
					<option value="6">Semestral</option>
					<option value="7">Anual</option>
				</select> <label for="quantidadePeriodos">Quantidade de Períodos:</label>
				<input type="text" name="quantidadePeriodos" value="" /> <label
					for="dataDesconto">Data do Primeiro Desconto de Valor:</label> <input
					type="text" name="dataDesconto" class="datepicker" /> <input
					type="submit" value="Enviar" /> <input type="button" class="button"
					value="Cancelar" id="botaoCancelar" />
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
