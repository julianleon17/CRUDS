<?php
  require_once( "../read/read.php" );
  $data = $_POST['data'];


          //Package and sanitize Data         
  $data = sanitize_data( $data, $dictionaryData );
  $data['name'] = preg_replace( "[1|2|3|4|5|6|7|8|9|0]" , "" , $data['name'] );
  $data['price'] = filter_var( $data[ 'price' ] , FILTER_SANITIZE_NUMBER_INT );
  
  $newData = "Name :" . $data['name'] . "</br>\n";
  $newData .= "Price :" . $data['price'] . "</br>\n";
  $newData .= "Description :" . $data['description'] . "</br>\n";
  $newData .= ",\n";
//=====================


create_header_of_page( "$singularTheme Creado" );
?>    

<body>
    
    <?php 
      create_data( $newData, $filename, 'Creado exitosamente' );
      
      
          //Template
      $data['description'] = str_replace( "\n" , "</br>" , $data['description'] );
      
      $template = return_data_on_template( $data , $template , $dictionaryTemplate , $dictionaryData );    
      echo $template;
      
      create_button( "../index.php" , 'Volver al Inicio' ); 
    ?>
    
</body>
</html>









