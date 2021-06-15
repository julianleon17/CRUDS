<?php

  $dir = './';
  $dirs = scandir( $dir );

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STRUCTS</title>

    <link rel="stylesheet" href="../CSS/styles.css">

</head>
<body>
    <h1>STRUCTS</h1>

    <div class="menu" >
        <?php
            
          foreach ( $dirs as $key => $value ) {

            if  ( $value == '.' || $value == '..' ) {

            }else{

              if ( is_dir( $value ) != false ) {

                echo '
                <div class="opcion" >
                <ul>
                <li> <a href="'. $value .'">Administrar '. ucfirst( $value ) .'</a> </li>
                </ul>
                </div>' . "\n";
              }
            }
          }
        ?>
    </div>
</body>
</html>

