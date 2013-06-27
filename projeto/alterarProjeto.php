<?php
if(!$_REQUEST)
	header ("location: meusProjetos.php");
$idProjeto = $_REQUEST['idProjeto']; //ID usu�rio deverá vir do login (Redirecionar� para c�)
include 'handler_projeto.php';
include '../top.php';

$meuProjeto = buscaProjeto($idProjeto);
?>
<div id="navegacao" style="width:101%;">
	<div style="display:inline">
	<h2 style="width:100%;">Editar Projeto</h2>
	</div>
</div>
<div id="corpo">
	<form method="post" action="handler_projeto.php" style="margin-left:40px;">
	<table>
		<input type="hidden" class="oculto" name="action" value="3" />
		<input type="hidden" class="oculto" name="idCusto" value="<?php echo $meuProjeto->getCusto()->getIdCusto();?>" />
		<input type="hidden" class="oculto" name="idProjeto" value="<?php echo $meuProjeto->getIdProjeto();?>" />
		<tr>
			<td><label>Nome do Projeto:</label></td>
			<td><input type="text" value="<?php echo $meuProjeto->getNome();?>" name="nomeProjeto" /></td>
		</tr>
		<tr>
			<td><label> Data de Início:</label></td>
			<td><input type="text" name="dataInicio" value="<?php echo $meuProjeto->getInicio();?>" class="datepicker" /></td>
		</tr>
		<tr>
			<td>Data de Término:</label></td>
			<td><input type="text" name="dataTermino" value="<?php echo $meuProjeto->getFim();?>" class="datepicker" /></td>
		</tr>
		<tr>
			<th colspan='2'>Previsão de Custos</th>
		</tr>
		<tr>
			<td><label> Previsão de Custo:</label></td>
			<td><input type="text" name="previsaoCusto" value="<?php echo $meuProjeto->getCusto()->getValor();?>" /></td>
		</tr>
		<tr>
			<td><label> Periodicidade:</label></td>
			<td><select size="1" name="periodicidade">	
					<option <?php if ($meuProjeto->getCusto()->getPeriodicidade()==1){echo "selected";}?> value="1">Única</option>
					<option <?php if ($meuProjeto->getCusto()->getPeriodicidade()==2){echo "selected";}?> value="2">Diária</option>
					<option <?php if ($meuProjeto->getCusto()->getPeriodicidade()==3){echo "selected";}?> value="3">Semanal</option>
					<option <?php if ($meuProjeto->getCusto()->getPeriodicidade()==4){echo "selected";}?> value="4">Quinzenal</option>
					<option <?php if ($meuProjeto->getCusto()->getPeriodicidade()==5){echo "selected";}?> value="5">Mensal</option>
					<option <?php if ($meuProjeto->getCusto()->getPeriodicidade()==6){echo "selected";}?> value="6">Semestral</option>
					<option <?php if ($meuProjeto->getCusto()->getPeriodicidade()==7){echo "selected";}?> value="7">Anual</option>
				</select></td>
		</tr>
		<tr>
			<td><label> Quantidade de Períodos:</label></td>
			<td><input type="text" value="<?php echo $meuProjeto->getCusto()->getQtdPeriodos();?>" name="quantidadePeriodos" /></td>
		</tr>
		<tr>
			<td><label> Data de Desconto:</label></td>
			<td><input type="text" name="dataDesconto" value="<?php echo $meuProjeto->getCusto()->getData();?>" class="datepicker" /></td>
		</tr>
		<tr><td colspan='2'>
			<input type="submit" value="Salvar">
			<input type="reset" value="Cancelar" onclick="history.go(-1);">
		</td></tr>
	</table>
	</form>
</div>
</div>
</body>
</html>