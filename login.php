<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Savant</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="config/css/default.css" rel="stylesheet" type="text/css" media="all" />
<link href="config/css/jquery-ui.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="config/js/jquery-2.0.2.js"></script>
<script type="text/javascript" src="config/js/jquery-ui-1.10.3.js"></script>
<script type="text/javascript" src="config/js/scripts.js"></script>
</head>
<body>
<div id="wrapper">
	<div id="wrapper-bgtop">
		<div id="wrapper-bgbtm">
			<div id="header">
				<div id="logo">
					<h1><a href="#"><img src="config/images/savant_med.png" width="235" /></a></h1>
				</div>
				<div id="nav-map">
					<h2 class="title">Login</h2>
				</div>
			</div>				
			<div id="page">
				<div id="content" style="width:80%;">
					<div class="post">
						<?php if($_GET) echo "<div class='ui-state-error ui-corner-all' style='text-indent:25px;'><h4>Usuário ou Senha inválidos!</h4></div>" ?>
						<br />
						<form method="post" action="usuario/handlerUsuario.php?action=1" id="formCadastroProjeto">
							<table style="width:300px;">
								<tr>
									<th>E-mail:&nbsp;&nbsp;
										<input type="text" name="email" value="" />
									</th>
								</tr>
								<tr>
									<th>Senha:&nbsp;&nbsp;
										<input type="password" name="senha" value="" />
									</th>
								</tr><tr>
									<th>
										<br />
										<input type="submit" style="background: url(config/images/ui-bg_glass_75_dadada_1x400.png);" value="Enviar" />
									</th>
								</tr>
								<tr>
									<th style="text-align:left;"><br />
										<a href="#">Criar Conta</a><br /><br />
										<a href="#">Esqueci minha senha</a>
									</th>
								</tr>								
							</table>
						</form>
					</div>
				</div>	
			</div>						
		</div>
	</div>
</div>
<div id="footer" class="container">
	<p>&copy; Savant - Controle Financeiro de Projetos</p>
</div>
</body>
</html>