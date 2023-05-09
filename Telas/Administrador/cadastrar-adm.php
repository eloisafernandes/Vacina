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
	<title class="fonte">Funcionário</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
   <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../../css/estilo.css">
	
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../../css/cadstro.css">	

	<script> 
		function Validar_cadastro(){
			var usuario = document.getElementById("usuario").value;
			var senha = document.getElementById("senha").value;
			alert(usuario);
			var exp_num = /\d/g;

			if (exp_num.test(usuario)){
				return false;

			}



		}
	<?php
		
	?>
</script>

</head>
<body style="background: #eeeeee; margin:30px;"> 
	<div class="row">
		<div class="col s12 m8 l6 offset-m3 offset-l3 "> 
			<div ><?php 
				session_start();
				$msg = isset($_SESSION["msg"]) ? $_SESSION["msg"] : '';

				if ($msg) {  
					$text = $_SESSION["msg"];

					if ($text == 'Cadastro realizado!'){ ?>
						<p style="padding: 5px;" class="fonte card panel green darken-4 white-text z-depth-0"><?php echo $_SESSION["msg"]; ?> </p> <?php } 


					 else { ?>
						<p style="padding: 5px;" class="fonte card panel red darken-4 white-text z-depth-0"><?php echo $_SESSION["msg"];  ?> </p> <?php }  } ?>
					
			</div>
		</div>
		<div class="row" >
		<div class="card-panel col s12 m8 l6 offset-m3 offset-l3 grey lighten-2" id="borda">
			<br>
			<CENTER><h4 class="fonte">CADASTRAR FUNCIONÁRIO</h4></CENTER>
			<form method="POST" action="inserir-adm.php">
			<DIV class="input-field"
			>
			<label class="black-text fonte">Usuário </label> 
			<input class="input-estilo" id ="usuario" type="text" name="usuario"></DIV>
			<DIV class="input-field"
			><label class="black-text fonte">Senha</label>
			<input class="input-estilo" id="senha" type="password" name="senha"></DIV>
			<label class="black-text fonte">Tipo funcionário</label>
			<SELECT class="active" name="tipo_funcionario">
				<OPTION VALUE=2 class="fonte">Administrador</OPTION>
				<OPTION VALUE=1 class="fonte">Funcionário</OPTION>
			</SELECT>
			<br>

			<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
			
			<script type="text/javascript">
				$(document).ready(function() {
					$('select').material_select();
				});
			</script>
							
				
			
			<center>
				
				 <a href="tela-acoes.php" class="fonte btn waves-effect waves-light green darken-2
" type="submit" >Voltar<i class="material-icons right">undo</i>
				</a>
  		
  				<button class=" fonte btn waves-effect waves-light green darken-2
" type="submit" name="action"><i class="material-icons right" onClick="Validar_cadastro()">send</i>Cadastrar</button>

  			</center><br>
  		</form>
  			
	
		</div>
	</div>
<?php 
?>
	
</body>
<?php
	}
	else {
    $_SESSION["falha"] = "Você precisa realizar login no sistema";
	 $_SESSION["pagina"] = 'administrador/tela-acoes.php';
		header("location:../pagina-inicial.php");


	}
?>
</html>