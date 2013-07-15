<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

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
		<link rel="stylesheet" href="css/project.css" type="text/css">
		<script type="text/javascript" src="../shared/js/jquery-2.0.2.js"></script>
		<script type="text/javascript" src="../shared/js/jquery-ui-1.10.3.js"></script>
		<script type="text/javascript" src="../shared/js/jquery.maskedinput.js"></script>
		<script type="text/javascript" src="../shared/js/scripts.js"></script>
		<script type="text/javascript" src="../shared/js/jquery.price_format.1.8.min.js"></script>
		<link href="../shared/css/jquery-ui-1.10.3.custom.css" rel="stylesheet">
		<title>Savant - Projeto [<?php echo $projeto->getNome();?>]</title>
	</head>
	
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
						<li><a href="create.php">Cadastrar Novo Projeto</a></li>
						<li><a
							href="update.php?id=<?php echo $projeto->getIdProjeto();?>">Editar
								Dados</a></li>
						<li><a href="#">Excluir Projeto</a></li>
						<li><a href="index.php">Meus Projetos</a></li>
					</ul>					
					<input type="button" style="margin-left:30px;" class="button" value="Voltar" id="botaoCancelar" />
				</div>
			</div>
		
					<div id="project-content" class="box">
						<h2 style="text-indent:20px;">
							<?php echo $projeto->getNome();?>
						</h2>
						<div id="tabs">
							<ul>
								<li class="active"><a href="#tabs-1" accesskey="1" title=""><span>Dados do Projeto</span> </a></li>
								<li><a href="#tabs-2" accesskey="2" title=""><span>Categorias de Itens</span>
								</a></li>
								<li><a href="#tabs-3" accesskey="3" title=""><span>Itens de Custo</span>
								</a></li>
								<li><a href="#tabs-4" accesskey="4" title=""><span>Participantes</span> </a>
								</li>
								<li><a href="#tabs-5" accesskey="5" title=""><span>Relatórios</span> </a>
								</li>
							</ul>
							<div id="tabs-1">
								<table id="tabela-dados-projeto" style="text-align: left; width:200px;">
									<tr>
										<th>Nome:</th>
										<td class="align-left"><?php echo $projeto->getNome();?></td>
									</tr>
									<tr>
										<th>Início:</th>
										<td class="align-left"><?php echo $projeto->getInicio();?></td>
									</tr>
									<tr>
										<th>Fim:</th>
										<td class="align-left"><?php echo $projeto->getFim();?></td>
									</tr>
									<tr>
										<th>Orçamento:</th>
										<td>R$ <?php echo $projeto->getOrcamento();?></td>
									</tr>								
								</table>
								
								<br />
																
								<a href="update.php?id=<?php echo $projeto->getIdProjeto();?>" class="button">Editar Dados</a>
							</div>
							
							<div id="tabs-2"></div>
							<div id="tabs-3"></div>
							<div id="tabs-4"></div>
							<div id="tabs-5"></div>							
						</div>
						
					</div>
		</div>
		<?php require '../shared/footer.php';?>
	</div>

</body>
</html>
