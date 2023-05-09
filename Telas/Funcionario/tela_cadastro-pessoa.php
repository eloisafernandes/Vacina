<?php 
	session_start();
	unset($_SESSION["edicao"]);
	unset($_SESSION["erro"]);
	unset($_SESSION["recado"]);
	$logado = isset($_SESSION["logado"]) ? $_SESSION["logado"] : '';
	echo ($logado);

	if ($logado){
			
	
	
 ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Cadastrar pessoa</title>
		<link rel="icon" href="../../css/logo5.png"/>
		
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!--Import materialize.css-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css"> 
		<!--<script type="text/javascript">
			function validar_pessoa(){
				var recado = ' '	;
				var nome = document.getElementById("nome").value;
				var cpf = document.getElementById("cpf").value;
				var cart_sus = document.getElementById("cart_sus").value;
				var rg = document.getElementById("rg").value;
				var rua = document.getElementById("rua").value;
				var numero = document.getElementById("numero").value;
				var cidade = document.getElementById("cidade").value;
				var bairro = document.getElementById("bairro").value;
				var telefone = document.getElementById("telefone").value;
				var data_nasc = document.getElementById("data_nasc").value;

				

				num_exp = /\d/g;
				esp_exp = /\S/g;
				cpf_exp = /[a-zA-Z]/ig;
				

				if (num_exp.test(nome)){
					recado = recado+"Nome não pode conter números";
					alert(recado);
					return false;
				}
				else if(esp_exp.test(nome)){
					recado = recado+"O nome deve ser completo";
					alert(recado);
					return false;

				}
				else if (cpf.length < 10 || cpf_exp.test(cpf)){
					recado = recado+"Cpf inválido";
					return false;
					alert(recado);

				}
				
				cartaosus_exp = /\D/ig;
				tel_exp = /[a-zA-Z]/ig;
				rua_exp =  /\d/ig;
				num_casa_exp = /[a-zA-Z]/ig;
				cidade_exp = /\d/ig;



		</script>-->
		
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../../css/cadstro.css">

		<link rel="stylesheet" type="text/css" href="../../css/estilo.css">
	</head>
<body style="background-color: #f2f2f2;">

	<?php
		include ('../menu_mobile.html');
	?>
	<br>
	<div class="col s12 m12 l6 offset-l4 grey lighten-2 div1">
		<form method="post" action="inserir-pessoa.php">
			<div class="col s12 m12 l12 fonte">
				<center><h4>CADASTRO DO PACIENTE</h4></center>
			</div>
			<br>
			<div class="input-field col s12 m12 l12">
				<label for="last_name" class="fonte black-text"> Nome completo</label> 
				<input type="text" class= 'fonte'  name="nome" id="nome"
				<?php 
					if (!empty($_SESSION['valor_nome'])) { //!empty -> diferente de vazio
						# code...
						echo "value='".$_SESSION['valor_nome']."'"; //vai exibir o que o usuário digitou
						unset($_SESSION['valor_nome']); //destroi a variável especificada
					}
				?>
				>
				<?php 
					if (!empty($_SESSION['nome_null'])) {
						# code...
						echo "<p class= 'fonte' style='color: red;'>" .$_SESSION['nome_null']. "</p>";
						unset($_SESSION['nome_null']);
					}
				?>
			</div>
			<div class="input-field col s6 m6 l6">
				<label for="last_name" class="fonte black-text">Prontuário</label> 
				<input type="text" class= 'fonte' name="prontuario" id="prontuario"
				<?php 
					if (!empty($_SESSION['valor_prontuario'])) { //!empty -> diferente de vazio
						# code...
						echo "value='".$_SESSION['valor_prontuario']."'"; //vai exibir o que o usuário digitou
						unset($_SESSION['valor_prontuario']); //destroi a variável especificada
					}
				?>
				>
				<?php 
					if (!empty($_SESSION['prontuario_null'])) {
						# code...
						echo "<p style='color: red;'>" .$_SESSION['prontuario_null']. "</p>";
						unset($_SESSION['prontuario_null']);
					}
				?>
			</div>

			<div class=" input-field col s6 m6 l6">
				<label for="last_name" class="fonte black-text">Número do cartão do SUS</label> 
				<input type="text" class= 'fonte'  name="cart_sus" id="cart_sus"
				<?php 
					if (!empty($_SESSION['valor_cartsus'])) {
						# code...
						echo "value='".$_SESSION['valor_cartsus']."'";
						unset($_SESSION['valor_cartsus']);
					}
				?>
				>
				<?php 
					if (!empty($_SESSION['cartsus_null'])) {
						# code...
						echo "<p class= 'fonte'  style='color: red;'>" .$_SESSION['cartsus_null']. "</p>";
						unset($_SESSION['cartsus_null']);
					}
				?>
			</div>

			<div class="input-field col s6 m6 l6">
				<label for="last_name" class="fonte black-text">CPF</label> 
				<input type="text" class= 'fonte'  name="cpf" id="cpf"
				<?php 
					if (!empty($_SESSION['valor_cpf'])) {
						# code...
						echo "value='".$_SESSION['valor_cpf']."'";
						unset($_SESSION['valor_cpf']);
					}
				?>
				>
				<?php 
					if (!empty($_SESSION['cpf_null'])) {
						# code...
						echo "<p class= 'fonte'  style='color: red'>" .$_SESSION['cpf_null']."</p>";
						unset($_SESSION['cpf_null']);
					}
				?>
			</div>

			<div class="input-field col s6 m6 l6">
				<label for="last_name" class="fonte black-text">RG </label>
				<input type="text" class= 'fonte'  name="rg" id="rg"
				<?php 
					if (!empty($_SESSION['valor_rg'])) {
						# code...
						echo "value='".$_SESSION['valor_rg']."'";
						unset($_SESSION['valor_rg']);
					}
				?>
				>
				<?php 
					if (!empty($_SESSION['rg_null'])) {
						# code...
						echo "<p style='color: red'>" .$_SESSION['rg_null']."</p>";
						unset($_SESSION['rg_null']);
					}
				?>
			</div>
			
			
			<div class="input-field col s6 m6 l6">
				<label for="last_name" class="fonte black-text">Rua</label> 
				<input type="text" class= 'fonte'  name="rua" id="rua"
				<?php 
					if (!empty($_SESSION['valor_rua'])) {
						# code...
						echo "value='".$_SESSION['valor_rua']."'";
						unset($_SESSION['valor_rua']);
					}
				?>
				>
				<?php 
				if (!empty($_SESSION['rua_null'])) {
					# code...
					echo "<p class= 'fonte'  style='color: red'>" .$_SESSION['rua_null']."</p>";
					unset($_SESSION['rua_null']);
				}
				?>
			</div>
			

			<div class="input-field col s6 m6 l6">
				<label for="last_name" class="fonte black-text">Numero</label>
				<input type="text" name="numero" id="numero"
				<?php 
					if (!empty($_SESSION['valor_numero'])) {
						# code...
						echo "value='".$_SESSION['valor_numero']."'";
						unset($_SESSION['valor_numero']);
					}
				?>
				>
				<?php 
				if (!empty($_SESSION['numero_null'])) {
					# code...
					echo "<p class= 'fonte' style='color: red'>" .$_SESSION['numero_null']."</p>";
					unset($_SESSION['numero_null']);
				}
				?>
			</div>
			
			<div class="input-field col s6 m6 l6">
				<label for="last_name" class="fonte black-text">Cidade</label>
				<input type="text" class= 'fonte' name="cidade" id="cidade"
				<?php 
					if (!empty($_SESSION['valor_cidade'])) {
						# code...
						echo "value='".$_SESSION['valor_cidade']."'";
						unset($_SESSION['valor_cidade']);
					}
				?>
				>
				<?php 
				if (!empty($_SESSION['cidade_null'])) {
					# code...
					echo "<p class= 'fonte' style='color: red'>" .$_SESSION['cidade_null']."</p>";
					unset($_SESSION['cidade_null']);
				}
				?>
			</div>

			<div class="input-field col s6 m6 l6">
				<label for="last_name" class="fonte black-text">Bairro</label> 
				<input type="text" class= 'fonte' name="bairro" id="bairro"
				<?php 
					if (!empty($_SESSION['valor_bairro'])) {
						# code...
						echo "value='".$_SESSION['valor_bairro']."'";
						unset($_SESSION['valor_bairro']);
					}
				?>
				>
				<?php 
				if (!empty($_SESSION['bairro_null'])) {
					# code...
					echo "<p style='color: red'>" .$_SESSION['bairro_null']."</p>";
					unset($_SESSION['bairro_null']);
				}
				?>
			</div>

			<div class="input-field col s6 m6 l6">
				<label for="last_name" class="fonte black-text">Telefone</label>
				<input type="text" class= 'fonte' name="telefone" id="telefone"
				<?php 
					if (!empty($_SESSION['valor_telefone'])) {
						# code...
						echo "value='".$_SESSION['valor_telefone']."'";
						unset($_SESSION['valor_telefone']);
					}
				?>
				>
				<?php 
				if (!empty($_SESSION['telefone_null'])) {
					# code...
					echo "<p style='color: red'>" .$_SESSION['telefone_null']."</p>";
					unset($_SESSION['telefone_null']);
				}
				?>
			</div>

			<div class="input-field col s6 m6 l6">
				<label for="last_name" class="fonte black-text">Data de Nascimento</label>
				<input type="text" class="datepicker" name="data_nasc" id="data_nasc"
				<?php 
					if (!empty($_SESSION['valor_datanasc'])) {
						# code...
						echo "value='".$_SESSION['valor_datanasc']."'";
						unset($_SESSION['valor_datanasc']);
					}
				?>
				>
				<?php 
				if (!empty($_SESSION['datanasc_null'])) {
					# code...
					echo "<p class= 'fonte' style='color: red'>" .$_SESSION['datanasc_null']."</p>";
					unset($_SESSION['datanasc_null']);
				}
				?>
			</div>
			<!--<label>Data de nascimento</label> <input type="text" class="datepicker" name="data_nasc">-->

			<center>

				<button class="fonte btn waves-effect waves-light div2 green darken-2" type="submit" name="action" onClick="validar_pessoa()">Cadastrar<i class="material-icons right">send</i>
				
  				</button>
  			</center>
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
	
	</body>
<?php
	} //fechando o if
	else {
		$_SESSION["pagina"] = "tela_cadastro-pessoa.php";
		$_SESSION["falha"] = "Você precisa realizar seu login";
		header("location: ../pagina-inicial.php");
	}
?>

</html>