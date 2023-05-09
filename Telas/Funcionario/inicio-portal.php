<?php 

	session_start();
	unset($_SESSION["edicao"]);
	$logado = isset($_SESSION["logado"]) ? $_SESSION["logado"] : '';

	if ($logado){
			
	
	
 ?>
 <!DOCTYPE html>
 <html>
 <head>
   <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">
  	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  	<meta charset="utf-8">

 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 	<title>Pagina Inicial</title>
 	<link rel="icon" href="../../css/logo5.png"/>
 	
 	<link rel="stylesheet" type="text/css" href="../../css/estilo.css">
 	<link rel="stylesheet" type="text/css" href="../../css/cadstro.css">
 	
 </head>
 <body style="background: #f2f2f2">
 	<?php include("../menu_mobile.html"); ?>

 	<br>

 	 	<div class="col s12 m8 l8 offset-l3 offset-m3">
 	 		<center><h4 class=" card panel  grey lighten-2 fonte " style=" border-radius: 10px;"> PORTAL DE NOTÍCIAS </h4></center>
 	 	<?php include("../conexao.php");

 	 	header('Content-Type: text/html; charset=utf-8');

 	 	
 	 	$select = "select *  from conteudo c, arquivo a where c.codigo = a.codigo order by c.codigo desc"; 
 	 	$tabela = mysqli_query($con, $select);?>
 	 	<div class="row">
 	 	<?php if ($tabela){ ?>
 	 	
 	 	

 	 	 <?php while ($table = mysqli_fetch_array($tabela)){?>
			          
			          	<div  class="col s12 m12 l4 offset-l1 card green darken-2">
			          	<?php 
			          	if ($table['arquivo'] != null ){ ?>

			          		<center><img style="margin: 10px; border-radius: 10px;width: 250px; height: 200px" src="../administrador/upload/<?php echo $table['arquivo'] ?>"> </center>
			            	<div class="card-content white-text">
			              	<span class="card-title fonte"><?php echo utf8_encode($table['titulo']); ?></span>
			              	<h6 class="fonte"><?php echo utf8_encode($table["conteudo"]); ?></h6>
			          	</div> 
			     	  <?php } 
			          else{?>

			          	<div class="card-content white-text">
			              <span class="card-title fonte"><?php echo utf8_encode($table['titulo']); ?></span>
			              <p class="fonte"><?php echo $table["conteudo"]; ?></p>

			            </div> 

			          <?php } ?>
					</div>
			      
      		
 	 			<?php } ?> <?php }	?> 

 	</div>

 	<?php }
 	else {
		$_SESSION["pagina"] = "telas/funcionario/inicio-portal.php";
		$_SESSION["falha"] = "Você precisa realizar seu login";
		header("location: ../pagina-inicial.php");
	}
 	?>
 	

 </body>
 </html>