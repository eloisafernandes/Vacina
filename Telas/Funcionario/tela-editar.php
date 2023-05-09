<?php 
	session_start();
	unset($_SESSION["edicao"]);
	unset($_SESSION["erro"]);
	unset($_SESSION["msg_cadastro"]);
	unset($_SESSION["recado"]);
	$logado = isset($_SESSION["logado"]) ? $_SESSION["logado"] : '';

	if ($logado){
			
	
	
 ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	
	<title>Editar dados</title>
	<link rel="icon" href="../../css/logo5.png"/>
	<link rel="stylesheet" type="text/css" href="../../css/estilo.css">
 	<link rel="stylesheet" type="text/css" href="../../css/cadstro.css">
</head>
<body>
	<?php 
	include ("../conexao.php");
	$cart_sus = $_GET['cart'];
	$select = "select * from pessoa where cart_sus = $cart_sus";
	$dados = mysqli_query($con, $select);

	while ($tabela = mysqli_fetch_array($dados)){?>
		<?php

		
		include ('../menu_mobile.html');
	?>
	<br><br>
	<div class="col s8 m7 l6 offset-l4 grey lighten-2 div1">
		<form method="post" action="editar-pessoa.php">
			<div class="col s12 m12 l12 fonte">
				<center><h4 class="fonte">EDITAR DADOS DO PACIENTE</h4></center>
			</div>
			<br>
			<div class="col s12 m12 l12">
				<label class="fonte"> Nome completo</label> 
				<input type="text" value = "<?php echo $tabela['nome']?>" name="nome" id="nome">
		
			</div>
			<div class="col s6 m6 l6">
				<label class="fonte">Número do cartão do SUS</label> 
				<input type="text" value="<?php echo $tabela['cart_sus']?>" name="cart_sus" id="cart_sus">
				
				
			</div>

			<div class="col s6 m6 l6">
				<label class="fonte">Prontuario</label> 
				<input type="text" value="<?php echo $tabela['prontuario']?>" name="prontuario" id="prontuario">
				
				
			</div>
			<div class="col s6 m6 l6">
				<label class="fonte">CPF</label> 
				<input type="text" value="<?php echo $tabela['cpf']?>" name="cpf" id="cpf">
				
			</div>

			<div class="col s6 m6 l6">
				<label class="fonte">RG </label>
				<input type="text" value="<?php echo $tabela['rg']?>" name="rg" id="rg">
				
			</div>
			
			
			<div class="col s6 m6 l6">
				<label class="fonte">Rua</label> 
				<input type="text" value="<?php echo $tabela['rua']?>" name="rua" id="rua"	>
				
			</div>
			

			<div class="col s6 m6 l6">
				<label class="fonte">Numero</label>
				<input type="text" value="<?php echo $tabela['numero']?>" name="numero" id="numero">
				
			</div>
			
			<div class="col s6 m6 l6">
				<label class="fonte">Cidade</label>
				<input type="text" value="<?php echo $tabela['cidade']?>" name="cidade" id="cidade">
			</div>

			<div class="col s6 m6 l6">
				<label class="fonte">Bairro</label> 
				<input type="text" value="<?php echo $tabela['bairro']?>" name="bairro" id="bairro">
			</div>

			<div class="col s6 m6 l6">
				<label class="fonte">Telefone</label>
				<input type="text" value="<?php echo $tabela['telefone']?>" name="telefone" id="telefone">
			</div>

			<div class="col s6 m6 l6">
				<label class="fonte" for="last_name">Data de Nascimento</label>
				<input type="text" class="datepicker" value="<?php echo $tabela['data_nasc']?>" name="data_nasc" id="data_nasc">
			</div>
			<center><button class="fonte btn waves-effect waves-light div2 green darken-2" type="submit" name="action">Editar<i class="material-icons right">send</i></button></center>
  			<br>
		</form>
	</div>
	<!-- jQuery -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
	<script type="text/javascript">
		$('.datepicker').pickadate({
			monthsFull:['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
			monthsShort:  ['Jan', 'Fev', 'Mar', 'Abril', 'Mar', 'Jun', 'Jul', 'Aug', 'Set', 'Out', 'Nov', 'Dez'],
			weekdaysFull: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
			weekdaysShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
			weekdaysLetter: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
			electMonths: true, //Creates a dropdown to control month
			selectYears: 200, // Creates a dropdown of 15 years to control year,
			today: 'Hoje',
			clear: 'Limpar',
			close: 'Ok',
			closeOnSelect: false, // Close upon selecting a date, 
			format: 'yyyy-mm-dd'
		});
	</script>

	<?php }

	} //fechando o if
	else {
		$_SESSION["pagina"] = "tela-busca.php";
		$_SESSION["falha"] = "Você precisa realizar seu login";
		header("location:../pagina-inicial.php");
	}
?>
</body>
</html>