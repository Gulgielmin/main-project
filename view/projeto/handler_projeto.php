<?php

include $_SERVER['DOCUMENT_ROOT'].'\Savant\main-project\app\controller\ProjetoController.php';

define("LISTA_PROJETO",1);
define("CADASTRO",2);

$acao = $_POST['action'];
$retorno = null;

if($acao==LISTA_PROJETO)
		$retorno = listaProjeto($_POST['idUsuario']);
else if($acao==CADASTRO)
		$retorno = cria($_POST);	

function cria($formulario){

		echo '123';

		$controller = new ProjetoController();

		$sucesso = $controller->cria($formulario);

		if($sucesso)
			echo 'Operação Realizada!'; //Aqui redireciona para local adequado!
		return $sucesso;

	}

function listaProjeto($IdUsuario){

	$controller = new ProjetoController();

	$sucesso = $controller->listaProjeto($IdUsuario);

	if($sucesso)
		echo 'Operação Realizada!!!!'; //Aqui redireciona para local adequado!

		echo $sucesso->nome_projeto;
		echo $sucesso->idProjeto;
	return $sucesso;
}

?>