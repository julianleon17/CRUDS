<?php


      //Formulario para crear la data

function form_to_create( $singularTheme ) {

	echo " 
		<h1>Registrar " . $singularTheme . " </h1>
		</br>
		
		<form action='create.php' method='POST'>
		
		   
			<p><b>Nombre de " . $singularTheme . " :</b> 
			<input type='text' placeholder='Nombre' name='data[name]' required > </p>			
		
			<p><b>Número Celular de " . $singularTheme . " :</b> 
			<input type='text' placeholder='Celular' name='data[phone]' required > </p>
			
			<p><b>Edad de " . $singularTheme . " :</b> 
			<input type='number' placeholder='Edad' name='data[age]' required > </p>
			
			<p><b>Correo de " . $singularTheme . " :</b> 
			<input type='text' placeholder='Correo' name='data[email]' required > </p>
			
			
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

            <p><b>Nombre de $singularTheme:</b> 
			<input type='text' placeholder='Nombre' value='" . $dataFields['name'] . "' name='data[name]' required > </p>

			<p><b>Número Celular de $singularTheme:</b> 
			<input type='text' placeholder='Celular' value='" . $dataFields['phone'] . "' name='data[phone]' required > </p>
			
			<p><b>Edad de $singularTheme:</b> 
			<input type='number' placeholder='Edad' value='" . (int)$dataFields['age'] . "' name='data[age]' required > </p>
						
			<p><b>Correo de $singularTheme:</b> 
			<input type='email' placeholder='Correo' value='" . $dataFields['email'] . "' name='data[email]' required > </p>
				
							
			<input type='submit' value='Enviar' >
			<input type='reset' value='Borrar' >
			<br>    

		</form>
	";
  	
}
