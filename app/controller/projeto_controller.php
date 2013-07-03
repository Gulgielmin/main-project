
﻿<?php

include '../app/business/projeto_business.php';
include '../app/domain/projeto.php';

class ProjetoController{	

	private $business;

	public function __construct(){
		$this->business = new ProjetoBusiness();
	}

	public function criarProjeto($post, $idUsuario){
		$nome = $post['nomeProjeto'];
		$inicio = $this->converter_data($post['dataInicio']);
		$fim = $this->converter_data($post['dataTermino']);
		$periodicidade = $post['periodicidade'];
		$valor = $post['previsaoCusto'];
		$qtdPeriodos = $post['quantidadePeriodos'];
		$data = $this->converter_data($post['dataDesconto']);

		$projeto = new Projeto($nome, $inicio, $fim, $periodicidade, $valor, $qtdPeriodos, $data);

		$sucesso = $this->business->salvaNovoProjeto($projeto, $idUsuario);
		return $sucesso;
	}

	public function listarProjeto($idUsuario){

		return $this->business->listarProjeto($idUsuario);
	}

	public function buscarProjeto($idProjeto){

		$busca = $this->business->buscaProjeto($idProjeto);
		$projeto = new Projeto($busca->idProjeto, $busca->nome_projeto, $this->converter_data($busca->inicio), $this->converter_data($busca->fim), $busca->Periodicidade_id, $busca->valor, $busca->qtdPeriodos, $this->converter_data($busca->data), $busca->idProjeto, $busca->Custo_id);

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
		$idCusto = $post['idCusto'];
		$periodicidade = $post['periodicidade'];
		$valor = $post['previsaoCusto'];
		$qtdPeriodos = $post['quantidadePeriodos'];
		$data = $this->converter_data($post['dataDesconto']);
		
		try {
			$projeto = new Projeto($nome, $inicio, $fim, $periodicidade, $valor, $qtdPeriodos, $data, $idCusto, $idProjeto);
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