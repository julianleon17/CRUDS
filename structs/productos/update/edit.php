<?php
  require_once("../read/read.php");
  $id = $_GET['id'];
  
//===============

create_header_of_page( "Editar $singularTheme" );  

?>
<body>
	<?php
  	
  	if ( $fileExists ) {
     	
     	if ( $id > $totalData ) {
     	
       	echo 'Este ' . $tema . ' NO existe!' ;    
       	create_button( "../index.html" , 'Volver al Inicio' );
     	
     	}else{
  	
       	form_to_update( $allArray, $id, $dictionaryData, $toDelete, $lineSeparator, $singularTheme );
       	create_button( "../read/show.php?id=$id" , 'Cancelar' );
     	}
  	}else{
  	
    	create_button( "../index.php" , 'Volver al Inicio' );
    	
  	}
	?>
	
</body>
</html>
  
