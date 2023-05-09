<?php 
		session_start();
		$_SESSION['cartaosus'] = $_POST['cartaosus'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Tela Usuário</title>
	<meta charset="UTF-8">
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
 	<link rel="stylesheet" type="text/css" href="../css/cadstro.css">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projecti"/>
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<!-- Arquivo CSS -->
	
</head>
<body>
	<?php

		include ("conexao.php");
		$cartaosus = $_POST['cartaosus'];
		$select = "select * from pessoa where cart_sus = $cartaosus";
		$dados = mysqli_query($con, $select);
		$total = mysqli_num_rows($dados);

		if ($total > 0) {
			header("location:tela-consulta.php?num_cartao=$cartaosus");
		}else{?>
		<center><p class='fonte' style='color:red'>Usuário não encontrado!</p><a href="pagina-inicial.php" style="border-radius: 20px;" class=" waves-effect waves-light btn green darken-2"><i class="material-icons left">undo</i>Voltar</a>
		<?php }?>
	</body>
</html>



