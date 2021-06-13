<?php
  require_once( '../read/read.php' );

//=======================View :
create_header_of_page( "Registrar $singularTheme" );  
?>

<body>

  <h1> <?php echo 'Create New '.$singularTheme ?> </h1>
  
  <?php
    $initialData = [];
    $form = build_the_form( "upDAte", array( "action" => "create.php", "method" =>"POST" ),  $dictionaryData, $initialData );

    echo $form;
 
    create_button( "../index.php" , 'Volver al Inicio' ); 
  ?>

</body>
</html>
