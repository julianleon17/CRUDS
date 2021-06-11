<?php
  require_once( '../read/read.php' );

//=======================View :
create_header_of_page( " $singularTheme" );  
?>

<body>
    
   <?php
     $initialData = [];
     $form = build_the_form( "create", array( "action" => "create.php", "method" =>"POST" ),  $dictionaryData, $initialData );
     echo $form;
     create_button( "../index.php" , 'Volver al Inicio' ); 
   ?>

</body>
</html>
