<?php
require_once('../read/read.php');

	$id = $_GET['id'];
	
  leerBase();	
	
	$client = $clients[$id];
	$client = explode( "</br>" , $client );
	$client = str_replace( "Nombre :" , "" , $client );
	$client = $client[0];	
	
  echo "</br></br>El Cliente ( <b>$client</b> ) fue eliminado con éxito.";
  
	
	unset( $clients[$id] );
	
	$clients = array_values( $clients );
	
  sobre_escribir_Base( $clients );
		


/*=========================
 * 		Functions
 *=========================*/
function leerBase(){

	global $filename;
	global $clients;
		
	$data = file_get_contents($filename);
	$clients = explode("," , $data );
	
}


function sobre_escribir_Base($newData){

	global $filename;
	
	$array = $newData;
	$newData = implode(",", $array);
	
	if( file_exists($filename) ){
			
		file_put_contents( $filename, $newData);
		
	}else{
		echo "No existe.\n";
	}
}


//===========================
    
    
    


?>

<link rel="stylesheet" href="../../../CSS/styles.css">

<div class="menu" >
    <div class="opcion" >
	    <ul>
            <li> <a href="../index.html"> Volver al Inicio </a> </li>
		</ul>
    </div>
</div>
