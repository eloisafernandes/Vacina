<?php
	include("../conexao.php");
	$titulo = $_POST["titulo"];
	$conteudo = $_POST["conteudo"];
	$design = $_POST["design"];
	$insert = "insert into conteudo values ('$titulo', '$conteudo', $design, null)";
	$result = mysqli_query($con, $insert);
	if($result){
		
		header("location: tela-imagem.php");
	}
?>