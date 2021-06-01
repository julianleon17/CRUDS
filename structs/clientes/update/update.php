<?php
  require_once( "../read/read.php" );
	$id = $_GET['id'];
	
	$data = $_POST['data'];
	
  //update and sanitize Data 
  $data = sanitize_data( $data, $dictionaryData );  
  $data['name'] = preg_replace( "[1|2|3|4|5|6|7|8|9|0]" , "" , $data['name'] );
  $data['price'] = filter_var( $data[ 'price' ] , FILTER_SANITIZE_NUMBER_INT );
  
  $newData = package_to_update( $data );
//================

create_header_of_page( "$singularTheme Actualizado" );	    
?>


<body>
    
	<?php 
    	
	if ( $fileExists  ) {
	 	
   	if ( $id > $totalData ) {
    	
     	echo $singularTheme . ' NO existente!' ;    
   	}else { 
   	
		  //Replace data  
	   	$allArray[$id] = $newData;
	   	$allArray = array_values( $allArray );
     	update_Base( $allArray, $filename, $arraySeparator , 'Actualizado Exitosamente.' );
     	
     	
     	//Template
     	$template	= str_replace( "Datos del $singularTheme" , "Nuevos datos de $singularTheme" , $template );     
     	
     	$data['description'] = str_replace( "\n", "</br>", $data['description'] );
     	$template = return_data_on_template( $data, $template, $dictionaryTemplate, $dictionaryData );
     	
     	echo $template;
	    create_button( "../read/show.php?id=$id" , "Ver $singularTheme" );
   	}
	} else {
    	
   	echo 'El archivo de ' . $pluralTheme . ' NO existe! ';
   	create_button( "../index.php" , "Volver al Inicio" );
	}
	
	
	?>
            
</body>
</html>
