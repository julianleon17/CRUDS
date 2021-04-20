<?php
  require_once('read.php'); //Model
  $id = $_GET[ 'id' ];
 
?>


<?php  create_header_of_page( 'Datos Cliente' );  ?>
<body>
	<?php 
  	
  	if ( !$fileExists ) {
  	
    		echo 'El archivo de "Clientes" NO existe! ';
    	      	
  	}else{
  	
    	if ( !( $id > ( $totalData -1 ) ) ) {
    		
    		$clientExists = true;
    		
      	$template = file_get_contents("../templates/cliente.template");
    		$template = extractClientData_on_Template( $clients , $id , $template );		
    		
    		echo $template;    	      	   	
    	}else{
    		
      	echo 'Este cliente NO existe!' ;    
    	}
  	}
  	
  	
  	  	
  	//Valida los botones
  	if ( !$clientExists ){  
  	
  	}else{

    	create_button( "../update/edit.php?id=$id" , 'Editar' ); 
    	create_button( "../delete/confirm-user.php?id=$id" , 'Eliminar' , 'delete'); 
    	
  	} 
  	
  	create_button( "../read/list.php" , 'Volver al Listado' );
	?>

</body>
</html>
