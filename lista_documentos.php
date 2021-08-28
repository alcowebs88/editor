<?php
	//-------------------------------------------
	//lista dos documentos
	//--------------------------------------------
		
	//importar o css
	include 'estylos.php';	

	//abertura do corpo
	echo '<div class="corpo">';
	//titulo do quadro de edição dos documentos
	echo '<h2 id="h2_lista_documentos">Lista de Documentos</h2><hr>';	
	//------------------------------------------------------------
	
	//apagar documento
	if(isset($_REQUEST['delete'])){
		$file = $_REQUEST['delete'];
		if($file!=null){
			if(file_exists('documentos/'.$file)){		
				unlink('documentos/'.$file);
			}
		}
	}	
	//apresenta documentos disponiveis

	$file = scandir('documentos/');
	
	
	//----------------------------
	//sem documentos
	if(count($file)==2){
		echo '<div id="nenhum_documento">nenhum documento encontrado!!! </div>';	
	}
			echo '<div class="corpo_lista">';			
	foreach($file as $doc){
		if($doc !='.' && $doc !='..'){
			echo '<div class="arquivo">';
			echo '<a href="editor.php?nome_documento='.$doc.'&editar=1">editar</a> | ';
			echo '<a href="lista_documentos.php?delete='.$doc.'">apagar </a> | ';
			echo "<strong>$doc</strong>";				
			
			//tamanho do arquivo 
		$tam = filesize('documentos/'.$doc)/100;
		echo '<small>('.$tam.'KB)</small>';
				
		//data de modificação do arquivo
		$data = fileatime('documentos/'.$doc);			
		echo '<small>('.date('d-m-Y',$data).')</small>';	
		echo '</div>';		
		
		echo '</div>';		
		}
		
	}	
	
	echo '<a href="index.php">Voltar</a>';

	//-----------------------------------------------
	//rodape
	include 'rodape.php';
	
	echo '</div>';//fim corpo
?>