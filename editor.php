<?php
	//editor dos documentos
	//--------------------------------------------	
	//importar o css
		include 'estylos.php';	

	//abertura do corpo
	echo '<div class="corpo">';
	//titulo do quadro de edição dos documentos
	echo '<h2 id="h2_editor">Editor de Documentos</h2><hr>';	

	//verificar se foi introduzido um nome ao documento
	
	$documento = "";
	if(isset($_REQUEST['nome_documento'])){
		$documento = $_REQUEST['nome_documento'];
			//------------------------------------------
			//verifica se foi introduzido nome valida
			if(strlen($documento)<3){
				
				echo '<br><p>nome muito curso</p>';			
				echo '<br><a href="index.php">Voltar</a>';			
				
				include 'rodape.php';	
				exit;			
			}
			//---------------------------------------------
			//verificar se o utilizador introduz o termo '.txt' no fim do arquivo
			//documento txt 			
			$extersao = substr($documento,strlen($documento)-4);
			if($extersao != '.txt'){
				$documento .='.txt';			
							
			}

			//verificar se existe um documento com o mesmo nome
			//NOTA:so acontece esta verificação, quanto estar a ser criada um novo documento
			if(!isset($_REQUEST['editar'])){
				//verificar se existe o documento
				if(file_exists("documentos/".$documento)){
					echo '<br><p>ja existe um documento com o mesmo nome</p>';
					echo '<br><a href="index.php">Voltar</a>';				
					include 'rodape.php';
					exit;				
				}	
				
			}
			//apresentar o nome do documento
			echo '<div class="nome_documento">Documento: <span">'.$documento.'</span></div>';	
				
	}else{
		echo '<br><p>Aconteseu um erro inesperado</p>';
		echo '<br><a href="index.php">Voltar</a>';				
		include 'rodape.php';
		exit;				
				
	}
	
	//verifica apresentação do texto
	$texto = '';
	$editar = false;
	if(file_exists('documentos/'.$documento)){
		$texto = implode(file('documentos/'.$documento));	
		$editar = true;	
	}	
	
	//-------------------------------------------------------------------
	//apresenta o formulario para editar/inserir o texto
	echo 
	'<form name="form_editor" method="post" action="gravar_documento.php">
		<textarea rows=10 cols="80" name="text_documento">'.$texto.'</textarea><br>
		<input type="submit" value="gravar" name="submit">	
		<input type="hidden" name="nome_documento" value="'.$documento.'">	
	</form>';	
		
	if($editar){
		echo '<a href="lista_documentos.php">Voltar</a>';	
	}else{
			echo '<a href="index.php">Voltar</a>';
	}
	//-----------------------------------------------
	//rodape
	include 'rodape.php';
	
	echo '</div>';//fim corpo
?>