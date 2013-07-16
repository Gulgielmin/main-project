<?php 
session_start("usuario");
/**
 * Inicia uma sessão para uso em várias funcionalidades
 * @return unknown|boolean
 */
function session_started() {
	$sessao_ok = isset($_SESSION);
	
	if($sessao_ok) {
		$key_exists = array_key_exists('usuario.id',$_SESSION);
		return $key_exists;
	}
	return false;
}
/**
 * Metódo para redirecionamento de sessão não iniciada
 * @param unknown $url
 */
function redirect_if_no_user($url) {
	if(!session_started()) {
		header("location: ".$url);
	}
}
?>