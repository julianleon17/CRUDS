<?php


      //Formulario para crear la data

function form_to_create( $singularTheme ) {

	echo " 
		<h1>Registrar " . $singularTheme . " </h1>
		</br>
		
		<form action='create.php' method='POST'>
		
			<p><b>Nombre de " . $singularTheme . " :</b> 
			<input type='text' placeholder='Nombre' name='data[name]' required > </p>
			
			
			<p><b>Número Celular :</b> 
			<input type='number' placeholder='Número Celular' name='data[phone]' required > </p>
			
			<p><b>Email :</b> 
			<input type='email' placeholder='Email' name='data[email]' required > </p>
			
			<p><b>Direción :</b> 
			<input type='text' placeholder='Dirección' name='data[direction]' required > </p>
						
			
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
		
			<p><b>Nombre de " . $singularTheme . " :</b> 
			<input type='text' placeholder='Nombre' value='" . $dataFields['name'] . "' name='data[name]' required > </p>
			
			
			<p><b>Número Celular :</b> 
			<input type='number' placeholder='Número Celular' value='" . (int)$dataFields['phone'] . "' name='data[phone]' required > </p>
			
			<p><b>Email :</b> 
			<input type='email' placeholder='Email' value='" . $dataFields['email'] . "' name='data[email]' required > </p>
			
			<p><b>Direción :</b> 
			<input type='text' placeholder='Dirección' value='" . $dataFields['direction'] . "' name='data[direction]' required > </p>
						
			
			<input type='submit' value='Enviar' >
			<input type='reset' value='Borrar' >
			<br>    
		
		</form>
	";
  	
}
