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
				<form method="post" action="handlerProjeto.php?action=2">
					<table id="tabela-dados-projeto">
						<tr>
							<th>Início:</th>
							<td class="align-left"><input type="text" name="inicio" id="from" value="" /></td>
							<th>Fim:</th>
							<td class="align-left"><input type="text" name="fim" id="to" value="" /></td>
						</tr>								
						<tr>
							<th colspan="4" class="custo-tr-title">DADOS DE CUSTOS</th>
						</tr>
						<tr>
							<th colspan="2" class="align-right">Valor:</th>
							<td colspan="2"><input type="text" name="inicio" value="" /></td>
						</tr>
						<tr>
							<th colspan="2" class="align-right">Periodicidade de Desconto do Valor:</th>
							<td colspan="2"><input type="text" name="inicio" value="" /></td>
						</tr>
						<tr>
							<th colspan="2" class="align-right">Quantidade de Períodos:</th>
							<td colspan="2"><input type="text" name="inicio" value="" /></td>
						</tr>
						<tr>
							<th colspan="2" class="align-right">Data do Primeiro Desconto de Valor:</th>
							<td colspan="2"><input type="text" name="inicio" value="" /></td>
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