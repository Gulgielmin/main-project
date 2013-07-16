
﻿<?php

include dirname(__FILE__).'/../business/projeto_business.php';
include dirname(__FILE__).'/../domain/projeto.php';
/**
 * Classe que liga um projeto aos seus controles lógico
 * @author Willian
 *
 */
class ProjetoController{	

	private $business;

	/**
	 * Construtor default de um projeto
	 */
	public function __construct(){
		$this->business = new ProjetoBusiness();
	}

	/**
	 * Cria um projeto utilizando as informações
	 * de usuário como indicador
	 * @param $post $idUsuario
	 * @return $sucesso
	 */
	public function criarProjeto($post, $idUsuario){
		$nome = $post['nomeProjeto'];
		$inicio = $this->converter_data($post['dataInicio']);
		$fim = $this->converter_data($post['dataTermino']);
		$orcamento = $post['orcamento'];

		$projeto = new Projeto(null, $nome, $inicio, $fim, $orcamento, $idUsuario);

		$sucesso = $this->business->salvarProjeto($projeto, $idUsuario);
		return $sucesso;
	}

	/**
	 * Lista os projetos cadastrados com um identificador
	 * @param $idUsuario
	 * @return $ok
	 */
	public function listarProjeto($idUsuario){

		return $this->business->listarProjeto($idUsuario);
	}

	/**
	 * Consulta projetos cadastrados no banco de dados
	 * @param $idProjeto
	 * @throws Exception
	 * @return Ambigous <NULL, Projeto>
	 */
	public function buscarProjeto($idProjeto){
		$projeto = null;
		$busca = $this->business->buscarProjeto($idProjeto);
		if($busca)
			$projeto = new Projeto($busca->idProjeto, $busca->nome_projeto, $this->converter_data($busca->inicio), $this->converter_data($busca->fim), $busca->orcamento);
		else
			throw new Exception("Nenhum projeto encontrado.");
		
		return $projeto;
	}
	/**
	 * Deleta um projeto do banco de dados
	 * @param  $idProjeto
	 * @return %ok
	 */
	public function excluirProjeto($idProjeto){
	
		$ok = $this->business->exclui($idProjeto);
		
		return $ok;
	}
	
	/**
	 * Altera um projeto utilizando informacoes de formulário
	 * @param $post
	 */
	public function alterarProjeto($post){
	
		$idProjeto = $post['idProjeto'];
		$nome = $post['nomeProjeto'];
		$inicio = $this->converter_data($post['dataInicio']);
		$fim = $this->converter_data($post['dataTermino']);
		$orcamento = $post['orcamento'];
		
		try {
			$projeto = new Projeto($idProjeto, $nome, $inicio, $fim, $orcamento);
		}
		catch(Exception $ex){
			echo "Erro:".$ex.getMessage();
		}

		$sucesso = $this->business->alterarProjeto($projeto);
		
		return $sucesso;	
	}
	
	/**
	 * Converte uma string de data para o formato aceitavel no 
	 * banco de dados
	 * @param $data
	 * @return unknown
	 */
	public function converter_data($data) {
		$data_nova = implode(preg_match("~\/~", $data) == 0 ? "/" : "-", array_reverse(explode(preg_match("~\/~", $data) == 0 ? "-" : "/", $data)));
		return $data_nova;
	}
}
?>