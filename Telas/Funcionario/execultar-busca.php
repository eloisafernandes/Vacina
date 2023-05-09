<?php 
	session_start();
	unset($_SESSION["edicao"]);
	unset($_SESSION["erro"]);
	$logado = isset($_SESSION["logado"]) ? $_SESSION["logado"] : '';

	if ($logado){
			
	
	
 ?>
<html>
<head>
	  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	  <link rel="icon" href="../../css/logo5.png"/>

	<title>Buscar</title>
	
	<link rel="stylesheet" type="text/css" href="../../css/estilo.css">
 	<link rel="stylesheet" type="text/css" href="../../css/cadstro.css">

</head>
<body style="background-color: #f2f2f2;">
	<?php 
	
		//incluir conexao ao banco
		include_once('../conexao.php');

		//recuperar o valor da palavra
		$nome = $_POST['palavra'];

		//procurar no bdd
		$nome = "select * from pessoa where nome like '%$nome%' ";
		$resultado = mysqli_query($con, $nome);

		if (mysqli_num_rows($resultado) <= 0) {
			echo "Registro não identificado!";
		}else{?>
			<table class="">
			<?php while($rows = mysqli_fetch_array($resultado)){?>
				
					<thead>
						<th class="fonte">Acessar</th>
						<th class="fonte"> Pessoa </th>
						<th class="fonte">Cartão do sus</th>
						<th class="fonte"> Ações</th>
						
					</thead>
					
					<tbody>
						<tr>
							<td><a id="btn_acessar" href='tela-pessoa.php?id=<?php echo $rows["cart_sus"] ?>' class="fonte btn-floating btn-tiny waves-effect waves-light green darken-2"><i class="material-icons">search</i></a></td>

							
							<?php $_SESSION["pessoa"] = $rows["cart_sus"]; ?>
								

							</script>
							<td> <p class="fonte"> <?php echo $rows['nome']?> </p></td>
							<td> <p id="" class="fonte"> <?php echo $rows["cart_sus"]?> </p></td>

							<td>
                                <a class=" fonte grey lighten-1 btn-floating green" href="tela-editar.php?cart=<?php echo $rows['cart_sus']?>"><i class="material-icons">edit</i></a>



                                
                                <a class="btn-floating red"><i class="material-icons">delete</i></a>
                            </td>
						</tr>
					</tbody>
				<?php } ?>	
			</table>
		<?php } ?>
</body>
<?php
	} //fechando o if
	else {
		$_SESSION["pagina"] = "Funcionario/execultar-busca.php";
		$_SESSION["falha"] = "Você precisa realizar seu login";
		header("location: ../pagina-inicial.php");
	}
?>
</html>
