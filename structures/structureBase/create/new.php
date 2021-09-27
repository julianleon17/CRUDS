<?php
  require_once( "../boot.php" );
  require_once( $reference_path . "/read/read.php" );

//=======================View :
create_header_of_page( "Registrar $singularTheme", $styles );

  echo '<h1>Create New ' . $singularTheme . '</h1>';

  $initialData = [];
  $form = build_the_form( "Create", array( "action" => "create.php", "method" =>"POST" ),  $dictionaryData, $initialData );

  echo $form;
 
  create_button( "../index.php" , 'Volver al Inicio' ); 

create_footer_of_page();
