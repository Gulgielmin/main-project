<?php

include $_SERVER['DOCUMENT_ROOT'].'/Savant/app/controller/ProjetoController.php';

define("LISTA_PROJETO",1);
define("CADASTRO",2);
define("ALTERA",3);
define("EXCLUI",4);

$_SESSION['idUsuario'] = 1;

//---Para tratar requisições de formulários
if($_POST) { //Se houver requisição...
	$acao = $_REQUEST['action'];
	$retorno = null;
	
	if($acao==LISTA_PROJETO)
			try {
				$retorno = listaProjeto($_SESSION['idUsuario']);
			}
			catch (Exception $ex) {
				echo "ERRO: ".$ex->getMessage();
			}
	else if($acao==CADASTRO)
			try {
				$retorno = cria($_POST, $_SESSION['idUsuario']);
			}
			catch (Exception $ex) {
				echo "ERRO: ".$ex->getMessage();
			}
	else if($acao==ALTERA)
			try {
				$retorno = altera($_POST);
			}
			catch (Exception $ex) {
				echo "ERRO: ".$ex->getMessage();
			}
	else if($acao==EXCLUI){
			try {				
				$retorno = exclui($_REQUEST['id']);
				if($retorno)
					header ("location: index.php");
			}
			catch (Exception $ex) {
				echo "ERRO: ".$ex->getMessage();
			}
		}
}	
//---Fim do tratamento de requisições de formulários

function cria($formulario, $idUsuario){

		$controller = new ProjetoController();
		
		$sucesso = $controller->cria($formulario, $idUsuario);
		if($sucesso)
			header ("location: index.php");
		return $sucesso;

	}

function listaProjeto($IdUsuario){

	$controller = new ProjetoController();

	$sucesso = $controller->listaProjeto($IdUsuario);
	
	return $sucesso;
}

function buscaProjeto($IdProjeto){

	$controller = new ProjetoController();

	return $controller->buscaProjeto($IdProjeto);
}

function exclui($IdProjeto){

	$controller = new ProjetoController();

	return $controller->excluiProjeto($IdProjeto);
}

function altera($formulario){

	$controller = new ProjetoController();

	$sucesso = $controller->alteraProjeto($formulario);
	if($sucesso) {
			header ("location: index.php");
		}
	else
		echo "Algum erro ocorreu!";
	return $sucesso;
}

?>