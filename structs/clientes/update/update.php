<?php
  require_once("../read/read.php");
	
	$client = $_POST['client'];
	$id = $_GET['id'];
			
	    //Template
	    
  $template = "../templates/cliente.template";
  $template = file_get_contents($template);
  
	$template	= str_replace( "DATOS DEL CLIENTE" , "NUEVOS DATOS DEL CLIENTE" , $template );
	$template	= str_replace( "%NAME%" , $client['name'] , $template );
	$template	= str_replace( "%TEL%" , $client['phone'] , $template );
	$template	= str_replace( "%EMAIL%" , $client['email'] , $template );
	$template	= str_replace( "%ADR%" , $client['address'] , $template );
  
			
			//new data of client
			
	$newClientData = "\nNombre :" . $client['name'] . "</br>\n";
  $newClientData .= "Telefono :" . $client['phone'] . "</br>\n";
  $newClientData .= "Email :" . $client['email'] . "</br>\n";
  $newClientData .= "Direccion :" . $client['address'] . "</br>";
  $newClientData .= "\n";

	
		//Replace data  
	$clients[$id] = $newClientData;
		
	$clients = array_values($clients);
	
  update_Base( $clients , $filename , 'Actualizado Exitosamente.' );	
	    
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
