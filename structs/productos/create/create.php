<?php
  require_once( "../read/read.php" );
  $product = $_POST['product'];
  $template = "../templates/producto.template";  


          //Package Data of product
    
  $product = sanitize_data( $product );
  
  $data = 'Name :' . $product['name'] . "</br>\n";
  $data .= 'Description :' . $product['description'] . "</br>\n";
  $data .= 'Price :' . $product['price'] . "</br>\n";
  $data .= ",\n";
//=====================


create_header_of_page( 'Producto Creado' );
?>    

<body>
    
    <?php 
      createData( $data , $filename , 'Creado exitosamente' );
      
  
      $product['name'] = preg_replace( "[1|2|3|4|5|6|7|8|9|0]" , "" , $product['name'] );
      $product['description'] = preg_replace( "[\n]" , "</br>" , $product['description'] );
      $template = print_data_on_template( $product , $template , $dictionaryTemplate , $dictionaryData );    
      echo $template;
      
      create_button( "../index.html" , 'Volver al Inicio' ); 
    ?>
    
</body>
</html>
