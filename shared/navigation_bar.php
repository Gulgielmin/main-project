<div class="navbar">
	<?php if (session_started()) { ?>
	<div id="left">
		<ul>
			<li><a href="">Dashboard</a></li>
			<li><a href="../project/index.php">Projeto</a></li>
			<li><a href="">Administração</a></li>
		</ul>
	</div>
	
	<div id="right">

		<div id="left">
			<ul>
				<li><a href="../account/logout.php">Sair</a></li>
			</ul>
		</div>

	</div>
	
	<?php } else {?>
	<div id="right">

		<div id="left">
			<ul>
				<li><a href="../account/login.php">Entrar</a></li>
			</ul>
		</div>

	</div>
	<?php } ?>
</div>
