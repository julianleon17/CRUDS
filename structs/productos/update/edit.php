<?php
  require_once("../read/read.php");
  $id = $_GET['id'];
  
  $dataFields = extract_product_data( $products , $id );   
  $dataFields['description'] = str_replace( "</br>" , "" , $dataFields['description'] );

/*==============
 *  TEMPLATE
 *==============*/

$templateToUpdate = "
<h1>DATOS DEL PRODUCTO(" . ($id + 1) . ")</h1>
</br>
    <form action='update.php?id=".$id."' method='POST'>

        <p><b>Nombre del Producto:</b> <input type='text' placeholder='Nombre' value='" . $dataFields['name'] . "' name='product[name]' required > </p>
        <p><b>Precio del Producto:</b> <input type='text' placeholder='Nombre' value='" . $dataFields['price'] . "' name='product[price]' required > </p>
        
        <p><b> Descripción del Producto :</b> <textarea rows='5' cols='50' placeholder='Escribe una descripción del producto' name='product[description]'>" . $dataFields['description'] . "</textarea> </p>
        
        <input type='submit' value='Enviar' >
        <input type='reset' value='Borrar' >
        <br>    

    </form>
";
//===============


create_header_of_page( 'Editar Producto' );  

?>
<body>
	<?php
  	
  	if ( $fileExists ) {
     	
     	if ( $id > $totalData ) {
     	
       	echo 'Este ' . $tema . ' NO existe!' ;    
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
  
