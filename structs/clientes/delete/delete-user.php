<?php
require_once('../read/read.php');



/*=========================
 * 		Functions
 *=========================*/
 
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

?>

<link rel="stylesheet" href="../../../CSS/styles.css">

<?php

  if ( $fileExists  ) {
			
		$id = $_GET['id'];
		
    if ( $id > $totalClientes ) {
    
      echo 'Este cliente NO existe!' ;    
    }else { 
			
			deleteClient( $clients , $id , $filename );
    }
  } else {
    
    echo 'El archivo de "Clientes" NO existe! ';
  }

?>

<div class="menu" >
    <div class="opcion" >
	    <ul>
            <li> <a href="../index.html"> Volver al Inicio </a> </li>
		</ul>
    </div>
</div>
