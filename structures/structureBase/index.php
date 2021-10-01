<?php
  if ( !isset( $reference_path ) ) {
    require_once( "../boot.php" );
  }


//==================View :
create_header_of_page( "CRUD de " . $pluralTheme );

  echo '<h1>Administrador de ' . $pluralTheme . '</h1>';

  create_button( "/create/new.php", "Crear $singularTheme" );
  create_button( "/read/list.php", "Listado de $pluralTheme" );
  create_button( "/../index.php", "Volver al inicio" );

create_footer_of_page();
