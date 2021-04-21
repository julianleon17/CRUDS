<?php
  require_once( 'read.php' ); // Model
  
 // View :
create_header_of_page( 'Productos' );  
?>

<body>
    <h1>Listado de Productos</h1>
    
    <?php
  		if ( !$fileExists ) {
      		echo 'El archivo de "Productos" NO existe!';
  		} else if ( empty( $totalData ) ) {
      		echo 'No se han encontrado "Productos"!';
  		} else {
  		
      		print_list_products( $filename , $totalData );
   		}           
   		
   		
   		
       //Valida el boton    
       if( $fileExists ) { 
       
         create_button( "../delete/confirm-historial.php" , 'Eliminar Lista' , 'delete' ); 
        }
        
       create_button( "../index.html" , 'Volver al Inicio' );    
    ?>
            
</body>
</html>
