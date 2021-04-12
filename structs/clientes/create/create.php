<?php
  $client = $_POST['client'];
  $client['nombre'] = filter_var( $client[ 'nombre' ] , FILTER_SANITIZE_STRING );
  $client[ 'celular' ] = filter_var( $client[ 'celular' ] , FILTER_SANITIZE_NUMBER_INT );


  $data = 'Nombre :' . $client['name'] . "</br>\n";
  $data .= 'Telefono :' . $client['phone'] . "</br>\n";
  $data .= 'Email :' . $client['email'] . "</br>\n";
  $data .= 'Direccion :' . $client['address'] . "</br>\n";
  $data .= ",\n";


  $filename = "../clientes.db";

  if ( file_exists( $filename ) ) {
  
    $oldData = file_get_contents($filename);
    $oldData .= $data; 
    file_put_contents($filename, $oldData);
        
  } else {
  
    file_put_contents($filename, $data);    
    
  }


					/*========Template=========*/


$template = file_get_contents("../templates/cliente.template");

$orden = str_replace( "%NAME%", $client['name'], $template );
$orden = str_replace( "%TEL%", $client['phone'], $orden );
$orden = str_replace( "%EMAIL%", $client['email'], $orden );
$orden = str_replace( "%ADR%", $client['address'], $orden );

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
    <p> <?php echo $orden . 'Cliente creado exitosamente'; ?> </p>
    
    <div class="menu" >
        <ul>
            <div class="opcion" >
                <li> <a href="../index.html"> Volver al Inicio </a> </li>
            </div>
        </ul>
    </div>
</body>
</html>
