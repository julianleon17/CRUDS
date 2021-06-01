<?php
  require_once('../read/read.php');
    
    if ( $fileExists  ) {
      
      unlink($filename);
      echo 'El archivo de ' . $pluralTheme . ' fue eliminado exitosamente';
    }else{
      echo 'El archivo de ' . $pluralTheme . ' NO existe! ';
    }

  create_header_of_page( 'Lista Eliminada' );
?>

  
<body>
  <?php create_button( "../index.php" , 'Volver al Inicio' ); ?>

</body>
</html>
