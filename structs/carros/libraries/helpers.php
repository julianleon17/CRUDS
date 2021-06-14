<?php

/*===========================================================================================================
 *
 *                                             H   E   L   P   E   R   S
 *
 *===========================================================================================================*/



//                             Works with associative type array



function getTextarea( $key, $attributes ) {

  $id = ( ( isset( $attributes[ 'id' ] ) ) ? $attributes[ 'id' ] : ( 'data-' . $key ) );
  $rows = ( ( isset( $attributes[ 'rows' ] ) ) ? $attributes[ 'rows' ] : 5 );
  $cols = ( ( isset( $attributes[ 'cols' ] ) ) ? $attributes[ 'cols' ] : 50 );
  $name = ( ( isset( $attributes[ 'name' ] ) ) ? $attributes[ 'name' ] : ( 'data['. $key .']' ) );
  $value = ( ( isset( $attributes[ 'value' ] ) ) ? $attributes[ 'value' ] : '' );
  $placeholder = ( ( isset( $attributes[ 'placeholder' ] ) ) ? $attributes[ 'placeholder' ] : $key );
  $required = ( ( isset( $attributes[ 'required' ] ) && ( $attributes[ 'required' ] === true ) ) ? 'required="required"' : '' );
  $type = $attributes[ 'type' ];

  $toReturn = '<p><label for="' . $id . '">' . ucfirst( $key ) . '</label> : ' . "\n";
  $toReturn .= '<textarea rows="'. $rows .'" cols="'. $cols .'" placeholder="'. $placeholder .'" name="'. $name .'" '. $required .' > </textarea> </p>' . "\n\n";

  return $toReturn;
}


function getInput( $key, $attributes ) {
  // Logica y Estructuración de los datos necesarios para la contrucción de un <input />
  $type = $attributes[ 'type' ];
  $id = ( ( isset( $attributes[ 'id' ] ) ) ? $attributes[ 'id' ] : ( 'data-' . $key ) );
  $name = ( ( isset( $attributes[ 'name' ] ) ) ? $attributes[ 'name' ] : ( 'data['. $key .']' ) );;
  $placeholder = ( ( isset( $attributes[ 'placeholder' ] ) ) ? $attributes[ 'placeholder' ] : $key );
  $value = ( ( isset( $attributes[ 'value' ] ) ) ? $attributes[ 'value' ] : '' );
  $required = ( ( isset( $attributes[ 'required' ] ) && ( $attributes[ 'required' ] === true ) ) ? 'required="required"' : '' );

  // Usando la data calculada previamente se procede a la construcción del <input />
  $toReturn = '<p><label for="' . $id . '">' . ucfirst( $key ) . ' :</label> ' . "\n";
  $toReturn .= '<input type="' . $type . '" placeholder="'. $placeholder .'" name="' . $name . '" value="'.$value .'" ' . $required . ' /> </p>' . "\n\n";

  return( $toReturn );
}



function getSelect( $key, $attributes ) {
  // Logica y Estructuración de los datos necesarios para la contrucción de un <input />
  $selectedValue = ( ( isset( $attributes[ 'value' ] ) ) ? $attributes[ 'value' ] : '' );
  $id = ( ( isset( $attributes[ 'id' ] ) ) ? $attributes[ 'id' ] : ( 'data-' . $key ) );
  $required = ( ( isset( $attributes[ 'required' ] ) && ( $attributes[ 'required' ] === true ) ) ? 'required="required"' : '' );
  $options = $attributes[ 'options' ];

  // Usando la data calculada previamente se procede a la construcción del <select />
  $toReturn = '<p><label for="' . $id . '">' . ucfirst( $key ) . '</label> : ' . "\n";
  $toReturn .= '<select name="data[' . $key . ']" ' . $required . '>' . "\n";

  foreach ( $options as $value => $option ) {
    $selected = ( ( $selectedValue === $value ) ? 'selected="selected"' : '' );
    $toReturn .= '<option value="' . $value . '" ' . $selected . '>' . $option . '</option>' . "\n";
  }

  $toReturn .= "</select></p>\n\n";

  return( $toReturn );
}









