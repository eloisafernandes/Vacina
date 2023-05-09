<!DOCTYPE html>
<html>
<head>
	
	
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	<meta charset="utf-8">


	<link rel="stylesheet" type="text/css" href="../../css/cadstro.css">
	<link rel="stylesheet" type="text/css" href="../../css/estilo.css">
	
	
	<title>Vacinação</title>
	<link rel="icon" href="../../css/logo5.png"/>
	<?php
		session_start();
		unset($_SESSION["edicao"]);
		unset($_SESSION["erro"]);

		unset($_SESSION["msg_cadastro"]);
		unset($_SESSION["recado"]);
		unset($_SESSION["recado1"]);

		$logado = isset($_SESSION["logado"]) ? $_SESSION["logado"] : '';
		
		if ($logado){



	?>
</head>
<body style="background-color: #f2f2f2;">
	<?php
		include("../menu_mobile.html");
	?>
	<br><br>
	<div class="row">
		<div class="col s12 m12 l6 offset-l4  "> 
			<div ><?php $msg = isset($_SESSION["recado"]) ? $_SESSION["recado"] : '';

				if ($msg) {  
					$text = $_SESSION["recado"];

					if ($text == 'Vacinação registrada!'){ ?>
						<p style="padding: 5px;" class="fonte card panel green darken-4 white-text z-depth-0"><?php echo $_SESSION["recado"]; ?> </p> <?php } 


					 else { ?>
						<p style="padding: 5px;" class="fonte card panel red darken-4 white-text z-depth-0"><?php echo $_SESSION["recado"];  ?> </p> <?php }  } ?>
					
			</div>
	</div>
	<div class="row">
		<form method='post' action="inserir-vacinacao.php" >
			<div class="col s12 m12 l6 offset-l4 grey lighten-2 div1">
				<center><h4 class="fonte">REALIZAR VACINAÇÃO</h4></center>

				<div class="input-field">
					<label class="fonte black-text">Número do cartão do sus </label>
					<input  id="color-input" type="number" class="fonte" name="cart_sus">
				</div>


				<label class="fonte black-text"> Tipo de vacina</label>
				<select class="fonte" id="color-input" name="vacina" >
					<option value="" disabled selected>Selecione</option>
					<?php
					$nome_vacina = 'select nome from vacinas';
					$con = mysqli_connect('127.0.0.1', 'root', '', 'vacina') or die ("Conexão ivalida");

					$tabela = mysqli_query($con, $nome_vacina);

					while ($tabela_vacina = mysqli_fetch_array($tabela)){ ?>
						<option class="black-text" value = "<?php echo $tabela_vacina['nome']; ?>"> <?php echo $tabela_vacina['nome']; ?> </option>
					<?php } ?>
			</select>
			<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
			
			<script type="text/javascript">
				$(document).ready(function() {
					$('select').material_select();
				});
			</script>

			<div class="input-field">
				<label for="last_name" class="fonte black-text">Data</label>
				<input id="color-input" type="date" class="datepicker" name="data_vacina">
			</div>
			<center><button class=" fonte btn waves-effect waves-light green darken-2" type="submit" name="action">Enviar<i class="material-icons right">send</i>
	  		</button></center><br>
		</form>
		<script type="text/javascript">
			$('.datepicker').pickadate({
				monthsFull:['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
				monthsShort:  [ 'Jan', 'Fev', 'Mar', 'Abril', 'Mar', 'Jun', 'Jul', 'Aug', 'Set', 'Out', 'Nov', 'Dez'],
				weekdaysFull: [ 'Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
				weekdaysShort: [ 'Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab' ],
				weekdaysLetter: [ 'D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
				electMonths: true, //Creates a dropdown to control month
				selectYears: 200, // Creates a dropdown of 15 years to control year,
				today: 'Hoje',
				clear: 'Limpar',
				close: 'Ok',
				closeOnSelect: false, // Close upon selecting a date, 
				format: 'yyyy-mm-dd'
			});
		</script>
				
			</div>
			
<?php }

	else{
		$_SESSION["pagina"] = 'funcionario/tela-vacinacao.php';
		$_SESSION["falha"] = "Você precisa realizar seu login.";
		header("location: ../pagina-inicial.php");

	}
?>
</body>
</html>