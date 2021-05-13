<?php


      //Formulario para crear la data

function form_to_create( $singularTheme ) {

	echo " 
		<h1>Registrar " . $singularTheme . " </h1>
		</br>
		
		<form action='create.php' method='POST'>
		
			<p><b>Nombre de " . $singularTheme . " :</b> 
			<input type='text' placeholder='Nombre' name='data[name]' required > </p>
			
			
			<p><b>Precio de " . $singularTheme . " :</b> 
			<input type='number' placeholder='Precio' name='data[price]' required > </p>
			
			
			<p><b> Descripción de " . $singularTheme . " :</b> 
			<textarea rows='5' cols='50' placeholder='Escribe una descripción de " . $singularTheme . " ' name='data[description]'></textarea> </p>
						
			
			<input type='submit' value='Enviar' >
			<input type='reset' value='Borrar' >
			<br>    
		
		</form>
	";
}



     //Formulario para actualizar la data 

function form_to_update( $allArray, $id, $dictionaryData, $toDelete, $lineSeparator, $singularTheme) {

  $dataFields = extract_data( $allArray, $id, $dictionaryData, $toDelete, $lineSeparator ); 

	echo "
  	<h1>Datos del $singularTheme(" . ($id + 1) . ")</h1>
	  </br>

		<form action='update.php?id=" . $id . "' method='POST'>

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
  	
}
