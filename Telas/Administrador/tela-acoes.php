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
	<link rel="icon" href="logo5.png"/>
  <link rel="stylesheet" type="text/css" href="../../css/estilo.css">
  <link rel="stylesheet" type="text/css" href="../../css/cadstro.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
   <meta charset="utf-8">
  


	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<title>Administração</title>
</head>
<body style="background: #f2f2f2; margin:30px;">
    <center><h4 class="fonte">Bem-vindo</h4></center>
	 <div class="row">
        <div class="col s12 m8 l3 offset-l3 offset-m2" >
          <div class="fonte card grey lighten-1" id="borda">
            <div class="card-content white-text" >
              <img src="../../css/user.png" class="responsive-img">
              <span class="card-title fonte-black">Cadastrar funcionário</span>
              <p style="color: #424242">Cadastrar um usuario 
              </p>
            </div>
            <div class="card-action" id="borda">
             	<center><a class="fonte waves-effect waves-light btn green darken-2" href="cadastrar-adm.php"><i class="material-icons">assignment_ind</i> Cadastrar</a></center>
            </div>
          </div>
        </div>

        <div class="col s12 m8 l3 offset-m2" >
          <div class="fonte card grey lighten-1" id="borda">
            <div class="card-content white-text" >
            	<img src="../../css/news.png" class="responsive-img">
              <span class="card-title fonte-black ">Atualizar portal</span>
              <p style="color: #424242;">Atualizar campanhas e noticias.</p>
            </div>
            <div class="card-action" id="borda">
              <center><a class="waves-effect waves-light btn green darken-2" href="tela-noticia.php"><i class="material-icons">chrome_reader_mode</i> Direcionar</a></center>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
		<center><div class="col s8 m2 l2 offset-m5 offset-l5 offset-s2">
			<a style="border-radius: 10px;" href="../funcionario/sair.php" class="fonte btn waves-effect waves-light  red darken-1" type="submit" >Sair
			</a>
		</div></center>
	</div>

       


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