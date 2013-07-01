<?php

include $_SERVER['DOCUMENT_ROOT'].'/Savant/app/controller/UsuarioController.php';

define("EFETUAR_LOGIN",1);

//---Para tratar requisições de formulários
if($_POST) { //Se houver requisição...
	$acao = $_REQUEST['action'];
	$retorno = null;
	
	if($acao==EFETUAR_LOGIN)
			try {
				$retorno = efetuarLogin($_POST); //POST do form de Login
			}
			catch (Exception $ex) {
				echo "ERRO: ".$ex->getMessage();
			}
}	
//---Fim do tratamento de requisições de formulários

function efetuarLogin($dadosLogin){

	$controller = new UsuarioController();
	
	$sucesso = $controller->efetuarLogin($dadosLogin);
	
	if($sucesso) {
		header ("location: ../projeto/index.php");
	}
	else {
		echo "Algum erro ocorreu!"; //mudar para Mensagem de alerta em JS
		header ("location: ../login.php?sucess=false");
	}
}

?>