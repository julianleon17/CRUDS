<?php
  require_once("../read/read.php");
  $id = $_GET['id'];
  
  $dataFields = extractClientData( $clients , $id );   
  
/*==============
 *  TEMPLATE
 *==============*/

$templateToUpdate = "
  <form action='update.php?id=$id' method='POST'>
  
        <p><b>Nombre del Cliente:</b> <input type='text' placeholder='Su Nombre' name='client[name]' value='" . $dataFields[ 'name' ] . "' required > </p>
        
        <p><b>Número Celular:</b> <input type='number' placeholder='Número de celular' name='client[phone]' value='" . (int)$dataFields[ 'phone' ] . "' required > </p>
        
        <p><b>Email:</b> <input type='email' placeholder='Email' name='client[email]' value='" . $dataFields[ 'email' ] . "' required > </p>
        
        <p><b>Dirección:</b> <input type='number' placeholder='Dirección' name='client[address]' value='" . (int)$dataFields[ 'address' ] . "' required > </p>

        <input type='submit' value='Enviar' >
        <input type='reset' value='Borrar' >
        <br>    
  </form>
";
//===============


create_header_of_page( 'Editar Cliente' );  
?>

<body>

	<?php
  	
  	if ( $fileExists ) {
     	
     	if ( $id > $totalData ) {
     	
       	echo 'Este cliente NO existe!' ;    
       	create_button( "../index.html" , 'Volver al Inicio' );
     	
     	}else{
  	
       	echo $templateToUpdate;
       	create_button( "../read/show.php?id=$id" , 'Cancelar' );
     	}
  	}else{
  	
    	create_button( "../index.html" , 'Volver al Inicio' );
    	
  	}
	?>
	
</body>
</html>

  
