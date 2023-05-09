<?php
	
	session_start();
	$_SESSION["msg_cadastro"] = '';
	$con = mysqli_connect("127.0.0.1", "root", "", "vacina") or die ("Falha na conexão");

	$cpf = mysqli_real_escape_string($con, $_POST["cpf"]); //salva na variavel o que o usuário digitou
	if (empty($_POST["cpf"])) { //verifica se o usuário digitou algo
		$_SESSION['cpf_null'] = "*<br>"; //variável para dizer que obrigatório 
		$redirecionar = 'http://localhost/sistema-vacina/telas/funcionario/tela_cadastro-pessoa.php'; //não deixa cadastrar caso o usuário não tenha digitado nada
		echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$redirecionar'>"; //redireciona para a pagina
	}else{
		$_SESSION['valor_cpf'] = $_POST["cpf"];
	}
	$prontuario = mysqli_real_escape_string($con, $_POST["prontuario"]); //salva na variavel o que o usuário digitou
	if (empty($_POST["prontuario"])) { //verifica se o usuário digitou algo
		$_SESSION['prontuario_null'] = "*<br>"; //variável para dizer que obrigatório 
		$redirecionar = 'http://localhost/sistema-vacina/telas/funcionario/tela_cadastro-pessoa.php'; //não deixa cadastrar caso o usuário não tenha digitado nada
		echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$redirecionar'>"; //redireciona para a pagina
	}else{
		$_SESSION['valor_prontuario'] = $_POST["prontuario"];
	}


	$cart_sus = mysqli_real_escape_string($con, $_POST ["cart_sus"]);
	if (empty($_POST["cart_sus"])) {
		$_SESSION['cartsus_null'] = "*<br>";
		$redirecionar = 'http://localhost/sistema-vacina/telas/funcionario/tela_cadastro-pessoa.php';	
		echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$redirecionar'>";
	}else{
		$_SESSION['valor_cartsus'] = $_POST["cart_sus"];
	}

	$nome = mysqli_real_escape_string($con, $_POST ["nome"]); 
	if (empty($_POST["nome"])) {
		$_SESSION['nome_null'] = "*<br>";
		$redirecionar = 'http://localhost/sistema-vacina/telas/funcionario/tela_cadastro-pessoa.php';
		echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$redirecionar'>";
	}else{
		$_SESSION['valor_nome'] = $_POST["nome"];
	}

	$rg = mysqli_real_escape_string($con, $_POST["rg"]);
	if (empty($_POST["rg"])) {
		$_SESSION['rg_null'] = "*<br>";
		$redirecionar = 'http://localhost/sistema-vacina/telas/funcionario/tela_cadastro-pessoa.php';
		echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$redirecionar'>";
	}else{
		$_SESSION['valor_rg'] = $_POST['rg'];
	}

	$rua = mysqli_real_escape_string($con, $_POST["rua"]);
	if (empty($_POST["rua"])) {
		$_SESSION['rua_null'] = "*<br>";
		$redirecionar = 'http://localhost/sistema-vacina/telas/funcionario/tela_cadastro-pessoa.php';
		echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$redirecionar'>";
	}else{
		$_SESSION['valor_rua'] = $_POST['rua'];
	}

	$numero = mysqli_real_escape_string($con, $_POST["numero"]);
	if (empty($_POST["numero"])) {
		$_SESSION['numero_null'] = "*<br>";
		$redirecionar = 'http://localhost/sistema-vacina/telas/funcionario/tela_cadastro-pessoa.php';
		echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$redirecionar'>";
	}else{
		$_SESSION['valor_numero'] = $_POST['numero'];
	}

	$bairro = mysqli_real_escape_string($con, $_POST["bairro"]);
	if (empty($_POST["bairro"])) {
		$_SESSION['bairro_null'] = "*<br>";
		$redirecionar = 'http://localhost/sistema-vacina/telas/funcionario/tela_cadastro-pessoa.php';
		echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$redirecionar'>";
	}else{
		$_SESSION['valor_bairro'] = $_POST['bairro'];
	}

	$cidade = mysqli_real_escape_string($con, $_POST["cidade"]);
	if (empty($_POST["cidade"])) {
		$_SESSION['cidade_null'] = "*<br>";
		$redirecionar = 'http://localhost/sistema-vacina/telas/funcionario/tela_cadastro-pessoa.php';
		echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$redirecionar'>";
	}else{
		$_SESSION['valor_cidade'] = $_POST['cidade'];
	}

	$telefone = mysqli_real_escape_string($con, $_POST["telefone"]);
	if (empty($_POST["telefone"])) {
		$_SESSION['telefone_null'] = "*<br>";
		$redirecionar = 'http://localhost/sistema-vacina/telas/funcionario/tela_cadastro-pessoa.php';
		echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$redirecionar'>";
	}else{
		$_SESSION['valor_telefone'] = $_POST['telefone'];
	}

	$data_nasc = mysqli_real_escape_string($con, $_POST["data_nasc"]);
	if (empty($_POST["data_nasc"])) {
		$_SESSION['datanasc_null'] = "*<br>";
		$redirecionar = 'http://localhost/sistema-vacina/telas/funcionario/tela_cadastro-pessoa.php';
		echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$redirecionar'>";
	}else{
		$_SESSION['valor_datanasc'] = $_POST['data_nasc'];
	}

	//inserindo
	$insert = "insert into pessoa values ('$cart_sus', '$cpf', '$rg', '$nome', '$rua', '$numero','$bairro', '$cidade', '$telefone', '$data_nasc', '$prontuario')";

	$inserindo = mysqli_query($con, $insert);

	if ($inserindo){
		$_SESSION["msg_cadastro"] = 'Cadastro realizado com sucesso!';
		header('location: tela-busca.php');
	}
	mysqli_close($con);
?>