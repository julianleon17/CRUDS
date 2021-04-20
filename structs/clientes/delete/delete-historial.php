<?php
  require_once('../read/read.php');
    
    if ( $fileExists  ) {
      
      unlink($filename);
      echo 'El archivo de Clientes fue eliminado exitosamente';
    }else{
      echo 'El archivo de "Clientes" NO existe! ';
    }

  create_header_of_page( 'Lista Eliminada' );
?>

  
<body>
  create_button( "../index.html" , 'Volver al Inicio' ); 

</body>
</html>
