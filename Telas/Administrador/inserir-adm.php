<?php
	session_start();
	$_SESSION["msg"] = '';
	$usuario = $_POST["usuario"];
	$senha = $_POST["senha"];
	$tipo = $_POST["tipo_funcionario"];

	$con = mysqli_connect("127.0.0.1", "root", "", "vacina") or die ("Não foi possível estabelecer a conexão");
	$insert = "insert into adm values ('$usuario', '$senha', $tipo)";

	$result = mysqli_query($con, $insert);

	if ($result){
		$_SESSION["msg"] = "Cadastro realizado!";
		header("location: cadastrar-adm.php");


	}
	else{
		$_SESSION["msg"] = "Essa pessoa já existe no banco";
		header("location: cadastrar-adm.php");
	}


?>