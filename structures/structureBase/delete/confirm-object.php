<?php
  require_once( "../boot.php" );
  require_once( $reference_path . "/read/read.php" );

  $id = $_GET[ 'id' ];


//==================View :

create_header_of_page( 'Confirmar' );

  if ( $fileExists  ) {
    //Valida los botones
    if ( $id > $totalData ) {

      echo 'Este ' . $singularTheme . ' NO existe!';
      create_button( "/index.php" , 'Volver al Inicio' );
    } else {

      echo "<h1> ¿Seguro que quieres eliminar " . $singularTheme . "? </h1></br></br>";
	  create_button( "/delete/delete-object.php?id=".$id , 'Confirmar' , 'delete' );
	  create_button( "/read/show.php?id=".$id , 'Cancelar' );
    }
  } else {

    echo 'El archivo de ' . $singularTheme .' NO existe! ';
    create_button( "/index.html" , 'Volver al Inicio' );
  }

create_footer_of_page();
