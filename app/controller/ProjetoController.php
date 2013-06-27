
﻿<?php

include $_SERVER['DOCUMENT_ROOT'].'/Savant/app/business/ProjetoBusiness.php';
include $_SERVER['DOCUMENT_ROOT'].'/Savant/app/domain/Projeto.php';

class ProjetoController{	

	private $business;

	public function __construct(){
		$this->business = new ProjetoBusiness();
	}

	public function cria($post, $idUsuario){
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

	public function listaProjeto($idUsuario){

		return $this->business->listaProjeto($idUsuario);
	}

	public function buscaProjeto($idProjeto){

		$busca = $this->business->buscaProjeto($idProjeto);
		$projeto = new Projeto($busca->nome_projeto, $this->converter_data($busca->inicio), $this->converter_data($busca->fim), $busca->Periodicidade_id, $busca->valor, $busca->qtdPeriodos, $this->converter_data($busca->data), $busca->idProjeto, $busca->Custo_id);

		return $projeto;
	}
	
	public function excluiProjeto($idProjeto){
	
		$ok = $this->business->exclui($idProjeto);
		
		return $ok;
	}
	
	public function alteraProjeto($post){
	
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