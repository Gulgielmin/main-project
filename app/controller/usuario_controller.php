<?php

require dirname(__FILE__).'/../business/usuario_business.php';
require dirname(__FILE__).'/../domain/usuario.php';

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
	
	public function registrarUsuario($content) {
		$nome = $content['nome'];
		$usuario = $content['usuario'];
		$email = $content['email'];
		$senha = $content['senha'];
		$confirmacao = $content['confirmacao'];
		
		$u = new Usuario($nome, $email, $senha,$usuario,$confirmacao);
		$this->business->salva($u);
	}

	public function consultaUsuario($idUsuario){
		$busca = $this->business->consultaUsuario($idUsuario);
		if($busca){
			$usuario = new Usuario($busca->nome, $busca->email, $busca->senha);
			return $usuario;
		}
		else{
			echo "ERRO NA CONSULTA DE USUÁRIO";
		}
	}
}