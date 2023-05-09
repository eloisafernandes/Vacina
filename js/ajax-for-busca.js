$(function(){
	//sempre vai ser execultado quando tiver algo no input com id "pesquisa"
	$("#pesquisa").keyup(function(){
		var pesquisa = $(this).val();
		if (pesquisa != ' ') { //se pesquisa tiver algo ou seja na barra de pesquisa
			var dados = {palavra : pesquisa} //varivel palavra recebe o conteudo de pesquisa
			$.post('../telas/funcionario/execultar-busca.php', dados, function(retorna){ /*retorna é uma variável
				que recebe o conteudo do if ou do else do arquivo execultar-busca.php*/
				//mostra na lista
				$('.resultado').html(retorna); 
			});
		}else{
			$('.resultado').html(' ');
		}
	});
});