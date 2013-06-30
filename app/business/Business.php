<?php

abstract class Business{

	protected $dao;

	abstract public function salva($objeto);
	abstract public function altera($id);
	abstract public function exclui($id);
}

?>
