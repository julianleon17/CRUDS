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

//================



  create_header_of_page( 'Cliente Actualizado' );	    
?>


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
	
	
	  create_button( "../read/show.php?id=$id" , 'Ver Cliente' );
	?>
            
</body>
</html>
