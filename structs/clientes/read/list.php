<?php
  require_once( 'read.php' ); // Model
  
 // View :
?>

<?php  create_header_of_page( 'Clientes' );  ?>
<body>
    <h1>Listado de Clientes</h1>
    
    <?php
  		if ( !$fileExists ) {
      		echo 'El archivo de "Clientes" NO existe!';
  		} else if ( empty( $totalData ) ) {
      		echo 'No se han encontrado "Clientes"!';
  		} else {
  		
      		print_listClients( $filename , $totalData );
   		}           
   		
   		
   		
       //Valida el boton    
       if( $fileExists ) { 
       
         create_button( "../delete/confirm-historial.php" , 'Eliminar Lista' ); 
        }
        
       create_button( "../index.html" , 'Volver al Inicio' );    
    ?>
            
</body>
</html>
