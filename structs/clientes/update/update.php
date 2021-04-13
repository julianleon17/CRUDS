<?php
  require_once("../read/read.php");
	
	$client = $_POST['client'];
	$id = $_GET['id'];
			
			
			//new data of client
			
	$newClient = "\nNombre :" . $client['name'] . "</br>\n";
  $newClient .= "Telefono :" . $client['phone'] . "</br>\n";
  $newClient .= "Email :" . $client['email'] . "</br>\n";
  $newClient .= "Direccion :" . $client['address'] . "</br>";
  $newClient .= "\n";
	
  
  leerBase();
  
	$clients[$id] = $newClient;
		
	$clients = array_values($clients);
	
	
	sobre_escribir_Base( $clients );
	
	
	
	
	    
	    
	    //Template
	    
  $template = "../templates/cliente.template";
  $template = file_get_contents($template);
  
	$template	= str_replace( "%NAME%" , $client['name'] , $template );
	$template	= str_replace( "%TEL%" , $client['phone'] , $template );
	$template	= str_replace( "%EMAIL%" , $client['email'] , $template );
	$template	= str_replace( "%ADR%" , $client['address'] , $template );
	$template	= str_replace( "DATOS DEL CLIENTE" , "NUEVOS DATOS DEL CLIENTE" , $template );
  
  /*==============
   *  Functions
   *==============*/

   

function sobre_escribir_Base($newData){

	global $filename;
	
	$array = $newData;
	$newData = implode(",", $array);
	
	if( file_exists($filename) ){
			
		file_put_contents( $filename, $newData);
		
			
		echo "</br></br> Actualizado correctamente.\n";
		
	}else{
		echo "No existe.\n";
	}
	
	
}

function leerBase(){

	global $filename;
	global $clients;
		
  $data = file_get_contents( $filename );
  $clients = explode(',' , $data );
  
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente</title>

    <link rel="stylesheet" href="../../../CSS/styles.css">

</head>
<body>
        
        <?php echo $template;	 ?>
        
    <div class="menu" >        
        <div class="opcion" >
            <ul class="top-options" >
                <li > <a href="../read/show.php?id=<?php echo $id; ?>" > Volver al Listado </a> </li>
            </ul>
        </div>
    </div>
</body>
</html>
