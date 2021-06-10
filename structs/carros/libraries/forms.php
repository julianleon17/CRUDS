<?php

//                                                                           I N S E R V I B L E

      //Formulario para crear la data

function form_to_create( $singularTheme ) {

	echo " 
		<h1>Registrar " . $singularTheme . " </h1>
		</br>
		
		<form action='create.php' method='POST'>
		
		   
			<p><b>Código de " . $singularTheme . " :</b> 
			<input type='text' placeholder='Placa' name='data[placa]' required > </p>			
		
			<p><b>Marca de " . $singularTheme . " :</b> 
			<input type='text' placeholder='Marca' name='data[marca]' required > </p>
			
			<p><b>Modelo de " . $singularTheme . " :</b> 
			<input type='text' placeholder='Modelo' name='data[modelo]' required > </p>
			
			<p><b>Color de " . $singularTheme . " :</b> 
			<input type='text' placeholder='Color' name='data[color]' required > </p>
			
			<p><b>Precio de " . $singularTheme . " :</b> 
			<input type='number' placeholder='Precio' name='data[precio]' required > </p>
			
			
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
  	<h1>Datos de $singularTheme(" . ($id + 1) . ")</h1>
	  </br>

		<form action='update.php?id=" . $id . "' method='POST'>

            <p><b>Placa de $singularTheme:</b> 
			<input type='text' placeholder='Placa' value='" . $dataFields['placa'] . "' name='data[placa]' required > </p>

			<p><b>Marca de $singularTheme:</b> 
			<input type='text' placeholder='Marca' value='" . $dataFields['marca'] . "' name='data[marca]' required > </p>
			
			<p><b>Modelo de $singularTheme:</b> 
			<input type='text' placeholder='Modelo' value='" . $dataFields['modelo'] . "' name='data[modelo]' required > </p>
						
			<p><b>Color de $singularTheme:</b> 
			<input type='text' placeholder='Color' value='" . $dataFields['color'] . "' name='data[color]' required > </p>
			
			<p><b>Precio de $singularTheme:</b> 
			<input type='number' placeholder='Precio' value='" . floatval( $dataFields['precio'] ) . "' name='data[precio]' required > </p>
			
			
			
			<input type='submit' value='Enviar' >
			<input type='reset' value='Borrar' >
			<br>    

		</form>
	";
  	
}
