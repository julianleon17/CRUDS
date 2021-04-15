<?php

/*======================================================================================================================================================
 *
 *                                                        F   U   N   C   T   I   O   N   S
 *
 *======================================================================================================================================================*/
																		

							//Extraer los datos del cliente y lo retorna sobre el template

function extractClientData_on_Template( $array , $key , $template ) {

  $dictionary = [ "%NAME%", "%TEL%", "%EMAIL%", "%ADR%" ];

  $client = $array[$key];

	$clientFields = explode( "</br>" , $client );
	$clientFieldsData = preg_replace( "[Nombre :|Telefono :|Email :|Direccion :]" , "" , $clientFields ); // Sanitize Fields

	$numFields = count( $clientFieldsData );
	$idCliente = $key + 1;
	
	$template = str_replace( "DATOS DEL CLIENTE", "DATOS DEL CLIENTE ( $idCliente )" , $template );
	
	for ( $i = 0; $i < $numFields; $i++ ) {
	  $template = str_replace( $dictionary[ $i ], $clientFieldsData[ $i ], $template );
	}
	
	return $template;
}

           //Eliminar un cliente

function deleteClient( $array , $key , $filename ){

			$client = $array[ $key ];
			$client = explode( "</br>" , $client );
			$client = str_replace( "Nombre :" , "" , $client );
			$client = $client[0];	
			
			echo "</br></br>El Cliente ( <b>$client</b> ) fue eliminado con éxito.";

			unset( $array[ $key ] );
			
			$array = array_values( $array );
      
			update_Base( $array , $filename );
}





          //Extrae los datos del cliente y devuelve un array asociativo. Estos son los campos del array devuelto : ('name', 'phone', 'email', 'address')
            
function extractClientData( $array , $key ){

  $dictionary = [ 'name', 'phone', 'email', 'address' ];
  $dataFilds = [];  
    
  $clients = $array;
  $client = $clients[ $key ];
	
	$clientFilds = explode( "</br>" , $client );
	$clientFildsData = preg_replace( "[Nombre :|Telefono :|Email :|Direccion :]" , "" , $clientFilds );

	$numFilds = count($clientFildsData);
	$idCliente = $key + 1;
	
	for ( $i = 0; $i < $numFilds; $i++ ) {
	  $dataFilds[ $dictionary[ $i ] ] = $clientFildsData[ $i ];
	}

	return $dataFilds;
}





          //Imprime una lista con todos los nombres de los clientes existentes
          
  // Controller          
function print_listClients( $filename , $totalData ){
 
   $contador = "<h2>~~~ Clientes encontrados " . $totalData . " ~~~</h2> </br><hr>";
    
   echo $contador;
      
   $handle = fopen( $filename , 'r' );
   
   $id = 0;
   $numClient = 1;
   
   while( ( $line = fgets( $handle ) ) !== false ){   
   
     if( strpos($line, "Nombre :") !== false ){
            
       $line = str_replace( "Nombre :" , "" , $line );
       
       $line = "<b>Cliente ($numClient) : </b>" . $line . "</br><li class='verMas'>";
       $line .= "<a href='show.php?id=" . $id . "'> Ver más </a></li>";
       $line .= "</br> <hr> </br>";

       echo  $line;
       
       $id += 1;
       $numClient += 1;       
     }
   }
   
   fclose( $hanlde );
}



       //Saneamiento de los datos del cliente para crear y actualizar
       
function sanitize_dataClient( $client ) {

    $client['name'] = filter_var( $client[ 'name' ] , FILTER_SANITIZE_STRING );
    $client[ 'phone' ] = filter_var( $client[ 'phone' ] , FILTER_SANITIZE_NUMBER_INT );
    $client = str_replace( "," , "" , $client );

    return $client;
}




         //Imprimir el template de los datos actualizados
         
function print_Data_on_Template( $array , $template ) {

  $template = file_get_contents( $template );

  $dictionaryTemplate = [ "%NAME%", "%TEL%", "%EMAIL%", "%ADR%" ];
  $dictionaryData = [ 'name', 'phone', 'email', 'address' ];
  
  $numFields = count( $array );
  
  for ( $i = 0; $i < $numFields; $i++ ) {
	  $template	= str_replace( $dictionaryTemplate[ $i ] , $array[ $dictionaryData[ $i ] ] , $template );
  }

  echo $template;
}



/*===============================================================
 *       Lo que creo me sirve de forma global (Otras estructuras)
 *===============================================================*/

             //Crear un dato

function createData( $data , $filename , $message='' ) {

  if ( file_exists( $filename ) ) {
  
    $oldData = file_get_contents($filename);
    $oldData .= $data; 
    file_put_contents($filename, $oldData);
        
  } else {
  
    file_put_contents($filename, $data);    
    
  }
  echo $message;
}

      
      
      //Eliminar un dato
      
function deleteData( $array , $key , $filename , $message='' ){

			unset( $array[ $key ] );
			
			$array = array_values( $array );
      
			update_Base( $array , $filename , $message );
}



             //Sobre escribir la base de datos

function update_Base( $newData , $filename , $message='' ) {

	$array = $newData;
	$newData = implode(",", $array);
	
	if( file_exists($filename) ) {
			
		file_put_contents( $filename, $newData);
		
		echo $message;
	
	}else{
		echo "No existe.\n";
	}
}









		/*BASURA
// printClientData
// echoClientData
// getClientData
// extractAndRaturnClientData
// extractClientData( $param1, $param2, $param3 )
// extractClientData( $args )
// $arg[ 'param1' ]
// $arg[ 'param2' ]
// $arg[ 'param3' ]
// $arg[ 'param4' ]
// extractClientData( $clients[ $key ], $template = '' )
*/
