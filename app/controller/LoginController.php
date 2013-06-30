<?php

include $_SERVER['DOCUMENT_ROOT'].'/Savant/app/business/LoginBusiness.php';
include $_SERVER['DOCUMENT_ROOT'].'/Savant/app/domain/Usuario.php';

$dadosLogin = new LoginController($_POST);

class LoginController{
	private $email;
	private $senha;
	
	public function __construct($_POST){
		$this->email = $_POST['email'];
		$this->senha = $_POST['senha'];
	}
	public function verficaCamposLogin(){
		if ($this->email == ''|| $this->senha == '' )
			return false;
		else 
			return true;	
	}
	
	
}