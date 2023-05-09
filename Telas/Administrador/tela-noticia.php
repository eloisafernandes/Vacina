<?php
	session_start();
  unset($_SESSION['portal']);
	$logado = isset($_SESSION["logado-adm"]) ? $_SESSION["logado-adm"] : '';
  $tipo = isset($_SESSION["tipo"]) ? $_SESSION["tipo"] : '';
  
	if ($logado and $tipo){

?>
<!DOCTYPE html>
<html>
<head>
	<title>Atualização do portal</title>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	  <link rel="stylesheet" type="text/css" href="estilo.css">
	  	<link rel="stylesheet" type="text/css" href="../../cadstro.css">


</head>
<body style="background-color: #f2f2f2 ">
	<div class="row">
		<div class="col s12 m8 l6 offset-m3 offset-l3 "> 
			<div ><?php 
				
				$msg = isset($_SESSION["portal"]) ? $_SESSION["portal"] : '';

				if ($msg) {  
					$text = $_SESSION["portal"];

					if ($text == 'Portal atualizado.'){ ?>
						<p style="padding: 5px;" class="fonte card panel green darken-4 white-text z-depth-0"><?php echo $_SESSION["portal"]; ?> </p> <?php } 


					 else { ?>
						<p style="padding: 5px;" class="fonte card panel red darken-4 white-text z-depth-0"><?php echo $_SESSION["portal"];  ?> </p> <?php }  } ?>
					
			</div>
		</div>
	<form method="post" action="inserir-noticia.php" >
	<div class="row">
		<br><br>

	<div class="card-panel grey lighten-2 col s12 m8 l6  offset-m3 offset-l3"> 
		<center><h4 class="fonte"> ATUALIZAÇÃO DO PORTAL </h4></center>
	<div class='input-field'>
		<label class="fonte">Titulo </label><input  type="text" name="titulo"><br><br></div>
		<div class="input-field"><label class="fonte">Conteudo </label><textarea class="materialize-textarea" id="textarea1" type="text" name="conteudo"></textarea><br><br></div>
		<!--<div class="input-field col s12">
		    <select name="tipo" required>
		      	<option  value="" disabled selected><p class="fonte"> Quem está habilitado a ver essa noticia</p></option>
		      	<option value=1> <P class="fonte">Funcionário </P> </option>
				<option value=2> <p class="fonte"> Paciente </p></option>
				<option value=3> <p class="fonte"> Funcionário e paciente</p></option>
		    </select>
    		<label class="fonte">Visualização</label>
  </div>-->
  		<div class="input-field col s12">
		    <select name="design" required>
		      	<option value="" disabled selected>Design de visualização</option>
		      	<option value=1> Cartão </option>
				<option value=2> Helpers</option>
				
		    </select>
    		<label class="fonte">Design</label>
  </div>
		<center>
  			<a href="tela-acoes.php" class="fonte btn waves-effect waves-light green darken-2
" type="submit" >Voltar<i class="material-icons right">undo</i>
				</a>

  			<button class="fonte btn waves-effect waves-light green darken-2" type="submit" name="action">Enviar
    		<i class="material-icons right">send</i></button>
		</center>
        
        <br>
	

		 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
    			$('input#input_text, textarea#textarea1').characterCounter();
    			$('select').material_select();
  				
            
  			});
		</script>
		 
	</form>
	</div>
	</div>
<?php
	}
	else {
    $_SESSION["falha"] = "Você precisa realizar login no sistema";
	 $_SESSION["pagina"] = 'administrador/tela-acoes.php';
		header("location:../pagina-inicial.php");


	}
?>
</body>

</html>