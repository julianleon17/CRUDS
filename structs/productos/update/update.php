<?php
  require_once( "../read/read.php" );
	$id = $_GET['id'];
	
	$product = $_POST['product'];
 	$product = str_replace( "\n" , "</br>" , $product );
			
	    //Template
  $template = "../templates/producto.template";

			
			//new data of client

  $product = sanitize_data( $product );
  
  $newData = "\nName :" . $product['name'] . "</br>\n";
  $newData .= "Price :" . $product['price'] . "</br>\n";
  $newData .= "Description :" . $product['description'] . "</br>\n";
//================



  create_header_of_page( 'Cliente Actualizado' );	    
?>


<body>
    
	<?php 
    	
	if ( $fileExists  ) {
	 	
   	if ( $id > $totalData ) {
    	
     	echo 'Este producto NO existe!' ;    
   	}else { 
		      	//Replace data  
	   	$products[$id] = $newData;
	   	$products = array_values($products);
     	update_Base( $products , $filename , 'Actualizado Exitosamente.' );
     	
     	$template	= str_replace( "DATOS DEL PRODUCTO" , "NUEVOS DATOS DEL PRODUCTO" , $template );
     	$template = print_data_on_template( $product , $template , $dictionaryTemplate , $dictionaryData );
     	
     	echo $template;
   	}
	} else {
    	
   	echo 'El archivo de ' . $tema . ' NO existe! ';
	}
	
	
	  create_button( "../read/show.php?id=$id" , 'Ver Pedido' );
	?>
            
</body>
</html>
