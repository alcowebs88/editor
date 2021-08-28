<?php
	//importar o css
	include 'estylos.php';	

	//abertura do corpo
	echo '<div class="corpo">';
	//---------------------------------------------------
	//apresenta o logo
	echo '<img class="logotipo" src = "img/backend.png">';
	
	//------------------------------------------------------------------
	//formulario para criação de novo documento
	echo 
	'<form name = "novo_arquivo" method="post" action="editor.php">
		Novo documento: <input type="text" name = "nome_documento" size="30">		
		<input type="submit" value="Criar documento" name = "btnsumit">
	</form>';
	
	//link para lista de documentos
	echo '<br><a href="lista_documentos.php">lista de documentos</a>';
	//inserir rodape
	include 'rodape.php';	
	
	echo '</div>';//fim do corpo	
	
	
?>
