<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../../css/estilo.css">
 	<link rel="stylesheet" type="text/css" href="../../css/cadstro.css">
</head>
<body>
	<?php 
	include ("../conexao.php");
	session_start();
	$cart_sus = $_GET['cart']; 
	$delete = "delete from pessoa where cart_sus = $cart_sus";
	$result = mysqli_query($con, $delete);
	if ($result){
		$_SESSION["edicao"] = "Pessoa deletada com sucesso";
		header("location: tela-busca.php");

	}
	else{
		$_SESSION["edicao"] = "Ops! Erro ao excluir.";
		header("location: tela-busca.php");

	}
	?>

</body>
</html>
