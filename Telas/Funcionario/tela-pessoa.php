<?php 
	session_start();
	unset($_SESSION["edicao"]);
	unset($_SESSION["erro"]);
	unset($_SESSION["msg_cadastro"]);
	unset($_SESSION["recado"]);
	
	
	$logado = isset($_SESSION["logado"]) ? $_SESSION["logado"] : '';

	if ($logado){
			
	
	
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="../../css/estilo.css">
 	<link rel="stylesheet" type="text/css" href="../../css/cadstro.css">
	
</head>
<body style="background-color: #f2f2f2;">
	
	<?php
		
		//pega o valor da sessão (contém o número do cartão do sus) iniciada no arquivo execultar-vacina 
		$cartsus_pessoa = $_GET['id'];
		
		$select = "select * from pessoa where cart_sus = $cartsus_pessoa";
		$con = mysqli_connect("127.0.0.1", "root", "", "vacina") or die ("Falha na conexão!");
		$tabela_pessoa = mysqli_query($con, $select);
		include("../menu_mobile.html");
		?> 

		
		

		<?php while ($dados = mysqli_fetch_array($tabela_pessoa)){ ?> 
			<br>
			
			<div class="card-panel grey lighten-2 col s12 m12 l6 offset-l4 ">
				
			
					<h5 id="cor_fonte" class="fonte"> Dados pessoais </h5>
				
				
					<!-- Exibe um label com os dados correspondentes -->
					<div class="row">
					<div class="col s12 l12 m12"> 
						<label id="fonte-big fonte"> Nome: </label>  <?php echo $dados["nome"]; ?> 
					</div></div>

					<div class="row">
					<div class="col s12 l6 m12">
						<label id="fonte-big fonte">N° do cartão do SUS:</label> 
							<?php echo $dados["cart_sus"]; ?> 
					</div>
					<div class="col s12 l6 m12">
						<label id="fonte-big fonte"> N° do CPF: </label>
							 <?php echo $dados["cpf"]; ?>
					</div> 
					</div>
					<div class="row">
					<div class="col s12 l4 m12">
						<label id="fonte-big fonte"> N° do RG: </label> 
						 <?php echo $dados ["rg"] ?> 
						
					</div>
					<div class="col s12 l5 m12">
						<label id="fonte-big fonte"> Data de nascimento: </label> 
						 <?php echo date('d/m/Y', strtotime($dados["data_nasc"])); ?>  
					</div>
					<div class="col s12 l2 m12">
						<label id="fonte-big fonte">Prontuário:</label> 
						<?php echo $dados ["prontuario"] ?> 
					</td>
					</div></div>
					

 
					<h5 class="fonte">Endereço</h5>
					
					<div class="row">

					<div class="col s12 l4 m12">
					 <label id="fonte-big fonte">Rua: </label> 
						<?php echo $dados["rua"]; ?></div>
					<div class="col s12 l2 m12">
						<label id="fonte-big fonte">N°: </label> 
						<?php echo $dados["numero"]; ?> </div>
					
					<div class="col s12 l3 m12">
						<label id="fonte-big fonte">Bairro: </label><?php echo $dados["bairro"]; ?> 	
					</div>
					<div class="col s12 l3 m12">
						<label id="fonte-big fonte">Cidade: </label><?php echo $dados["cidade"]; ?> 
					</div>
				</div>
			
				
					<h5 id="cor_fonte" class="fonte"> Contato</h5>
				
					<div class="row">
						<div class="col s12 m12 l6">
					<label id="fonte-big fonte">Telefone: </label> <?php echo $dados["telefone"]; ?></div></div>
			</div>
	
	<div class="row">
		<div class="col s12 m12 l6 offset-l4">
			<h5 id="cor_fonte" class="fonte"> Vacinas aplicadas </h5>
			<table class="striped">
			<thead><tr>
				<td><b class="fonte"> Tipo </b> </td>
				<td><b class="fonte">Data</b></td>
			</tr></thead>
			<tbody>
			<!-- select de todas as vacinas aplicadas -->
			<?php
				$select = "select v.codvacina, vaci.nome as nome_vacina, v.cart_sus, p.nome, v.data_vacina 
								from vacinacao v, pessoa p, vacinas vaci
								where v.cart_sus = $cartsus_pessoa and v.cart_sus = p.cart_sus and v.codvacina = vaci.codigo order by vaci.nome";

				$tabela_vacinacao = mysqli_query($con, $select);
				//se existir alguma vacina aplicada, execulta a função de exibição
				if ($tabela_vacinacao){
					while ($vacina = mysqli_fetch_array($tabela_vacinacao)) { ?>
						<!--tipo da vacina + data que foi tomada -->
						<tr>
							<td> <p class="fonte"> <?php echo $vacina["nome_vacina"]."<br>"?></p>  </td>
							<td><p class="fonte"> <?php echo date('d/m/Y', strtotime($vacina["data_vacina"]))."<br>" ?></p> 
							</td>
						</tr>
					<?php }
				}
			
				else{ ?>
					<a class="fonte"> Não foi possivel realizar essa colsulta! </a>
				<?php } }?>
		</table>
			

		</div>
	</div>
	<?php

	} //fechando o if
	else {
		$_SESSION["pagina"] = "tela-busca.php";
		$_SESSION["falha"] = "Você precisa realizar seu login";
		header("location: ../pagina-inicial.php");
	}
?>
	
			
				
</body>
</html>