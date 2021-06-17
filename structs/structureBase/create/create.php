<?php
  require_once( "../read/read.php" );
  $data = $_POST['data'];

  //Package and sanitize Data
  $data = sanitize_data( $data );

  $newData = package_to_create( $data, $lineSeparator, $arraySeparator );

  create_data( $newData, $filename );

//=====================


create_header_of_page( "$singularTheme Creado" );
?>

<body>

  <?php 

    //Template
    $template = return_data_on_template( $data, $pathTemplate, $wildcards );

    echo $template;

    create_button( "../index.php" , 'Volver al Inicio' ); 
  ?>

</body>
</html>









