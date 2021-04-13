<?php


							//Extraer los datos del cliente y lo retorna sobre el template

function extractClientData_on_Template( $array , $key , $template ) {

  $dictionary = [ "%NAME%", "%TEL%", "%EMAIL%", "%ADR%" ];

  $clients = $array;
  $client = $clients[$key];

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


             //Sobre escribir la base de datos

function update_Base( $newData , $filename , $message='' ) {

	$filename = $filename;
	
	$array = $newData;
	$newData = implode(",", $array);
	
	if( file_exists($filename) ) {
			
		file_put_contents( $filename, $newData);
		
		echo $message;
	
	}else{
		echo "No existe.\n";
	}
}

           //Eliminar un cliente

function deleteClient( $array , $key , $filename ){

      $clients = $array;
			
			$client = $clients[ $key ];
			$client = explode( "</br>" , $client );
			$client = str_replace( "Nombre :" , "" , $client );
			$client = $client[0];	
			
			echo "</br></br>El Cliente ( <b>$client</b> ) fue eliminado con éxito.";

			unset( $clients[ $key ] );
			
			$clients = array_values( $clients );
      
			update_Base( $clients , $filename );
}





          //Extrae los datos del cliente y devuelve un array asociativo (O hash)
            
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
          
 function print_listClients( $filename ){
      
   $handle = fopen( $filename , 'r' );
   
   $id = 0;
   $numClient = 1;
   
   while( ( $line = fgets( $handle ) ) !== false ){   
   
     if( strpos($line, "Nombre :") !== false ){
            
       $line = str_replace( "Nombre :" , "" , $line );
       
       $line = "<b>Cliente ($numClient) : </b>" . $line . "</br>";
       $line .= "<a href='show.php?id=" . $id . "'> Ver más </a>";
       $line .= "</br> <hr> </br>";

       echo  $line;
       
       $id += 1;
       $numClient += 1;       
     }
   }
   
   fclose( $hanlde );
 }


		/*
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
