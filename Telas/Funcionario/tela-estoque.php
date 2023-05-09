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
	<title>Estoque</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../css/estilo.css">
    <link rel="stylesheet" type="text/css" href="../../css/cadstro.css">
    
    <link rel="icon" href="../../css/logo5.png"/>

    <script type="text/javascript">
    	qampola = document.getElementByName("qtd_aqmpola");
    	vol = document.getElementByName("ml_ampola");
    	val = document.getElementByName("validade");
    	cod = document.getElementByName("codvacina");

    	/*if (isNaN(qampola.value)){  
       		alert("Digite apenas números!"); 
		}
		if (isNaN(vol.value)){  
       		alert("Digite apenas números!"); 
		}
		if (isNaN(cod.value)){  
       		alert("Digite apenas números!"); 
		}



    </script>
	
</head>
<body style="background-color: #f2f2f2">
	<?php
		include("../menu_mobile.html");
	?>
	<br><br>
	<div class="row">
		<div class="col s12 m12 l6 offset-l4  "> 
			<div ><?php  $msg = isset($_SESSION["msg_estoque"]) ? $_SESSION["msg_estoque"] : '';

				if ($msg) {  
					$text = $_SESSION["msg_estoque"];

					if ($text == "Alterado com sucesso!" or $text == "Estoque atualizado."){ ?>
						<p style="padding: 5px;" class="fonte card panel green darken-4 white-text z-depth-0"><?php echo $_SESSION["msg_estoque"]; ?> </p> <?php } 


					 else { ?>
						<p style="padding: 5px;" class="fonte card panel red darken-4 white-text z-depth-0"><?php echo $_SESSION["msg_estoque"];  ?> </p> <?php }  } ?>
					
			</div>
	</div>
	<div class="row">
		<div class="col s12 m12 l6 offset-l4"> 

			<div ><?php 
				
				unset($_SESSION["edicao"]);
				unset($_SESSION["erro"]);
				unset($_SESSION["msg_cadastro"]);
				unset($_SESSION["recado"]);
				$msg = isset($_SESSION["recado1"]) ? $_SESSION["recado1"] : '';

				if ($msg) {  
					$text = $_SESSION["recado1"];

					if ($text == 'Alterado com sucesso'){ ?>
						<p style="padding: 5px;" class="fonte card panel green darken-4 white-text z-depth-0"><?php echo $_SESSION["recado1"]; ?> </p> <?php } 


					 else { ?>
						<p style="padding: 5px;" class="fonte card panel red darken-4 white-text z-depth-0"> Erro </p> <?php }  } ?>
					
			</div>
	</div>
	<div class="col s12 m12 l6 offset-l4 grey lighten-2 " style="border-radius: 10px">

	<form action="inserir-estoque.php" method="post">
		<center><h4 class="fonte"> ESTOQUE </h4></center>
	
		<label class="black-text fonte"> Nome da vacina</label>
		<select class="fonte" name="vacina">
			<option value="" class="fonte" disabled selected>Escolher tipo de vacina</option>
			<?php

				$nome_vacina = 'select nome from vacinas';
				$con = mysqli_connect('127.0.0.1', 'root', '', 'vacina') or die ("Erro na conexão.");

				$tabela = mysqli_query($con, $nome_vacina);

				while ($tabela_vacina = mysqli_fetch_array($tabela)){ ?>
					<option class="fonte" value = "<?php echo $tabela_vacina['nome']; ?>"> <?php echo $tabela_vacina['nome']; ?> </option>
			<?php } ?>
		</select> 
		
		<div class="input-field">
		<label class="black-text fonte"> Quantidade de ampolas </label><input type="number" class="fonte" name="qtd_ampola"/><br></div>

		<div class="input-field">
		<label class="black-text  fonte"> Volume de cada ampola (em ml)</label> <input type="number" class="fonte" name="ml_ampola"/><br></div>
		
		
		

		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
			
		<script type="text/javascript">
			$(document).ready(function() {
				$('select').material_select();
			});
		</script>
		
		<center><button class="btn waves-effect waves-light green darken-2" type="submit">Enviar<i class="material-icons right">send</i></button></center><br>
        
		
	</form>
	</div>

</body>
<?php

	} //fechando o if
	else {
		$_SESSION["pagina"] = "tela-busca.php";
		$_SESSION["falha"] = "Você precisa realizar seu login";
		header("location: ../pagina-inicial.php");
	}
?>
</html>

