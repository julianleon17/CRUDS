<?php
  require_once( "../boot.php" );
  require_once( $reference_path . "/read/read.php" ); // Model

//============================= View :

create_header_of_page( $pluralTheme );

  echo '<h1>Listado de '. $pluralTheme . '</h1>';

  if( !$fileExists ) {

    echo "El archivo de " . $pluralTheme . " NO existe! </br> ¿Deseas crear $pluralTheme ?";
  }else if ( empty( $totalData ) ) {

    echo "</br>En este momento la lista está vacía </br> ¿Deseas crear $pluralTheme ?";
  }else{

    $searchExists = false;
	foreach ( $dictionaryData as $key => $attributes ) {
		if ( $searchTo == $key ) {
		  $searchExists = true;
		}
	}
	if ( !$searchExists ) {
      $message = '¡No existe el campo de dato "<b>' . $searchTo . '</b>" !</br>';
      $message .= 'No te puedo filtrar la información.';
	  
	  echo $message;
	}else{
      echo "<h2>~~~ " . $pluralTheme . " encontrados " . $totalData . " ~~~</h2> </br>";
      echo "Filtrado por " . ucfirst( $searchTo ) . '</br></br></br>';

      print_list( $dictionaryData, $allArray, $searchTo, $lineSeparator, $singularTheme );
	}
  }

  //Valida el boton
  create_button( "../create/new.php", "Crear $singularTheme" ); // Crear Nuevo Objeto

  if ( ($fileExists) && !(empty( $totalData )) ) {

    create_button( "../delete/confirm-list.php" , 'Eliminar Lista' , 'delete' );
  }

  create_button( "../index.php" , 'Volver al Inicio' ); // Volver Al Menú

create_footer_of_page();
