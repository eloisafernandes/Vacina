<?php
	session_start();
	$usuario = $_POST["usuario"];
	$senha = $_POST["senha"];
	$pagina = isset($_SESSION['pagina']) ? $_SESSION["pagina"] : 'tela-busca.php';
	$con = mysqli_connect("127.0.0.1", "root", "", "vacina") or die ("Erro na aplicação.");
	$consulta = "select * from adm where usuario = '$usuario' and senha='$senha'";

	$result = mysqli_query($con, $consulta);

	if (mysqli_num_rows($result)>0){
		$tabela = mysqli_fetch_array($result);
		echo ($tabela["tipo_funcionario"]);
		if ($tabela["tipo_funcionario"] == 2){
			$_SESSION["tipo"] = true;
			$_SESSION["logado-adm"] = true;
			header('location: administrador/tela-acoes.php');
		}
		if ($tabela["tipo_funcionario"] == 1){
			$_SESSION['logado'] = true;
			header('location: funcionario/inicio-portal.php');
			$_SESSION["falha"] = "";
		}
		
	}
	else{
		$_SESSION["usuario"]  = $usuario;
		$_SESSION["senha"]  = "";
		$_SESSION["falha"] = "Login ou senha inválido!";
		header('location:pagina-inicial.php');

	}
		

?>