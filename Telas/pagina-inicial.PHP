<?php
	session_start();
	$logado = isset($_SESSION["logado"]) ? $_SESSION["logado"] : '';
	$pagina =  isset($_SESSION["pagina"]) ? $_SESSION["pagina"] : 'tela-busca.php';
	if ($logado){
		header("location:".$pagina);
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Vacina++</title>
	<meta charset="UTF-8">
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projecti"/>
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="icon" type="icon" href="logo5.png">
	<!-- Arquivo CSS -->
	<link rel="stylesheet" type="text/css" href="../css/cadstro.css">	
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">	
</head>
	<body class="grey lighten-4">
		<div class="row"> 
			<div class="col s12 m12 l4 offset-l4 grey lighten-2 div1" style="margin-top: 30px;">
				<br>
				<?php
					
					$usuario = isset($_SESSION["usuario"]) ? $_SESSION["usuario"] : '';
					$falha = isset($_SESSION["falha"]) ? $_SESSION["falha"] : '';
					unset($_SESSION["falha"]);
					unset($_SESSION["usuario"]);
				?>
				<div class="col s12 m12 l12">
					<center><img src="logo5.png" class="responsive-img"></center>
					<br>
					<center><p class="fonte" style="font-size: 20px;"><b>Login - Administrador</b></p></center>
					<div><p style="background: red;" class="white-text fonte"> <?php echo $falha; ?></p></div>
					<form action="login.php" method="POST">

						<div  class="input-field"> <!--fiz isso pra os inputs ficar bonitinhos-->
							<input id="last_name" type="text" class="validate fonte" name="usuario">
          						<label for="last_name" class="black-text tamanho fonte">Usuário</label>
						</div>
						<div class="input-field">
							<input type="password" name="senha" required class="fonte">
							<label for="last_name" class="black-text tamanho fonte">Senha</label>
						</div>

						<center><input id='tamanho_button' type="submit" name="botao" class="btn blue darken-2 div2" value="Entrar" ></center>

						<br>
					</form>

					<center><b><a class="green-text text-lighten-3 modal-trigger fonte" href="#usuario">Clique aqui</a></b><a href="#" class="black-text fonte"> para verificar a situação do usuário!</a></center>

					<br>

					<div id="usuario" class="modal">
						<div class="modal-content black-text fonte">
							<center><p class="fonte" style="font-size: 24px;">Situação</p></center>
							<form action="verificar_usuario.php" method="post">
								<div class="input-field">
									<input id="last_name" type="text" class="validate fonte" name="cartaosus">
										<label for="last_name" class="black-text fonte">Cartão do SUS</label>
								</div>
								<div>
									<center><input id='tamanho_button' type="submit" name="botao" class="btn blue darken-2 div2 fonte" value="Verificar" ></center>
								</div>
								<br>
							</form>
						</div>
						<div class="modal-footer fonte">
    							<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat fonte">Fechar</a>
    						</div>
    					</div>
				</div>		
			</div>
		</div>

		<footer class="page-footer grey darken-4">
			<div class="container">
            			<div class="row">
              			<div class="col l6 s12">
                				<h5 class="white-text"></h5>
                				<p class="grey-text text-lighten-4 fonte">Todos os direitos reservados.</p>
              			</div>
              			<div class="col l4 offset-l2 s12">
                				<h5 class="white-text fonte">Conheça</h5>
                				<ul>
                  				<li><a class="grey-text text-lighten-3 modal-trigger fonte" href="#projeto">Sobre o projeto.</a></li>
							<li><a class="grey-text text-lighten-3 modal-trigger fonte" href="#des">Desenvolvedores.</a></li>

							<div id="projeto" class="modal">
								<div class="modal-content black-text fonte">
    									<h4>Vacina++</h4>
    									<p>O projeto Vacina++ é o produto do Projeto Integrador, matéria desenvolvida dentro do IFRN. Consiste em um sistema de controle de vacinas onde o usuário pode verificar seu cartão de vacina online e também realizar uma nova vacinação. Também é possível controlar o estoque de vacinas e cadastrar no banco uma nova vacina.</p>
    								</div>
    								<div class="modal-footer fonte">
    									<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat fonte">Fechar</a>
    								</div>
    							</div>

    							<div id="des" class="modal">
    								<div class="modal-content black-text fonte">
    									<table class="bordered">
    										<thead>
    											<th>Nome</th>
    											<th>Email</th>
    										</thead>
    										<tbody>
    											<tr>
      												<td>Alana Gabriela</td>
      												<td>alana_gabriela@outlook.com</td>
      											</tr>
      											<tr>
      												<td>Eloisa Mederios</td>
      												<td>eloisafer@gmail.com</td>
      											</tr>
      											<tr>
      												<td>Luan Henrique</td>
      												<td>luanhmd215@gmail.com</td>
      											</tr>
      											<tr>
      												<td>Pablo Vespúcio</td>
      												<td>pablovespucio13@gmail.com</td>
      											</tr>
    										</tbody>
    									</table>
    									<p class="font">Nós todos cursamos o 3º ano de informática no IFRN - Campus Caicó.</p>
    								</div>
    								<div class="modal-footer fonte">
    									<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat fonte">Fechar</a>
    								</div>
    							</div>
                				</ul>
              			</div>
            			</div>
          		</div>
          		<div class="footer-copyright black">
            			<div class="container fonte">
           				<center><b>Vacina++</b> | <b>2017</b> | <b>IFRN - Campus Caicó</b></center>
            			</div>
          		</div>
       	</footer>


		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="materialize/js/materialize.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
    				$('.modal').modal();
  			});
		</script>
	</body>
</html>