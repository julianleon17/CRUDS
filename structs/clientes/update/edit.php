<?php
  require_once("../read/read.php");
  
  $id = $_GET['id'];
  
  extractData($id);   
  
  /*==============
   *  Functions
   *==============*/


   
   $name;
   $phone;
   $email;
   $address;
   
   function extractData($key){
	//Mirar linea por linea cada cliente
	
	global $filename;
  global $name;
  global $phone;
  global $email;
  global $address;
  
  $clients = leerBase();
  
  $numUser = $clients[$key];
	
	$client = explode( "</br>" , $numUser );
	$client = preg_replace("[Nombre :|Telefono :|Email :|Direccion :]" , "" , $client);

	$numDatos = count($client);
	$idCliente = $key + 1;
	
	for($i = 0; $i < $numDatos; $i ++){
	
		if( $i == 0 ){
			$name = $client[$i];
		}
		
		if( $i == 1 ){
			$phone = (int)$client[$i];
		}
			
		if( $i == 2 ){
			$email = $client[$i];
		}
		
		if( $i == 3 ){
			$address = (int)$client[$i];
		}
	}
}


function leerBase(){

	global $filename;
		
  $data = file_get_contents( $filename );
  $clients = explode(',' , $data );
  
  return $clients;
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

        <p><b>Nombre del Cliente:</b> <input type="text" placeholder="Su Nombre" name="client[name]" value="<?php echo $name; ?>" required > </p>
        
        <p><b>Número Celular:</b> <input type="number" placeholder="Número de celular" name="client[phone]" value="<?php echo $phone; ?>" required > </p>
        
        <p><b>Email:</b> <input type="email" placeholder="Email" name="client[email]" value="<?php echo $email; ?>" required > </p>
        
        <p><b>Dirección:</b> <input type="number" placeholder="Dirección" name="client[address]" value="<?php echo $address; ?>" required > </p>

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

  
