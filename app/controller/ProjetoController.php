<?php

include $_SERVER['DOCUMENT_ROOT'].'\Savant\main-project\app\domain\Projeto.php';
include $_SERVER['DOCUMENT_ROOT'].'\Savant\main-project\app\business\ProjetoBusiness.php';

class ProjetoController{	

	private $business;

	public function __construct(){
		$this->business = new ProjetoBusiness();
	}

	public function cria($post){
		$nome = $post['nomeProjeto'];
		$inicio = $post['dataInicio'];
		$fim = $post['dataTermino'];
		$periodicidade = $post['periodicidade'];
		$valor = $post['previsaoCusto'];
		$qtdPeriodos = $post['quantidadePeriodos'];
		$data = $post['dataDesconto'];

		$projeto = new Projeto(null, $nome, $inicio, $fim, $periodicidade, $valor, $qtdPeriodos, $data);

		$sucesso = $this->business->salva($projeto);
		return $sucesso;
	}

	public function listaProjeto($idUsuario){

		return $this->business->listaProjeto($idUsuario);
	}

	public function buscaProjeto($idProjeto){

		$busca = $this->business->buscaProjeto($idProjeto);
		$projeto = new Projeto($busca->idProjeto, $busca->nome_projeto, $busca->inicio, $busca->fim, $busca->Periodicidade_id, $busca->valor, $busca->qtdPeriodos, $busca->alterar);

		return $projeto;
	}
}

?>