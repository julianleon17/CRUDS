<?php
  require_once( 'read.php' ); // Model
  
//============================= View :

create_header_of_page( $pluralTheme );  
?>

<body>
    <h1>Listado de <?php echo $pluralTheme; ?> </h1>


<?php
    if( !$fileExists ) {

        echo 'El archivo de ' . $pluralTheme . ' NO existe!';
    }else if ( empty( $totalData ) ) {

        echo 'No se han encontrado ' . $pluralTheme . '!';
    }else {

        echo "Filtrado por " . str_replace( ":", "", $searchTo );
        print_list( $filename, $totalData, $searchTo, $pluralTheme, $singularTheme );
    }        


		
  //Valida el boton    
  if( $fileExists ) {  
    create_button( "../delete/confirm-list.php" , 'Eliminar Lista' , 'delete' ); 
  }
    
  create_button( "../index.php" , 'Volver al Inicio' );    
?>
        
</body>
</html>
