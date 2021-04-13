<?php
  require_once( "../read/read.php" );

  $client = $_POST['client'];
  $client['nombre'] = filter_var( $client[ 'nombre' ] , FILTER_SANITIZE_STRING );
  $client[ 'celular' ] = filter_var( $client[ 'celular' ] , FILTER_SANITIZE_NUMBER_INT );


  $data = 'Nombre :' . $client['name'] . "</br>\n";
  $data .= 'Telefono :' . $client['phone'] . "</br>\n";
  $data .= 'Email :' . $client['email'] . "</br>\n";
  $data .= 'Direccion :' . $client['address'] . "</br>\n";
  $data .= ",\n";


  if ( $fileExists ) {
  
    $oldData = file_get_contents($filename);
    $oldData .= $data; 
    file_put_contents($filename, $oldData);
        
  } else {
  
    file_put_contents($filename, $data);    
    
  }


					/*========Template=========*/


$template = file_get_contents("../templates/cliente.template");

$template = str_replace( "%NAME%", $client['name'], $template );
$template = str_replace( "%TEL%", $client['phone'], $template );
$template = str_replace( "%EMAIL%", $client['email'], $template );
$template = str_replace( "%ADR%", $client['address'], $template );

?>    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente creado</title>
    <link rel="stylesheet" href="../../../CSS/styles.css">

</head>
<body>
    <?php echo $template . 'Cliente creado exitosamente'; ?>
    
    <div class="menu" >
        <ul>
            <div class="opcion" >
                <li> <a href="../index.html"> Volver al Inicio </a> </li>
            </div>
        </ul>
    </div>
</body>
</html>
