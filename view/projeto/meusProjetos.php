<?php
$_SESSION['idUsuario'] = 1; //ID usu�rio deverá vir do login (Redirecionar� para c�)

include 'handler_projeto.php';

$meusProjetos = listaProjeto($_SESSION['idUsuario']);

foreach ($meusProjetos as $projeto=>$nome) {
	echo $nome['nome_projeto'];
}
?>