<?php

require_once dirname(__FILE__).'/../domain/usuario.php';

/**
 * Classe de teste para a classe de usuário.
 * 
 * @author Marcos
 *
 */
class UsuarioTest extends PHPUnit_Framework_TestCase {

	/**
	 * Uma senha deve conter entre 5 e 15 caracteres.
	 */
	public function testSenhaPequena() {
		try {
			new Usuario("User", "a@b.c", "1234");
			$this->fail("Não deveria chegar aqui.");
		} catch (Exception $e) {
			$this->assertEquals("Senha fora do formato.", $e->getMessage());
		}
	}
	
	
	/**
	 * Ao oferecer uma senha de confirmação, ela deve ser igual à senha original
	 */
	public function testSenhasDiferentes() {
		try {
			new Usuario("User", "a@b.c", "123456","131412");
			$this->fail("Não deveria chegar aqui.");
		} catch (Exception $e) {
			$this->assertEquals("Senhas não conferem.", $e->getMessage());
		}
	}
	
	public function testEmailVazio() {
		try {
			new Usuario("User", NULL, "123456");
			$this->fail("Não deveria chegar aqui.");
		} catch (Exception $e) {
			$this->assertEquals("Email vazio.", $e->getMessage());
		}
	}
	
	public function testEmailInvalido() {
		try {
			new Usuario("User", "as", "123456");
			$this->fail("Não deveria chegar aqui.");
		} catch (Exception $e) {
			$this->assertEquals("Email inválido.", $e->getMessage());
		}
	}
}

?>