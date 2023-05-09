<?php
 	session_start();
	$qtd_ampola = $_POST['qtd_ampola'];
	$ml_ampola = $_POST['ml_ampola'];
	$_SESSION['recado1'] = '';
	$vacina = $_POST['vacina'];

	$cond = 0;

	$con = mysqli_connect("127.0.0.1","root","","vacina") or die ("falha na conexão...");

	$select_codvacina = "select v.codigo from vacinas v where nome = '$vacina'";
	$tabela_vacina = mysqli_query($con, $select_codvacina);
	
	if($tabela_vacina){
	while ($vacina = mysqli_fetch_array($tabela_vacina)){
		$cod_vacina = $vacina['codigo'];
	
	}}
	
	$select_cod_estoque = "select * from estoque where codvacina = $cod_vacina";
	$tabela = mysqli_query($con, $select_cod_estoque);

	
	while ($verificar = mysqli_fetch_array($tabela)){
		$ampolas_estoque = $verificar["qtd_ampola"];
		$ml_estoque = $verificar["ml_ampola"];
		$vaci_estoque = $verificar["codvacina"];

		if ($vaci_estoque){
			$cond = 1;
			$ampolas_total = $ampolas_estoque + $qtd_ampola;
			$ml_total = $ml_ampola * $qtd_ampola + $ml_estoque;
			$alter = "update estoque set qtd_ampola = $ampolas_total, ml_ampola = $ml_total where codvacina = $cod_vacina";
			$result = mysqli_query($con, $alter);
			if ($result){
				$_SESSION["msg_estoque"] = "Alterado com sucesso!";
				header("location: tela-estoque.php");
			}
			

		}
		else{
			 $_SESSION["msg_estoque"] ="Houve um erro. ";
			 header("location: tela-estoque.php");
			}
	}
	if ($cond != 1){
		
		$ml_total = $ml_ampola * $qtd_ampola;

		$insert = "insert into estoque values ($qtd_ampola,$ml_total, $cod_vacina) ";
		$result = mysqli_query($con, $insert);
		if ($result){
			$_SESSION["msg_estoque"] = "Estoque atualizado.";
			header("location: tela-estoque.php");
	}}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>