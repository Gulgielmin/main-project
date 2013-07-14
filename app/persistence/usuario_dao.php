<?php
require_once 'pdo_connection_factory.php';

interface UsuarioDAO {

	public function validarUsuario($email, $senha);

	public function salvarUsuario($usuario);

	public function alterarConta($usuario);

	public function alterarDados($usuario);

	public function alterarSenha($usuario);

	public function consultarUsuario($idUsuario);

}

class DefaultUsuarioDAO extends PDOConnectionFactory implements UsuarioDAO{

	/**
	 * (non-PHPdoc)
	 * @see UsuarioDAO::validarUsuario()
	 */
	public function validarUsuario($email, $senha){
		
		$conex = $this->criaConexao();
		$stmt = $conex->prepare("SELECT idUsuario,nome,email,senha FROM usuario WHERE email LIKE :email AND senha LIKE :senha LIMIT 1");
		$stmt->bindValue('email', $email, PDO::PARAM_STR);
		$stmt->bindValue('senha', $senha, PDO::PARAM_STR);

		$success = $stmt->execute();

		if($success && $stmt->rowCount() > 0) {
			$usuario = $stmt->fetchObject();
			return $usuario;
		}
		else {
			throw new Exception("Usuário não existe.");
		}

	}

	/**
	 * (non-PHPdoc)
	 * @see UsuarioDAO::salvarUsuario()
	 */
	public function salvarUsuario($usuario) {
		$conex = $this->criaConexao();
		$stmt = $conex->prepare("INSERT INTO savant.usuario (email, senha, nome) VALUES ( :email, :senha, :nome)");
		$stmt->bindValue('email', $usuario->getEmail(), PDO::PARAM_STR);
		$stmt->bindValue('senha', $usuario->getSenha(), PDO::PARAM_STR);
		$stmt->bindValue('nome', $usuario->getNome(), PDO::PARAM_STR);

		$stmt->execute();
	}

	/**
	 * 
	 */
	public function consultarUsuario($idUsuario){
		$usuario = null;
		$conex = $this->criaConexao();
		$stmt = $conex->prepare("SELECT idUsuario,nome,email,senha FROM usuario WHERE idUsuario = :idUsuario LIMIT 1");
		$stmt ->bindValue('idUsuario', $idUsuario, PDO::PARAM_INT);

		$stmt->execute();

		$usuario = $stmt->fetch(PDO::FETCH_OBJ);

		return $usuario;
	}



	/**
	 * (non-PHPdoc)
	 * @see UsuarioDAO::alterarConta()
	 */
	public function alterarConta($usuario){
		$ok = null;

		$conex = $this->criaConexao();
		$stmt = $conex->prepare("UPDATE usuario SET nome = :nome, email = :email, senha = :senha WHERE idUsuario = :id");
			
		$stmt->bindValue('nome', $usuario->getNome(), PDO::PARAM_STR);
		$stmt->bindValue('email', $usuario->getEmail(), PDO::PARAM_STR);
		$stmt->bindValue('senha', $usuario->getSenha(), PDO::PARAM_STR);
		$stmt->bindValue('id', $usuario->getIdUsuario(), PDO::PARAM_INT);
						
		$ok = $stmt->execute();

		$this->conex = PDOConnectionFactory::fechaConexao();
		return $ok;
	}
	
	/**
	 * 
	 * @param unknown $usuario
	 * @return unknown
	 */
	public function alterarSenha($usuario) {
		$ok = null;

		$conex = $this->criaConexao();
		$stmt = $conex->prepare("UPDATE usuario SET senha=:senha WHERE idUsuario=:id");
			
		$stmt->bindValue('senha', $usuario->getSenha(), PDO::PARAM_STR);
		$stmt->bindValue('id', $usuario->getIdUsuario(), PDO::PARAM_INT);
		
		$ok = $stmt->execute();
		
		$this->conex = PDOConnectionFactory::fechaConexao();
		return $ok;
	}
	
	/**
	 * 
	 * @param Usuario $usuario
	 * @return unknown
	 */
	public function alterarDados($usuario){
		$ok = null;

		$conex = $this->criaConexao();
		$stmt = $conex->prepare("UPDATE usuario SET nome=:nome,email=:email WHERE idUsuario = :id");
			
		$stmt->bindValue('nome', $usuario->getNome(), PDO::PARAM_STR);
		$stmt->bindValue('email', $usuario->getEmail(), PDO::PARAM_STR);
		$stmt->bindValue('id', $usuario->getIdUsuario(), PDO::PARAM_INT);
	
		$ok = $stmt->execute();
	
		$this->conex = PDOConnectionFactory::fechaConexao();
		return $ok;
	}
}


?>