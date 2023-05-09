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
	<title>Upload de arquivo</title>
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	  <link rel="stylesheet" type="text/css" href="estilo.css">
	    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	    <link rel="stylesheet" type="text/css" href="../../cadstro.css">	

	
</head>
<body style="background:#F2F2F2">
	
	<BR><BR>
	<div class="row">
	<br>
	<div class="card-panel grey lighten-2 col s12 l6 m8 offset-l3 offset-m3"> 
		<center><h4 class="fonte black-text"> INSERIR IMAGEM </h4></center>
	<form action="inserir-img.php" method="POST" enctype="multipart/form-data">
    <div class="file-field input-field">
      <div class="btn grey">
        <span class="fonte ">File</span>
        <input name='arquivo'  type="file">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>
		<center><button class="fonte btn waves-effect green darken-2 waves-light" type="submit" name="action">Enviar
    <i class="material-icons right">send</i> </button>

    <a style="margin: 15px;" class="fonte btn waves-effect green darken-2 waves-light" type="submit" href="sem-img.php?foto=null" name="action">Sem imagem
    <i class="material-icons right">send</i>
  </a></center>
  
		
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