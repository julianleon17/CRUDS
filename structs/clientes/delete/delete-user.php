<?php
require_once('../read/read.php');

	$id = $_GET['id'];
	$user = $id + 1;
	
	leerBase();	
	
	unset( $clients[$id] );
	$clients = array_values($pedidos);
	
	sobre_escribir_Base($pedidos);
	
    echo "</br></br>El Cliente <b>$user</b> fue eliminado con éxito.";



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
