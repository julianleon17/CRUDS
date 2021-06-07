<?php
  require_once('read.php'); //Model
  $id = $_GET[ 'id' ];
 

//=================View :

create_header_of_page( "Datos $singularTheme" );  
?>

<body>
	<?php 
  	
  	if ( !$fileExists ) {
  	
    	echo 'El archivo de ' . $pluralTheme . ' NO existe! ';
    	      	
  	}else{
  	
    	if ( !( $id > ( $totalData - 1 ) ) ) {
				$objectExists = true;
				
    		$singleField = extract_data( $allArray, $id, $dictionaryData, $toDelete, $lineSeparator );
    		
    		$template = return_data_on_template( $singleField, $template, $dictionaryTemplate, $dictionaryData );		
				
    		echo $template;
				
    	}else{
        $objectExists = false;
      	echo $singularTheme . ' NO existente!' ;    
    	}
  	}
  	
  	  	
  	//Valida los botones
  	if ( !$objectExists ){  
  	
  	}else{

    	create_button( "../update/edit.php?id=$id" , 'Editar' ); 
    	create_button( "../delete/confirm-object.php?id=$id" , 'Eliminar' , 'delete'); 
  	} 
  	
  	create_button( "../read/list.php" , 'Volver al Listado' );
	?>

</body>
</html>
