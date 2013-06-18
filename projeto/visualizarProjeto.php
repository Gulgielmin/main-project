<?php
	include_once $_SERVER['DOCUMENT_ROOT'].'/Savant/topo.php';
	include_once $_SERVER['DOCUMENT_ROOT'].'/Savant/projeto/handlerProjeto.php';
	
	$projeto =  buscaProjeto($_REQUEST['id']); //buscar o projeto de acordo com o id que vier
?>
		<div id="nav-map">
			<h2 class="title"><?php echo $projeto->getNome();?></h2>
		</div>
	</div> <!--fim #header-->
	<div id="menu">
		<ul>
			<li class="active"><a href="#" accesskey="1" title=""><span>Dados do Projeto</span></a></li>
			<li><a href="#" accesskey="2" title=""><span>Categorias de Itens</span></a></li>
			<li><a href="#" accesskey="3" title=""><span>Itens de Custo</span></a></li>
			<li><a href="#" accesskey="4" title=""><span>Participantes</span></a></li>
			<li><a href="#" accesskey="5" title=""><span>Relatórios</span></a></li>
		</ul>
	</div>
	<br />
	<div id="page-sidebar">
		<div id="content-sidebar">
			<div class="post">
				<h2 class="title"><?php echo $projeto->getNome();?></h2>
				<div class="entry">
					<table id="tabela-dados-projeto">
						<tr>
							<th>Início:</th>
							<td class="align-left"><?php echo $projeto->getInicio();?></td>
							<th>Fim:</th>
							<td class="align-left"><?php echo $projeto->getFim();?></td>
						</tr>								
						<tr>
							<th colspan="4" class="custo-tr-title">DADOS DE CUSTOS</th>
						</tr>
						<tr>
							<th colspan="2" class="align-right">Valor:</th>
							<td colspan="2"><?php echo $projeto->getCusto()->getValor();?></td>
						</tr>
						<tr>
							<th colspan="2" class="align-right">Periodicidade de Desconto do Valor:</th>
							<td colspan="2"><?php echo $projeto->getCusto()->getPeriodicidade();?></td>
						</tr>
						<tr>
							<th colspan="2" class="align-right">Quantidade de Períodos:</th>
							<td colspan="2"><?php echo $projeto->getCusto()->getQtdPeriodos();?></td>
						</tr>
						<tr>
							<th colspan="2" class="align-right">Data do Primeiro Desconto de Valor:</th>
							<td colspan="2"><?php echo $projeto->getCusto()->getData();?></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div id="sidebar">
			<div>
				<h2 class="title">Opções</h2>
				<ul id="options-list">
					<li><a href="cadastrarProjeto.php">Cadastrar Novo Projeto</a></li>
					<li><a href="alterarProjeto.php?id=<?php echo $projeto->getIdProjeto();?>">Editar Dados</a></li>
					<li><a href="#">Excluir Projeto</a></li>
					<li><a href="index.php">Meus Projetos</a></li>
				</ul>
			</div>
		</div>
	</div>
<?php
	include '../rodape.php';
?>