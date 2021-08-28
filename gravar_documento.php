<?php
		//-------------------------		
		//		gravar documento
		//-------------------------
	
	//importar o css
	include 'estylos.php';	

	//abertura do corpo
	echo '<div class="corpo">';
	
	
	//-----------------------------------------------------------------------
	//grava o documento	
	if(isset($_REQUEST['nome_documento'])&& isset($_REQUEST['text_documento'])){
		
		//dados 
		$texto = $_REQUEST['text_documento'];
		$arquivo = $_REQUEST['nome_documento'];
		
		//grava o arquivo		
		$file = fopen('documentos/'.$arquivo,'w');
		fwrite($file,$texto);			
		fclose($file);
		
		//informa que o documento foi gravado com sucesso!!!	
		echo'<p class="gravado_sucesso">dados gravados com sucesso!!!<p>';	
		//voltar 		
		echo '<a href="index.php">Voltar</a>';	
	
	}
	//inserir rodape
	include 'rodape.php';	
	
	echo '</div>';//fim do corpo	
	
	
?>