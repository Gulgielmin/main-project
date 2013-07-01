<?php
include_once 'PDOConnectionFactory.php';

interface UsuarioDAO {

	public function validarUsuarioDAO($email, $senha);
	
}

class DefaultUsuarioDAO extends PDOConnectionFactory implements UsuarioDAO{

	private $conex = null;

	public function __construct(){
		$this->conex = PDOConnectionFactory::criaConexao();
	}

	public function validarUsuarioDAO($email, $senha){
		$usuario = null;
		$stmt = $this->conex->prepare("SELECT * FROM usuario WHERE email = :email AND senha = :senha LIMIT 1");
		$stmt->bindValue('email', $email, PDO::PARAM_STR);
		$stmt->bindValue('senha', $senha, PDO::PARAM_STR);
		
		$ok = $stmt->execute();
				
		$usuario = $stmt->fetch(PDO::FETCH_OBJ);
				
		return $usuario;
	}	
	
	public function salvarUsuario($usuario) {
		$stmt = $this->conex->prepare("INSERT INTO savant.usuario (idUsuario, email, senha, nome, suario) VALUES ( :email, :senha, :nome, :usuario)");
		$stmt->bindValue('email', $usuario->email, PDO::PARAM_STR);
		$stmt->bindValue('senha', $usuario->senha, PDO::PARAM_STR);
		$stmt->bindValue('usuario', $usuario->usuario, PDO::PARAM_STR);
		$stmt->bindValue('nome', $usuario->nome, PDO::PARAM_STR);
		
		$stmt->execute();
	}
}

?>