<?php
  require_once( '../read/read.php' );

//=======================View :
create_header_of_page( "Registrar $singularTheme" );  
?>

<body>
    
   <?php 
     form_to_create( $singularTheme );
      
     create_button( "../index.php" , 'Volver al Inicio' ); 
   ?>

</body>
</html>
