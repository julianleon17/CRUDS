<?php
  require_once( "../read/read.php" );
	$id = $_GET['id'];
	
	$client = $_POST['client'];
  $client = sanitize_dataClient( $client );  
			
	    //Template
  $template = "../templates/cliente.template";

			
			//new data of client
			
	$newClientData = "\nNombre :" . $client['name'] . "</br>\n";
  $newClientData .= "Telefono :" . $client['phone'] . "</br>\n";
  $newClientData .= "Email :" . $client['email'] . "</br>\n";
  $newClientData .= "Direccion :" . $client['address'] . "</br>";
  $newClientData .= "\n";

  
/*==============
 *  BUTTONS
 *==============*/
 
$bottonBack = "
<div class='menu' >        
    <div class='opcion' >
        <ul>
            <li> <a href='../index.html'> Volver al Inicio </a> </li>
        </ul>
    </div>
</div>
";
	    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente</title>

    <link rel="stylesheet" href="../../../CSS/styles.css">

    
<style>

.delete a{
    background-color: red;
    color: white;
}

.verMas{
	list-style: none;
}

.verMas a{
	text-decoration: none;
}

.verMas a:hover{
	color: blue;
	font-size: 15px;
}


.top-options{
	margin:auto;
	float:center;
}

</style>



</head>
<body>
    
<?php 
    
if ( $fileExists  ) {
	 
   if ( $id > $totalData ) {
    
     echo 'Este cliente NO existe!' ;    
   }else { 
		      //Replace data  
	   $clients[$id] = $newClientData;
	   $clients = array_values($clients);

     update_Base( $clients , $filename , 'Actualizado Exitosamente.' );
     
     $template	= str_replace( "DATOS DEL CLIENTE" , "NUEVOS DATOS DEL CLIENTE" , $template );
     print_Data_on_Template( $client , $template );
   }
} else {
    
   echo 'El archivo de "Clientes" NO existe! ';
}

?>
            
    
        
    <div class="menu" >        
        <div class="opcion" >
            <ul class="top-options" >
                <li > <a href="../read/show.php?id=<?php echo $id; ?>" > Volver al Listado </a> </li>
            </ul>
        </div>
    </div>
</body>
</html>
