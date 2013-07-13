
﻿<?php

include dirname(__FILE__).'/../business/projeto_business.php';
include dirname(__FILE__).'/../domain/projeto.php';

class ProjetoController{	

	private $business;

	public function __construct(){
		$this->business = new ProjetoBusiness();
	}

	public function criarProjeto($post, $idUsuario){
		$nome = $post['nomeProjeto'];
		$inicio = $this->converter_data($post['dataInicio']);
		$fim = $this->converter_data($post['dataTermino']);
		$orcamento = $post['orcamento'];

		$projeto = new Projeto(null, $nome, $inicio, $fim, $orcamento, $idUsuario);

		$sucesso = $this->business->salvarProjeto($projeto, $idUsuario);
		return $sucesso;
	}

	public function listarProjeto($idUsuario){

		return $this->business->listarProjeto($idUsuario);
	}

	public function buscarProjeto($idProjeto){

		$busca = $this->business->buscaProjeto($idProjeto);
		$projeto = new Projeto($busca->idProjeto, $busca->nome_projeto, $this->converter_data($busca->inicio), $this->converter_data($busca->fim), $busca->orcamento);

		return $projeto;
	}
	
	public function excluirProjeto($idProjeto){
	
		$ok = $this->business->exclui($idProjeto);
		
		return $ok;
	}
	
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

		$sucesso = $this->business->altera($projeto);
		
		return $sucesso;	
	}
	
	public function converter_data($data) {
		$data_nova = implode(preg_match("~\/~", $data) == 0 ? "/" : "-", array_reverse(explode(preg_match("~\/~", $data) == 0 ? "-" : "/", $data)));
		return $data_nova;
	}
}
?>