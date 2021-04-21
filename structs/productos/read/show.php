<?php
  require_once('read.php'); //Model
  $id = $_GET[ 'id' ];
 


//=================View :

create_header_of_page( 'Datos Producto' );  
?>

<body>
	<?php 
  	
  	if ( !$fileExists ) {
  	
    		echo 'El archivo de ' . $tema . ' NO existe! ';
    	      	
  	}else{
  	
    	if ( !( $id > ( $totalData -1 ) ) ) {
    		
    		$productExists = true;
    		
    		$template = extract_product_data_on_template( $products , $id , $template , $dictionaryTemplate, $toDelete );		
    		
    		echo $template;    	      	   	
    	}else{
    		
      	echo 'Este ' . $tema . ' NO existe!' ;    
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