function build_the_form( $formtype, $formAttributes=array(), $dictionaryData, $initialData ) {

  $formType = strtoupper( $formtype );

  $fieldsArray = count( $dictionaryData );  
  $bodyForm = "";

  if ( $formType == "CREATE" ) {
    $submitButtonValue = 'Create';
    $nameForm = strtolower( $submitButtonValue . '.html' );
  }
  else if ( $formType == "UPDATE" ) {
    $submitButtonValue = 'Update';
    $nameForm = strtolower( $submitButtonValue . '.html' );
  }

    
    foreach ( $dictionaryData as $key => $attributes ) {
      $key = strtolower( $key );
      $type = strtolower( trim( $attributes[ 'type' ] ) );
      $attributes[ 'value' ] = ( ( isset( $initialData[ $key ] ) ) ? $initialData[ $key ] : '' );

      if ( $type == 'number' ) {
        $bodyForm .= getInput( $key, $attributes );
      }

      if ( $type == 'text' ) {
        $bodyForm .= getInput( $key, $attributes );
      }

      if ( $type === 'select' ) {
        $bodyForm .= getSelect( $key, $attributes );
      }

      if ( $type === 'email' ) {
        $bodyForm .= getInput( $key, $attributes );
      }

      if ( $type === 'textarea' ) {
        $bodyForm .= getTextarea( $key, $attributes );
      }
    }

  //Assemble the form to return  

  //Form head
  $form = "<form action='" . $formAttributes[ 'action' ] . "' method='" . $formAttributes[ 'method' ] . "'>\n\n";

  //Form body
  $form .= $bodyForm;

  //Form footer
  $form .= "  
  </br>
  </br>
  <input type='submit' value='" . $submitButtonValue . "' >
  <input type='reset' value='Borrar' >
  <br>
  </form>\n";

  return $form;
}




// Función para construir los comodines por defecto del template

function create_default_wildcards( $dictionaryData ) {

  $fieldsArray = count( $dictionaryData );  
  $dictionaryTemplate = [];

  foreach ( $dictionaryData as $key => $type ) {

    $wildcard = strtoupper( $key );
    $dictionaryTemplate[ $key ] = "%".$wildcard."%";
  }

  //Assemble the form to return  

  return $dictionaryTemplate;
}



// Función para construir el template por defecto

function create_default_template( $wildcards, $singularTheme='', $urlTemplate="" ) {

  $template = "<h1> Datos de " . $singularTheme . " </h1>\n";

  foreach ( $wildcards as $key => $wildcard ) {

    $template .= "
    <b>". ucfirst( $key ) ." :</b> 
    </br>".
    $wildcard
    ."</br>
    </br>
    ";
  }  
  return $template;
}

//=======================================================================================================================


       //Create hader of page
       
function create_header_of_page( $nameOfPage='' ) {
	
	$header = "
	<!DOCTYPE html>
	<html lang='en'>
	<head>
    	<meta charset='UTF-8'>
    	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
    	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
    	<title>$nameOfPage</title>
    	
    	<link rel='stylesheet' href='../../../CSS/styles.css'>
        	
	<style>
	
	.delete a{
    	background-color: red;
    	color: white;
	}
	
	.verMas{
		list-style: none;
	}
	
	.verMas a{
		text-decoration: none;
	}
	
	.verMas a:hover{
		color: blue;
		font-size: 15px;
	}
		
	</style>
	
	</head>
	";

  echo $header;
}



//           Create buttons

function create_button( $path , $buttonName , $class='' ) {

	echo "
	<div class='menu' >        
    	<div class='opcion' >
        	<ul>
            	<li class='$class'> <a href='$path'> $buttonName </a> </li>
        	</ul>
    	</div>
	</div>
	";
	
}