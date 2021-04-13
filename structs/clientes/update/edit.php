<?php
  require_once("../read/read.php");
  
  $id = $_GET['id'];
  
  $dataFilds = extractClientData( $clients , $id );   
  
/*==============
 *  Functions
 *==============*/
  
function extractClientData( $array , $key ){

  $dictionary = [ 'name', 'phone', 'email', 'address' ];
  $dataFilds = [];  
    
  $clients = $array;
  $client = $clients[ $key ];
	
	$clientFilds = explode( "</br>" , $client );
	$clientFildsData = preg_replace( "[Nombre :|Telefono :|Email :|Direccion :]" , "" , $clientFilds );

	$numFilds = count($clientFildsData);
	$idCliente = $key + 1;
	
	for ( $i = 0; $i < $numFilds; $i++ ) {
	  $dataFilds[ $dictionary[ $i ] ] = $clientFildsData[ $i ];
	}

	return $dataFilds;
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>

    <link rel="stylesheet" href="../../../CSS/styles.css">
    
</head>
<body>

  <form action="update.php?id=<?php echo $id; ?>" method="POST">

        <p><b>Nombre del Cliente:</b> <input type="text" placeholder="Su Nombre" name="client[name]" value="<?php echo $dataFilds[ 'name' ]; ?>" required > </p>
        
        <p><b>Número Celular:</b> <input type="number" placeholder="Número de celular" name="client[phone]" value="<?php echo (int)$dataFilds[ 'phone' ]; ?>" required > </p>
        
        <p><b>Email:</b> <input type="email" placeholder="Email" name="client[email]" value="<?php echo $dataFilds[ 'email' ]; ?>" required > </p>
        
        <p><b>Dirección:</b> <input type="number" placeholder="Dirección" name="client[address]" value="<?php echo (int)$dataFilds[ 'address' ]; ?>" required > </p>

        <input type="submit" value="Enviar" >
        <input type="reset" value="Borrar" >
        <br>    

  </form>

  <div class="menu" >
        <div class="opcion" >
            <ul>
                <li> <a href="../read/show.php?id=<?php echo $id; ?>"> Cancelar </a> </li>
            </ul>
        </div>
  </div>

</body>
</html>

  
