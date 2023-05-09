<?php
	session_start();
	$_SESSION['edicao'] = '';
	$nome = $_POST["nome"];
	$data_nasc= $_POST['data_nasc'];
	$rua = $_POST["rua"];
	$cpf = $_POST["cpf"];
	$rg = $_POST["rg"];
	$cart_sus = $_POST["cart_sus"];
	$numero = $_POST["numero"];
	$telefone = $_POST["telefone"];
	$bairro = $_POST["bairro"];
	$cidade = $_POST["cidade"];
	$data_nasc = $_POST["data_nasc"];
	$prontuario = $_POST["prontuario"];

	$editar = "update pessoa set cart_sus = '$cart_sus', cpf = '$cpf', rg = '$rg', nome = '$nome', rua = '$rua', numero = '$numero', bairro = '$bairro', cidade = '$cidade', telefone = '$telefone', data_nasc = '$data_nasc', prontuario = '$prontuario' where cart_sus = '$cart_sus' or cpf ='$cpf' or rg = '$rg'";
	include ('../conexao.php');

	$resultado = mysqli_query($con, $editar);
	if ($resultado){
		$_SESSION["edicao"] = "Editado com sucesso";
		header("location: tela-busca.php");
	
	}
	else{
		$_SESSION["edicao"] = "Edição não realizada cheque os campos ";
	}

?>