<?php

abstract class Business{

	protected $dao;

	abstract public function salvarProjeto($object);
	abstract public function alterarProjeto($object);
	abstract public function excluirProjeto($object);
	public abstract function listarProjeto($idUsuario);
	public abstract function buscarProjeto($idProjeto);
	public abstract function excluir($idProjeto);
}

?>
