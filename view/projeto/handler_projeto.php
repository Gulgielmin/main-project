<?php

include $_SERVER['DOCUMENT_ROOT'].'\Savant\main-project\app\controller\ProjetoController.php';

define("LISTA_PROJETO",1);
define("CADASTRO",2);

//---Para tratar requisições de formulários
if($_REQUEST) { //Se houver requisição...
	$acao = $_REQUEST['action'];
	$retorno = null;
	
	if($acao==LISTA_PROJETO)
			$retorno = listaProjeto($_POST['idUsuario']);
	else if($acao==CADASTRO)
			$retorno = cria($_POST);
}	
//---Fim do tratamento de requisições de formulários

function cria($formulario){

		$controller = new ProjetoController();
		
		$sucesso = $controller->cria($formulario);
		if($sucesso)
			echo 'Operação Realizada!'; //Aqui redireciona para local adequado!
		return $sucesso;

	}

function listaProjeto($IdUsuario){

	$controller = new ProjetoController();

	$sucesso = $controller->listaProjeto($IdUsuario);
	
	return $sucesso;
}

?>