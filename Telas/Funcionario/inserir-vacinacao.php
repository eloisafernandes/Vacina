<?php
	session_start();
	$data = $_POST ["data_vacina"];
	$c_sus = $_POST["cart_sus"];
	$vacina = $_POST["vacina"];
	$_SESSION['recado'] ='';
	
	$con = mysqli_connect('127.0.0.1', "root", "", "vacina") or die ("Não foi possível completar a ação");
	$select_pessoa = "select cart_sus from pessoa where cart_sus = $c_sus";
	$tabela_pessoa = mysqli_query($con, $select_pessoa);
	while ($cod = mysqli_fetch_array($tabela_pessoa)){
			$cart_sus = $cod["cart_sus"];
	}
	if ($cart_sus != false){
		$select_vacina = "select codigo from vacinas where nome = '$vacina'";
		$tabela_vacina = mysqli_query($con, $select_vacina);
		while ($cod = mysqli_fetch_array($tabela_vacina)){
			$codigo_vacina = $cod["codigo"];
		}
		$insert = "insert into vacinacao values($cart_sus, $codigo_vacina, '$data')";

		$inserindo = mysqli_query($con,$insert);
		if ($inserindo){
			$_SESSION['recado'] = "Vacinação registrada!"; 
			header("location: tela-vacinacao.php");
		}
	}
	else{
		$_SESSION['recado'] = 'Pessoa não cadastrada!';
		header("location: tela-vacinacao.php");
	}
	
	

?>