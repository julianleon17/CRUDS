<?php
/* SANDBOX */
/* PLAY GROUND */



                    //Works with associative type array

/*
*/


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




//ARRAYS

$initialData = [/*
  "placa" => "jju4vt",
  "marca" => "mazda",
  "modelo" => "julian",
  "color" => "verde",
  "price" => "23",
  "producto" => "key2"
*/];

//La key es el nombre de la variable y el valor es el tipo de input en el formulario
$dictionaryData = [ 
  "placa" => array( 'type' => "text", 'required' => true ),
  "marca" => array( 'type' => "text", 'required' => true ),
  "modelo" => array( 'type' => "text", 'required' => true ),
  "email" => array( 'type' => "email", 'required' => true ),
  "color" => array( 'type' => "text", 'required' => true ),
  "price" => array( 'type' => "number" ),
  // "producto" => array( 'type' => "select", 'options' => array( 'key' => 'Value 1', 'key2' => 'Value 2' ), 'required' => true ),
  // "descripcion" => array( 'type' => "textarea", 'rows' => "5", 'cols' => "50", 'required' => true )
];

$form = build_the_form( "upDAte", array( "action" => "hola.php", "method" =>"POST" ),  $dictionaryData, $initialData );


//echo $form;




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
  //file_put_contents( $urlTemplate, $template );

  return $template;
}

//print_r( $wildcards );
//print_r( $template );


/*===T R A S H
*/


  //Extrae los datos del objeto que se pida y devuelve un array asociativo

function extract_data( $dictionaryData, $allArray, $id, $lineSeparator ){

  $toReturn = [];  
  $toExtract = $allArray[ $id ];
  $arrayFields = explode( $lineSeparator, $toExtract );
  // $numFields = count($arrayFields) - 1;
  $i = 0;

  foreach ( $dictionaryData as $key => $content ) {
	
	$toReturn[ $key ] = $arrayFields[ $i ]; 
    $i++;
  }

  return $toReturn;
}


  //Retornar el template de los datos recien creados y actualizados

function return_data_on_template( $extractedData, $template, $wildcards ) {

  $numFields = count( $extractedData );
  $toReturn = $template;

  foreach ( $extractedData as $key => $value ) {
	$toReturn = str_replace( $wildcards[ $key ], $value, $toReturn );
  }

  return $toReturn;
}


/*

$wildcards = create_default_wildcards( $dictionaryData );
$template = create_default_template( $wildcards, "carro" );

$templateWithData = return_data_on_template( $extractedData, $template, $wildcards );

echo $templateWithData;
*/



function sanitize_data( $arrayToClean ) {

    // $arraySize = count( $arrayToClean );
    $toReturn = [];
    $cleanUp = array(
      "$" => "&#36;",
      "%" => "&#37;",
      "&" => "&#38;",
      "(" => "&#40;",
      ")" => "&#41;",
      "," => "&#44;",
      "/" => "&#47",
      ";" => "&#59;",
      "<" => "&#60;",
      ">" => "&#62;",
      "@" => "&#64;",
      "[" => "&#91;",
      "]" => "&#93;",
      "{" => "&#123;",
      "}" => "&#125;",
    );

    foreach ( $arrayToClean as $key => $value ) {
	  foreach ( $cleanUp as $search => $replace ) {
	    $arrayToClean[ $key ] = str_replace( $search , $replace , $arrayToClean[ $key ] );
	  }
	}
    return $arrayToClean;
  }




  //Imprime una lista de todo lo que existe en la base de datos linea por linea, (searchTo)=Bucar por, ej: buscar por "Name :" (subject)=Para saber que se busca, ej: carro o pedido
//PENDIENTE
function print_list( $dictionaryData, $allArray, $searchTo, $lineSeparator, $singularTheme ) {

  $size = count( $allArray ) - 1;
  $num = 1;

  for ( $i=0; $i<$size; $i++ ) {
    $dataToList = extract_data( $dictionaryData, $allArray, $i, $lineSeparator );

    $line = $singularTheme . '(' . $num . ') : ' . $dataToList[ $searchTo ];
    $line .= "</br><li class='verMas'>";
    $line .= "<a href='show.php?id=" . $i . "'> Ver más </a>";
    $line .= "</li> </br> <hr>";   

    echo $line;
    $num++;
  }
}
/*
*/


$singularTheme = 'Carro';
$lineSeparator = '|';
$searchTo = 'placa';
$id = 0;

$allArray = "
dato1|dato2|dato3|dato4|dto5|dato6,
perro1|perro2|perro3|perro4|perro5|perro6,
gato1|gato2|gato3|gato4|gato5|gato6,
pajaro1|pajaro2|pajaro3|pajaro4|pajaro5|pajaro6,
pez1|pez2|pez3|pez4|pez5|pez6,
";

$allArray = explode( ',', $allArray );

// print_r( $allArray[$id]."<br>" );


// $extractedData = extract_data( $dictionaryData, $allArray, $id, $lineSeparator );
// $newData = sanitize_data( $extractedData );


// print_r( $newData );

print_list( $dictionaryData, $allArray, $searchTo, $lineSeparator, $singularTheme );