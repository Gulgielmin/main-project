<?php
	include_once $_SERVER['DOCUMENT_ROOT'].'/Savant/topo.php';
	include_once $_SERVER['DOCUMENT_ROOT'].'/Savant/projeto/handlerProjeto.php';
	
	$_SESSION['idUsuario'] = 1;
	
	$meusProjetos = listaProjeto($_SESSION['idUsuario']);
?>
				<div id="nav-map">
					<h2 class="title">Bem-vindo!</h2>
				</div>
			</div>
			<br />
			<div id="page-sidebar">
				<div id="content-sidebar">
					<div class="post">
						<div class="meta">
							<h2 class="title">Meus Projetos</h2>
						</div>
						<br />
						<div class="entry">
							<ul>
								<?php foreach ($meusProjetos as $projeto=>$nome){?>
									<li class="first"><a href="visualizarProjeto.php?id=<?php echo $nome['idProjeto'];?>"><?php echo $nome['nome_projeto'];?></a></li>
								<?php }?>
							</ul>
							<?php echo $_SESSION['nomeUsuario']; ?>
						</div>
					</div>
				</div>
				<div id="sidebar">
					<div>
						<h2 class="title">Olá Usuário!</h2>
						<ul>
							<li><a href="#">Meus Dados</a></li>
							<li><a href="../logout.php">Sair</a></li>
						</ul>
					</div>
					<div>
						<h2 class="title">Opções</h2>
						<ul>
							<li><a href="cadastrarProjeto.php">Cadastrar Novo Projeto</a></li>
						</ul>
					</div>
				</div>
			</div>
<?php
	include '../rodape.php';
?>
