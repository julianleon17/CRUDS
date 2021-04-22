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
  	
    	if ( !( $id > ( $totalData -1 ) ) ) {
    		
    		$productExists = true;
    		   	    		
    		$singleField = extract_data( $allArray, $id, $dictionaryData, $toDelete );
    		$singleField['description'] = str_replace( "\n", "</br>", $singleField['description'] );
    		
    		$template = return_data_on_template( $singleField, $template, $dictionaryTemplate, $dictionaryData );		

    		echo $template;
    		    	      	   	
    	}else{
    		
      	echo 'Este ' . $pluralTheme . ' NO existe!' ;    
    	}
  	}
  	
  	
  	  	
  	//Valida los botones
  	if ( !$productExists ){  
  	
  	}else{

    	create_button( "../update/edit.php?id=$id" , 'Editar' ); 
    	create_button( "../delete/confirm-user.php?id=$id" , 'Eliminar' , 'delete'); 
    	
  	} 
  	
  	create_button( "../read/list.php" , 'Volver al Listado' );
	?>

</body>
</html>

