<?php
	include("../conexao.php");
	$select = "select codigo from conteudo where codigo = (SELECT MAX(CODIGO) FROM CONTEUDO)";
	$tabela = mysqli_query($con, $select);
	while ($linha = mysqli_fetch_array($tabela)) {
		$codigo_conteudo = $linha['codigo'];
	}
	$sql = "insert into arquivo values ($codigo_conteudo, null)";
	$result = mysqli_query($con, $sql);
	if ($result){
			$_SESSION["portal"] = "Portal atualizado.";
			header("location: tela-noticia.php");
			}
			else{
				header("location: tela-noticia.php");
				$_SESSION["portal"] = "Ocorreu algum erro";
			}

	


?>