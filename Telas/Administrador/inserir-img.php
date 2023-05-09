<?php
	INCLUDE ("../conexao.php");
	session_start();
	if (isset($_FILES['arquivo'])){
		
		$extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
		$novo_nome = md5(time()).$extensao;
		
		$diretorio = "upload/";
		
		$select = "select codigo from conteudo where codigo = (SELECT MAX(CODIGO) FROM CONTEUDO)";
		$tabela = mysqli_query($con, $select);
		while ($linha = mysqli_fetch_array($tabela)) {
			$codigo_conteudo = $linha['codigo'];
		}
		if ($extensao == '.jpg' or $extensao == '.png' or $extensao == '.jpeg' or $extensao == '.gif'){
			$sql = "insert into arquivo values ($codigo_conteudo, '$novo_nome')";
			$result = mysqli_query($con, $sql);
			if ($result){

				move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);
				$_SESSION["portal"] = "Portal atualizado.";
				header("location: tela-noticia.php");
			}
			else{
				header("location: tela-noticia.php");
				$_SESSION["portal"] = "Ocorreu algum erro";
			}
		}
		
		

	}

?>