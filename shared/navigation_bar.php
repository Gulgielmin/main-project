<div class="navbar">
	<?php if (session_started()) { ?>
	<div id="left">
		<ul>
			<li><a href="">Dashboard</a></li>
			<li><a href="">Projeto</a></li>
			<li><a href="">Administra��o</a></li>
		</ul>
	</div>
	
	<div id="right">

		<div id="left">
			<ul>
				<li><a href="">Sair</a></li>
			</ul>
		</div>

	</div>
	
	<?php } else {?>
	<div id="right">

		<div id="left">
			<ul>
				<li><a href="">Entrar</a></li>
			</ul>
		</div>

	</div>
	<?php } ?>
</div>
