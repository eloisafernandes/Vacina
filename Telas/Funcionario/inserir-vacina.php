<?php
	session_start();
	$nome = $_POST["nome"];
	$qt_vacinas = $_POST["qt_vacinas"];
	$qt_dosagem = $_POST ["qt_dosagem"];

	$_SESSION['erro']= '';
	$_SESSION["nome"] = $nome;
	$_SESSION["qtd_vacinas"] = $qt_vacinas;
	$_SESSION["qtd_dosagens"] = $qt_dosagem;
	

	$con = mysqli_connect("127.0.0.1", "root", "", "vacina") or die ("Falha na conexão");
	$select = "select nome from vacinas where '$nome' = nome";
	$nome_vacina = mysqli_query($con, $select);

	$num_row = mysqli_num_rows($nome_vacina);
	
	if ( $num_row > 0){
		$_SESSION['erro'] = 'Essa vacina já foi cadastrada.';
		header('location: tela_cadastro-vacina.php');
		
		

	}
	
	else {
		$insert = "insert into vacinas values ('$nome', $qt_vacinas, $qt_dosagem, null)";
		$inserido = mysqli_query($con, $insert);
		if ($inserido){
			$_SESSION["erro"] =  'Vacina cadastrada!';

			$_SESSION["nome"] = '';
			$_SESSION["qtd_vacinas"] = '';
			$_SESSION["qtd_dosagens"] = '';
			header('location: tela_cadastro-vacina.php');
			
	
			


		}
		
	}

?>