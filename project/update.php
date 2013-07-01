<?php
if(!$_REQUEST)
	header ("location: index.php");
$idProjeto = $_REQUEST['id']; //ID usu�rio deverá vir do login (Redirecionar� para c�)
include 'handlerProjeto.php';
include '../topo.php';

$meuProjeto = buscaProjeto($idProjeto);
?>
<div id="nav-map">
			<h2 class="title">Editar Projeto</h2>
		</div>
	</div> <!--fim #header-->
	<br />
	<div id="page-sidebar">
		<div id="content-sidebar">
			<div class="post">
				<h2 class="title">Novo Projeto</h2>
				<form method="post" action="handlerProjeto.php?action=3" id="formCadastroProjeto">
					<input type="hidden" class="oculto" name="action" value="3" />
					<input type="hidden" class="oculto" name="idCusto" value="<?php echo $meuProjeto->getCusto()->getIdCusto();?>" />
					<input type="hidden" class="oculto" name="idProjeto" value="<?php echo $meuProjeto->getIdProjeto();?>" />
		
					<table id="tabela-dados-projeto">
						<tr>
							<th colspan="2" class="align-left">Nome:&nbsp;&nbsp;
								<input type="text" name="nomeProjeto" value="<?php echo $meuProjeto->getNome();?>" />
							</th>
						</tr>
						<tr>
							<th class="align-left">Início:
							<input type="text" name="dataInicio" id="from" value="<?php echo $meuProjeto->getInicio();?>" style="width:40%;" /></th>
							<th class="align-left">Fim:
							<input type="text" name="dataTermino" id="to" value="<?php echo $meuProjeto->getFim();?>" style="width:40%;" /></th>
						</tr>								
						<tr>
							<th colspan="2" class="custo-tr-title">DADOS DE CUSTOS</th>
						</tr>
						<tr>
							<th class="align-right">Valor:</th>
							<td><input type="text" name="previsaoCusto" value="<?php echo $meuProjeto->getCusto()->getValor();?>" /></td>
						</tr>
						<tr>
							<th class="align-right">Periodicidade de Desconto do Valor:</th>
							<td>
								<select size="1" name="periodicidade">	
									<option <?php if ($meuProjeto->getCusto()->getPeriodicidade()==1){echo "selected";}?> value="1">Única</option>
									<option <?php if ($meuProjeto->getCusto()->getPeriodicidade()==2){echo "selected";}?> value="2">Diária</option>
									<option <?php if ($meuProjeto->getCusto()->getPeriodicidade()==3){echo "selected";}?> value="3">Semanal</option>
									<option <?php if ($meuProjeto->getCusto()->getPeriodicidade()==4){echo "selected";}?> value="4">Quinzenal</option>
									<option <?php if ($meuProjeto->getCusto()->getPeriodicidade()==5){echo "selected";}?> value="5">Mensal</option>
									<option <?php if ($meuProjeto->getCusto()->getPeriodicidade()==6){echo "selected";}?> value="6">Semestral</option>
									<option <?php if ($meuProjeto->getCusto()->getPeriodicidade()==7){echo "selected";}?> value="7">Anual</option>
								</select>
							</td>
						</tr>
						<tr>
							<th class="align-right">Quantidade de Períodos:</th>
							<td><input type="text" name="quantidadePeriodos" value="<?php echo $meuProjeto->getCusto()->getQtdPeriodos();?>" /></td>
						</tr>
						<tr>
							<th class="align-right">Data do Primeiro Desconto de Valor:</th>
							<td><input type="text" name="dataDesconto" class="datepicker" style="width:55%;" value="<?php echo $meuProjeto->getCusto()->getData();?>" /></td>
						</tr>
						<tr>
							<td>
								<input type="submit" value="Enviar" />
							</td>
							<td>
								<input type="button" class="button" value="Cancelar" id="botaoCancelar" />
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>		
		<div id="sidebar">
			<div>
				<h2 class="title">Opções</h2>
				<ul id="options-list">
					<li><a href="index.php">Ir para Meus Projetos</a></li>
				</ul>
			</div>
		</div>
	</div>
<?php
	include '../rodape.php';
?>