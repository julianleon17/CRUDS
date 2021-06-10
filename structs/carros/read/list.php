<?php
  require_once( 'read.php' ); // Model
  
//============================= View :

create_header_of_page( $pluralTheme );  
?>

<body>
    <h1>Listado de <?php echo $pluralTheme; ?> </h1>


<?php
    if( !$fileExists ) {

        echo "El archivo de " . $pluralTheme . " NO existe! </br> ¿Deseas crear $pluralTheme ?";
    }else if ( empty( $totalData ) ) {

      echo "</br>En este momento la lista está vacía </br> ¿Deseas crear $pluralTheme ?";
    }else {

        echo "Filtrado por " . str_replace( ":", "", $searchTo );
        print_list( $filename, $totalData, $searchTo, $pluralTheme, $singularTheme );
    }        


		
  //Valida el boton    
  if( ($fileExists) && (empty( $totalData )) ) {  

    create_button( "../create/new.php", "Crear $singularTheme" );
  }
  else if ( ($fileExists) && !(empty( $totalData )) ) {

    create_button( "../delete/confirm-list.php" , 'Eliminar Lista' , 'delete' );
  }
  
  if ( !($fileExist) ) {

    create_button( "../create/new.php", "Crear $singularTheme" );
  }

  create_button( "../index.php" , 'Volver al Inicio' );    
?>

</body>
</html>
