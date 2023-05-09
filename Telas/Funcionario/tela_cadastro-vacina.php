<?php 
	session_start();
	unset($_SESSION["recado"]);
	$logado = isset($_SESSION["logado"]) ? $_SESSION["logado"] : '';

	if ($logado){
			
	
	
 ?>
<!DOCTYPE html>
<html>
	<head>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../../css/cadstro.css">
		<link rel="stylesheet" type="text/css" href="../../css/estilo.css">
		<link rel="icon" href="../../css/logo5.png"/>
		<title>Cadastrar nova vacina</title>
	</head>
<body style="background: #f2f2f2">
	<?php
		include("../menu_mobile.html");
	?>
	<br><br>
	<div class="row">
		<div class="col s12 m12 l6 offset-l4  "> 
			<div ><?php $msg = isset($_SESSION["erro"]) ? $_SESSION["erro"] : '';

				if ($msg) {  
					$text = $_SESSION["erro"];

					if ($text == 'Vacina cadastrada!'){ ?>
						<p style="padding: 5px;" class="fonte card panel green darken-4 white-text z-depth-0"><?php echo $_SESSION["erro"]; ?> </p> <?php } 


					 else { ?>
						<p style="padding: 5px;" class="fonte card panel red darken-4 white-text z-depth-0"><?php echo $_SESSION["erro"];  ?> </p> <?php }  } ?>
					
			</div>
	</div>
		<div class="col s12 m12 l6 offset-l4  grey lighten-2 div1">

			
			<form method="post" action="inserir-vacina.php">
				<center><h4 class="fonte">CADASTRO DE NOVA VACINA</h4></center>
				
				<?php
		          $nome = isset($_SESSION["nome"]) ? $_SESSION["nome"] : ""; //verifica se a sessão foi iniciada
		          $qtd_vacinas = isset($_SESSION["qtd_vacinas"]) ? $_SESSION["qtd_vacinas"] : "";
		          $qtd_dosagens = isset($_SESSION["qtd_dosagens"])  ? $_SESSION["qtd_dosagens"] : "";
		        ?>
				<div class="input-field">
					<input id="last_name" type="text" class="validate" name="nome" required="required" value="<?php echo $nome; ?>">
          			<label for="last_name" class=" fonte black-text">Nome</label>
				</div>
				<script type="text/javascript">
					//validar nome da vacina
					//se conter numero no inicio, não vai enviar para o banco de dados 
					//return ---> false 
					function Validar_formulario(){
						var nome = document.getElementById('color-input').value;
						var num_inicio = /^\d/; //verifica se o primeiro caracter é um numero
						if (num_inicio.test(nome)){
							return true;
						}
						else{
							alert("Nome inválido!");
							return false;
						}


					}
					
				</script>
				
				<div class="input-field">
					<label for="last_name" class="fonte black-text">Quantidade de vacinas</label>
					<input type="number" id="color-input" name="qt_vacinas" required="required" value="<?php echo $qtd_vacinas; ?>">
				</div>

				<div class="input-field">
					<label for="last_name" class="fonte black-text">Quantidade de dosagens</label>
					<input type="number" id="color-input" name="qt_dosagem" required="required" value="<?php echo $qtd_dosagens; ?>">
				</div>
				
				<center><button class="fonte btn waves-effect waves-light div2 green draken-2" type="submit" onclick=" return Validar_formulario()" name="action">Cadastrar<i class="material-icons right" >send</i>
			  	</button></center>
			  	<br>
			</form>
		</div>
	</div>
</body>
<?php
	} //fechando o if
	else {
		$_SESSION["pagina"] = "Telas/Funcionario/tela_cadastro-vacina.php";
		$_SESSION["falha"] = "Você precisa realizar seu login";
		header("location: ../pagina-inicial.php");
	}
?>
</html>