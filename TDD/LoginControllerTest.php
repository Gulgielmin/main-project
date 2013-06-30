<?php
include "../app/controller/LoginController.php";
class LoginControllerTest extends PHPUnit_Framework_TestCase{
	
	
	public function TestPreenchimento()
	{
		$obj = new LoginController();
		$this->assertEquals (true,$obj->verficaCamposLogin($obj->email,$obj->senha));
		$this->assertEquals (false,$obj->verficaCamposLogin('',$obj->senha));
		$this->assertEquals (false,$obj->verficaCamposLogin($obj->email,''));	
	}
	
	public function TestefetuarLogin()
	{
		$obj = new LoginController();
		$this->assertEquals (true,$obj->efetuarLogin($email,$senha));
	} 
	
	public function redirecionarLogin()
	{
		$obj = new LoginController();
		$this->assertEquals ('projeto/index.php',$obj-> redirecionarLogin($usuario));
	}
}

