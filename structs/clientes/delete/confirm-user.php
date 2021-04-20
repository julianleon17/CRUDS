<?php
  require_once('../read/read.php');
  $id = $_GET[ 'id' ];
?>

<?php  create_header_of_page( 'Confirmar' );  ?>
<body>
		
		<?php
  		if ( $fileExists  ) {
  		
		      //Valida los botones
    		if ( $id > $totalData ) {

      		echo 'Este cliente NO existe!';
      		
          create_button( "../index.html" , 'Volver al Inicio' );    
          
    		}else {
    		
    		  echo "<h1> ¿Seguro que quieres eliminar este cliente? </h1></br></br>";
				 	create_button( "delete-user.php?id=$id" , 'Confirmar' , 'delete' );
				 	create_button( "../read/show.php?id=$id" , 'Cancelar' );
				 	
  		  }
  		}else{
					
    		echo 'El archivo de "Clientes" NO existe! ';
    		
    		create_button( "../index.html" , 'Volver al Inicio' ); 
    		
  		}
		?>

</body>
</html>
