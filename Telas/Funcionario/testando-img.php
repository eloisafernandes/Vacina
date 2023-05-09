<?php include("../conexao.php");
 	 	
 	 	$select = "select *  from arquivo"; 
 	 	$tabela = mysqli_query($con, $select);?>
 	 	
 	 	<?php
 	 	while ($table = mysqli_fetch_array($tabela)){?>
 	 				<div>
			        <div class="col s12 m6 l3">

			          <div class="card green darken-2">
			          	<?php if ($table['arquivo'] != null ){ ?>
			          	<img style="width: 100%; height: 30%" src="../administrador/upload/<?php echo $table['arquivo'] ?>">
			            </div> 
			<?php }} ?>