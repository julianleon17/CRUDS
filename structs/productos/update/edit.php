<?php
  require_once("../read/read.php");
  $id = $_GET['id'];
  
  $dataFields = extract_data( $allArray, $id, $dictionaryData, $toDelete );   

/*==============
 *  TEMPLATE
 *==============*/

$templateToUpdate = "
<h1>Datos del $singularTheme(" . ($id + 1) . ")</h1>
</br>
    <form action='update.php?id=".$id."' method='POST'>

        <p><b>Nombre del $singularTheme:</b> 
        <input type='text' placeholder='Nombre' value='" . $dataFields['name'] . "' name='data[name]' required > </p>
        
        
        <p><b>Precio del $singularTheme:</b> 
        <input type='number' placeholder='Precio' value='" . (int)$dataFields['price'] . "' name='data[price]' required > </p>
        
        
        
        <p><b> Descripción del $singularTheme:</b> 
        <textarea rows='5' cols='50' placeholder='Escribe una descripción del $singularTheme' name='data[description]'>" . $dataFields['description'] . "</textarea> </p>
         
        
        <input type='submit' value='Enviar' >
        <input type='reset' value='Borrar' >
        <br>    

    </form>
";
//===============


create_header_of_page( "Editar $singularTheme" );  

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
  	
    	create_button( "../index.php" , 'Volver al Inicio' );
    	
  	}
	?>
	
</body>
</html>
  
