<?php
  require_once('../read/read.php');
  $id = $_GET[ 'id' ];


//================View :

  create_header_of_page( 'Cliente Eliminado' );

  if ( $fileExists  ) {
		
    if ( $id > $totalData ) {
    
      echo 'Este producto NO existe!' ;    
    }else { 
    
			$product = extract_product_data( $products , $id );
			$nameProduct = $product['name'];
			
			deleteData( $products , $id , $filename , "El producto <b>( $nameProduct )</b> fue elimnado exitosamente" );
    }
  } else {
    
    echo 'El archivo de "Productos" NO existe! ';
  }


  create_button( "../read/list.php" , 'Volver al Listado' ); 
?>

