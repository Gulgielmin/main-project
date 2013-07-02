<?php

abstract class Business{

	protected $dao;

	abstract public function salvar($object);
	abstract public function alterar($object);
	abstract public function exclui($object);
}

?>
