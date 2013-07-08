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

	private function _efetuarLogin($usuario) {

		if($usuario) {
			session_start("usuario");
			$_SESSION['usuario.id'] = $usuario->idUsuario;
			$_SESSION['usuario.nome'] = $usuario->nome;
			$_SESSION['usuario.email'] = $usuario->email;
		}
		else {
			throw new Exception("User does not exists.");
		}
	}

	public function validarUsuario($content){
		$usuario = new Usuario(NULL, $content['email'], $content['senha'], NULL);
		$usuario = $this->business->validarUsuario($usuario);

		$this->_efetuarLogin($usuario);

	}


	public function registrarUsuario($content) {
		$nome = $content['nome'];
		$email = $content['email'];
		$senha = $content['senha'];
		$confirmacao = $content['confirmacao'];

		$u = new Usuario($nome, $email, $senha, $confirmacao);
		$this->business->salvar($u);
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