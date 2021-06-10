<?php




                    //Works with associative type array


function build_the_form( $formType, $action='', $method='', $array, $extractedData ) {

  $formTypeUppercase = strtoupper( $formType );

  $fieldsArray = count( $array );  
  $bodyForm = "";

  if ( $formTypeUppercase == "CREATE" ) {
    foreach ( $array as $key => $type ) {

      $bodyForm .= "
      <p>" . $key . " :  
      <input type='" . $type . "' placeholder='". $key ."' name='data[" . $key . "]' required > </p>\n";
    }
  }
  else if ( $formTypeUppercase == "UPDATE" ) {
    foreach ( $array as $key => $type ) {

      if ( $type == 'number' ) {

        $bodyForm .= "
        <p>" . $key . " :  
        <input type='" . $type . "' placeholder='". $key ."' name='data[" . $key . "]' value='" . (int)$extractedData[$key] . "' required > </p>\n";
      }else{

        $bodyForm .= "
        <p>" . $key . " :  
        <input type='" . $type . "' placeholder='". $key ."' name='data[" . $key . "]' value='" . $extractedData[$key] . "' required > </p>\n";
      }
    }
  }


  //Assemble the form to return  

  //Form head
  $form = "<form action='" . $action . "' method='" . $method . "'>\n\n";

  //Form body
  $form .= $bodyForm;

  //Form footer
  $form .= "  
  </br>
  </br>	
  <input type='submit' value='Enviar' >
  <input type='reset' value='Borrar' >
  <br>    
  </form>\n";

  return $form;
}






//ARRAYS

  $extractedData = [
    "placa" => "jju4vt", 
    "marca" => "mazda", 
    "modelo" => "jolo", 
    "color" => "verde", 
    "precio" => 5462
  ];

//La key es el nombre de la variable y el valor es el tipo de input en el formulario
$prueba1 = [ 
  "placa" => "text", 
  "marca" => "text", 
  "modelo" => "text", 
  "color" => "text", 
  "precio" => "number"
];

$prueba2 = [ 'placa', 'marca', 'modelo' , 'color', 'precio' ];
$types = [ 'text', 'text', 'text', 'text', 'number' ];

$form = build_the_form( "update", "hola.php", "POST",  $prueba1 , $extractedData );

echo $form;





/*===T R A S H



  //choose how the form should be assembled depending on the type of array

  /*
  foreach ( $array as $name ) {  }

  if ( gettype($name) == 'integer' ) {

    //Array of type number
    for ( $i=0; $i<$fieldsArray; $i++ ) {

      $bodyForm .= "
      <p>" . $array[$i] . " :  
      <input type='" . $types[$i] . "' placeholder='". $array[$i] ."' > </p>\n";
    }
  }
  else if ( gettype($name) == 'string' ) {


    //Array of type associative
    foreach ( $array as $variable ) {

      $bodyForm .= "
      <p>" . $variable . " :  
      <input type='" . $types[$i] . "' placeholder='". $variable ."' > </p>\n";
    }
*/
