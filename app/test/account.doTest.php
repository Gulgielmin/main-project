<?php
class accountdoTest extends PHPUnit_Framework_TestCase{
	
	
	/*public function ()
	{
		$this->assertEquals (true,$obj->verficaCamposLogin($obj->email,$obj->senha));
		$this->assertEquals (false,$obj->verficaCamposLogin('',$obj->senha));
		$this->assertEquals (false,$obj->verficaCamposLogin($obj->email,''));	
	}*/
	
	public function TestefetuarLogin()
	{
		include "../../account/account.do.php?action=login";
		$_POST['email']="";
		$_POST['senha']="";
		$this->assertEquals (false,$obj->efetuarLogin($_POST));
	} 
	
	/*public function redirecionarLogin()
	{
		$obj = new LoginController();
		$this->assertEquals ('projeto/index.php',$obj-> redirecionarLogin($usuario));
	}*/
}

