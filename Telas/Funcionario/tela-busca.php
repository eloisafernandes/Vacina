<?php 
	session_start();
	unset($_SESSION["erro"]);
	$logado = isset($_SESSION["logado"]) ? $_SESSION["logado"] : '';

	if ($logado){
			
	
	
 ?>
<!DOCTYPE html>
<html>
<head >
	<title>Buscar</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="../../js/ajax-for-busca.js"></script>
	<link rel="icon" href="../../css/logo5.png"/>
	<link rel="stylesheet" type="text/css" href="../../css/estilo.css">
 	<link rel="stylesheet" type="text/css" href="../../css/cadstro.css">

		

</head>
<body style="background-color: #f2f2f2;">
	<?php
		include('../menu_mobile.html');
	?>
	<div class="row">
		<div class="col s12 m12 l8 offset-l3">
			<div ><?php $msg = isset($_SESSION["edicao"]) ? $_SESSION["edicao"] : '';
			if ($msg) {
				if ($msg == 'Editado com sucesso') { ?> 
					<p style="padding: 5px;" class="fonte card panel green darken-4 white-text z-depth-0">  <?php echo $_SESSION["edicao"];?></p> <?php } 

				else{?>
					<p style="padding: 5px;" class="fonte card panel red darken-4 white-text z-depth-0"><?php echo "Cadastro não realizado";  ?> </p> <?php }  ?>
				<?php } ?>

			</div>


			<div ><?php $msg = isset($_SESSION["msg_cadastro"]) ? $_SESSION["msg_cadastro"] : '';

				if ($msg) {  
					$text = $_SESSION["msg_cadastro"];

					if ($text == 'Cadastro realizado com sucesso!'){ ?>
						<p style="padding: 5px;" class="fonte card panel green darken-4 white-text z-depth-0"><?php echo $_SESSION["msg_cadastro"]; ?> </p> <?php } 


					 else { ?>
						<p style="padding: 5px;" class="fonte card panel red darken-4 white-text z-depth-0"><?php echo $_SESSION["msg_cadastro"];  ?> </p> <?php }  } ?>
					
			</div>
	      	<form method="post" id="formu" action="">
	      		<nav> <!--criar barra de busca: materialize -->
	    			<div class="nav-wrapper grey lighten-3">
	        			<div class=" input-field">
		          			<input type="search"  name="pesquisa"  class="cor-black" id="pesquisa" required>
		          			<label class="label-icon" for="search"><i class="material-icons" style="color:black">search</i></label>
		          			<i class="material-icons">close</i>
		        		</div>
		    		</div>
  				</nav>
  			</form>
		</div>

	</div>
	<div class="row">
		<div class="col s12 m12 l8 offset-l3 resultado">
			<?php
			include ('../conexao.php');
			$select = "select * from pessoa";
			$resultado = mysqli_query($con, $select); ?>
			<table class="">

			<?php while($rows = mysqli_fetch_array($resultado)){?>
				
					<thead>
						<th  class="fonte">Acessar</th>
						<th  class="fonte"> Pessoa </th>
						<th  class="fonte">Cartão do sus</th>
						<th class="fonte">Ações</th>
						
					</thead>
					
					<tbody>
						<tr>
							<td><a id="btn_acessar" href='tela-pessoa.php?id=<?php echo $rows["cart_sus"] ?>' class=" fonte btn-floating btn-tiny waves-effect waves-light green darken-2"><i class="material-icons">search</i></a></td>

							
							<?php $_SESSION["pessoa"] = $rows["cart_sus"]; ?>
								

							</script>
							<td> <p class="fonte "> <?php echo $rows['nome']?> </p></td>
							<td> <p class="fonte " id=""> <?php echo $rows["cart_sus"]?> </p></td>
							<td>
                                <a class="fonte btn-floating grey lighten-1" href="tela-editar.php?cart=<?php echo $rows['cart_sus']?>"><i class="material-icons">edit</i></a>



                                <a href="deletar-pessoa.php?cart=<?php echo $rows['cart_sus']?>" class="btn-floating red"><i class="material-icons">delete</i></a>
                            </td>
						</tr>
					</tbody>
				<?php } ?>	
			</table>
		
		
		
		</div>
		
	</div>
</body>
<?php
	} //fechando o if
	else {
		$_SESSION["pagina"] = "tela-busca.php";
		$_SESSION["falha"] = "Você precisa realizar seu login";
		header("location: ../pagina-inicial.php");
	}
?>
</html>