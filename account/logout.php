
<?php

/**
 * Podemos apenas permitir o logout para usuário já logados
 */
require '../app/utils/session_utils.php';
redirect_if_no_user('../account/login.php');

/**
 * Criamos um controller e requisitamos o encerramento da sessão
*/
require_once '../app/controller/usuario_controller.php';
$controller = new UsuarioController();
try {
	$controller->encerrarSessao();
	header("location: ../account/");
} catch (Exception $e){
	echo $e->getMessage();
}


?>