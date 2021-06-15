<?php
  require_once( "../read/read.php" );
  $id = $_GET['id'];

  $data = $_POST['data'];
	
  //update and sanitize Data 
  $data = sanitize_data( $data );

  $newData = package_to_update( $data, $lineSeparator );
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
        update_data( $allArray, $filename, $arraySeparator );

        //Template
        $template = return_data_on_template( $data, $urlTemplate, $wildcards );

        echo $template;;

        create_button( "../read/show.php?id=$id", 'Ver nuevos datos' );
   	  }
	}else{
      echo 'El archivo de ' . $pluralTheme . ' NO existe! ';
      create_button( "../index.php" , "Volver al Inicio" );
	}
	
	
	?>
            
</body>
</html>
