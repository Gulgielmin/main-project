<?php 
session_start("usuario");

function session_started() {
	$sessao_ok = isset($_SESSION);
	
	if($sessao_ok) {
		$key_exists = array_key_exists('usuario.id',$_SESSION);
		return $key_exists;
	}
	return false;
}
?>