<?php
include_once 'pdo_connection_factory.php';

interface UsuarioDAO {

	public function validarUsuario($email, $senha);

	public function salvarUsuario($usuario);
	
	public function alterarConta($usuario);

	public function consultarUsuario($idUsuario);
	
}

class DefaultUsuarioDAO extends PDOConnectionFactory implements UsuarioDAO{

	private $conex = null;

	public function __construct(){
		$this->conex = PDOConnectionFactory::criaConexao();
	}

	public function validarUsuario($email, $senha){
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
	
	public function consultarUsuario($idUsuario){
		$usuario = null;
		$stmt = $this->conex->prepare("SELECT * FROM usuario WHERE idUsuario = :idUsuario LIMIT 1");
		$stmt ->bindValue('idUsuario', $idUsuario, PDO::PARAM_INT);
		
		$stmt->execute();
		
		$usuario = $stmt->fetch(PDO::FETCH_OBJ);
	
		return $usuario;
	}


	
	public function alterarConta($usuario){
		$ok = null;
		try{
	
			$stmt = $this->conex->prepare("UPDATE usuario SET nome = :nome, email = :email, senha = :senha WHERE idUsuario = :id");
			
					$stmt->bindValue('nome', $usuario->getNome(), PDO::PARAM_STR);
					$stmt->bindValue('email', $usuario->getEmail(), PDO::PARAM_STR);
					$stmt->bindValue('senha', $usuario->getSenha(), PDO::PARAM_STR);
					$stmt->bindValue('id', $usuario->getIdUsuario(), PDO::PARAM_INT);
					
					try {
						$ok = $stmt->execute();
					}
					catch (Exception $ex){
						echo 'ERRO: '.$ex->getMessage();
					}
					
					$this->conex = PDOConnectionFactory::fechaConexao();
					return $ok;
					
		}catch ( PDOException $ex ){  echo "Erro: ".$ex->getMessage(); }
	}
}	


?>