<?php 
 
 
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../css/estilo.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../css/cadstro.css">

</head>
<body>
    <div class="row">

        <ul id="slide-out" class="side-nav fixed grey darken-4">
          <br>
          <center><a href="inicio-portal.php"><img  class= "responsive-img" src="logo5.png"></a></center>
          <li><a id = "cor" class="fonte" href="tela-busca.php">Buscar por paciente</a></li>
          <li class="dropdown " data-activates='dropdown1'>
            <a class="fonte dropdown white-text" >Realizar Cadastro</a>
             <ul id='dropdown1' class='dropdown-content'>
                <li><a class="fonte" href="tela_cadastro-vacina.php">Vacina</a></li>
                <li><a class="fonte" href="tela_cadastro-pessoa.php">Pessoa</a></li>
                
              </ul>
          </li>
          <li><a id = "cor" class="fonte" href="tela-estoque.php">Monitorar estoque</a></li>
          <li><a id = "cor" class="fonte" href="tela-vacinacao.php">Registrar vacinação</a></li>
          <br><br><br><br>
          <li><a style="color: red" href="sair.php" class="fonte waves-effect waves-light btn grey darken-4 z-depth-0">Sair</a></li>
        </ul>

        <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>


        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
        
        <script type="text/javascript">
           $(".button-collapse").sideNav();
        </script>
        <script type="text/javascript">
         $('.dropdown').dropdown({
            inDuration: 300,
            outDuration: 225,
            constrainWidth: false, // Does not change width of dropdown to that of the activator
            hover: true, // Activate on hover
            gutter: 0, // Spacing from edge
            belowOrigin: false, // Displays dropdown below the button
            alignment: 'left', // Displays dropdown with edge aligned to the left of button
            stopPropagation: false // Stops event propagation
          }
        );
        </script>

</body>
</html>