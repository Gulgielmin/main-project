<?php

abstract class Business{

	protected $dao;

	abstract public function salva($objeto);
	abstract public function altera();
	abstract public function buscaProjeto($idProjeto);
	abstract public function exclui();
}

?>
