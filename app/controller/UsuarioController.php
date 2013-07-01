<?php

include $_SERVER['DOCUMENT_ROOT'].'/Savant/app/business/UsuarioBusiness.php';
include $_SERVER['DOCUMENT_ROOT'].'/Savant/app/domain/Usuario.php';

class UsuarioController{
	private $business;
	
	public function __construct(){
		$this->business = new UsuarioBusiness();
	}
	
	public function verificaCamposLogin($dadosLogin){
		if ($dadosLogin['email'] == '' || $dadosLogin['senha'] == '' )
			return false;
		else 
			return true;	
	}
	
	public function validarUsuario($email, $senha){
		$usuario = null;
		$usuario = $this->business->validarUsuario($email, $senha);
		return $usuario;
	}
	
	public function efetuarLogin($dadosLogin){
		$usuario = null;
		if($this->verificaCamposLogin($dadosLogin)){
			$usuario = $this->validarUsuario($dadosLogin['email'], $dadosLogin['senha']);
		}
		if($usuario){
			session_start();
			$_SESSION['idUsuario'] = $usuario->idUsuario;
			$_SESSION['nomeUsuario'] = $usuario->nome;
			$_SESSION['emailUsuario'] = $usuario->email;
			return true;
		}
		else {
			return false;
		}
	}
}