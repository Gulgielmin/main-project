<?php
include '../app/domain/Usuario.php';


class UsuarioController{
	
	public function salvar($content){
		$nome = $content['nome'];
		$usuario = $content['usuario'];
		$email = $content['email'];
		$senha = $content['senha'];
		$confirmacao = $content['confirmacao'];
		
		$u = new Usuario($nome, $email, $senha,$confirmacao);
	}	
	
}

$controller = new UsuarioController();

try {
	$controller->salvar($_POST);
	echo "Usuario cadastrado!";
} catch (Exception $e) {
	echo "Erro ao cadastrar!";
}

?>