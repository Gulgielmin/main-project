<?php
	include_once $_SERVER['DOCUMENT_ROOT'].'/Savant/topo.php';	
?>
		<div id="nav-map">
			<h2 class="title">Cadastrar Projeto</h2>
		</div>
	</div> <!--fim #header-->
	<br />
	<div id="page-sidebar">
		<div id="content-sidebar">
			<div class="post">
				<h2 class="title">Novo Projeto</h2>
				<form method="post" action="handlerProjeto.php?action=2" id="formCadastroProjeto">
					<table id="tabela-dados-projeto">
						<tr>
							<th colspan="2" class="align-left">Nome:&nbsp;&nbsp;
								<input type="text" name="nomeProjeto" value="" />
							</th>
						</tr>
						<tr>
							<th class="align-left">Início:
							<input type="text" name="dataInicio" id="from" value="" style="width:40%;" /></th>
							<th class="align-left">Fim:
							<input type="text" name="dataTermino" id="to" value="" style="width:40%;" /></th>
						</tr>								
						<tr>
							<th colspan="2" class="custo-tr-title">DADOS DE CUSTOS</th>
						</tr>
						<tr>
							<th class="align-right">Valor:</th>
							<td><input type="text" name="previsaoCusto" value="" /></td>
						</tr>
						<tr>
							<th class="align-right">Periodicidade de Desconto do Valor:</th>
							<td>
								<select name="periodicidade">
									<option value="1">Única</option>
									<option value="2">Diária</option>
									<option value="3">Semanal</option>
									<option value="4">Quinzenal</option>
									<option value="5">Mensal</option>
									<option value="6">Semestral</option>
									<option value="7">Anual</option>
								</select>
							</td>
						</tr>
						<tr>
							<th class="align-right">Quantidade de Períodos:</th>
							<td><input type="text" name="quantidadePeriodos" value="" /></td>
						</tr>
						<tr>
							<th class="align-right">Data do Primeiro Desconto de Valor:</th>
							<td><input type="text" name="dataDesconto" class="datepicker" style="width:55%;" value="" /></td>
						</tr>
						<tr>
							<td>
								<input type="submit" value="Enviar" />
							</td>
							<td>
								<input type="button" class="button" value="Cancelar" id="botaoCancelar" />
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>		
		<div id="sidebar">
			<div>
				<h2 class="title">Opções</h2>
				<ul id="options-list">
					<li><a href="index.php">Ir para Meus Projetos</a></li>
				</ul>
			</div>
		</div>
	</div>
<?php
	include '../rodape.php';
?>