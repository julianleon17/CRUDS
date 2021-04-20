<?php
  require_once('../read/read.php');
  
  create_header_of_page( 'Confirmar' );  
?>
<body>

		<?php
		  //Valida los botones
  		if ( $fileExists  ) {				  
      		
      		echo "<h1> ¿Seguro que quieres eliminar todos los clientes? </h1></br></br>";
          create_button( "delete-historial" , 'Confirmar' );
          create_button( "../read.list.php" , 'Cancelar' );
      		
    	}else{
    		
  		   	echo 'El archivo de "Clientes" NO existe!';
          create_button( "../index.html" , 'Volver al Inicio' );  		   	    
    	 }
		?>

</body>
</html>
