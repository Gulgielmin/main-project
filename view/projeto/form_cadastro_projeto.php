<form method="POST" action="handler_projeto.php">
	<input type="hidden" name="action" value="2" />
	<label>Nome do Projeto:</label>
	<input type="text" name="nomeProjeto" /><br>

	<label> Data de In&iacute;cio:</label>
	<input type="text" name="dataInicio" /><br>

	<label> Data de T&eacute;rmino:</label>
	<input type="text" name="dataTermino" /><br>

	<label> Previsão de Custo:</label>
	<input type="text" name="previsaoCusto" /><br>

	<label> Periodicidade:</label>
	<select size="1" name="periodicidade">	
		<option select value="1">&Uacute;nica</option>
		<option value="2">Di&aacute;ria</option>
		<option value="3">Semanal</option>
		<option value="4">Quinzenal</option>
		<option value="5">Mensal</option>
		<option value="6">Semestral</option>
		<option value="7">Anual</option>
	</select>
	<br>

	<label> Quantidade de Períodos:</label>
	<input type="text" name="quantidadePeriodos" /><br>

	<label> Data de Desconto:</label>
	<input type="text" name="dataDesconto" /><br>

	<input type="submit" value="Cadastrar" name="cadastrar_projeto">


</form>