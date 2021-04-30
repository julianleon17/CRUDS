<?php
  require_once( 'read.php' ); // Model
  
 //============================= View :
create_header_of_page( $pluralTheme );  
?>

<body>
    <h1>Listado de <?php echo $pluralTheme; ?> </h1>
    
    <?php
  		if ( !$fileExists ) {
      		echo 'El archivo de "Productos" NO existe!';
  		} else if ( empty( $totalData ) ) {
      		echo 'No se han encontrado "Productos"!';
  		} else {
  		
      		print_list( $filename, $totalData, $searchTo, $pluralTheme, $singularTheme );
   		}           
   		
   		
   		
       //Valida el boton    
       if( $fileExists ) { 
       
         create_button( "../delete/confirm-historial.php" , 'Eliminar Lista' , 'delete' ); 
        }
        
       create_button( "../index.php" , 'Volver al Inicio' );    
    ?>
            
</body>
</html>
