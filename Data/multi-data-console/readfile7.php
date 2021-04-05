<?php

require_once( "read/read.php" );

	//reestablecerBase();
	
leerBase();

$question = readLine("Deseas eliminar un usuario? y/n : ");

if($question == "y"){

	$question = readLine("Elije el número : ");	
	
	unset( $pedidos[$question] );
	$pedidos = array_values($pedidos);
	
	sobre_ecribir_Base($pedidos);
	
	
}else if($question == "n"){
	die();
}





//===================Functions

function leerBase(){

	global $filename;
	global $pedidos;
	
	$data = file_get_contents($filename);
	$pedidos = explode("," , $data );
	
	print_r($pedidos);
}

function sobre_ecribir_Base($newData){

	global $filename;
	
	$array = $newData;
	$newData = implode(",", $array);
	
	if( file_exists($filename) ){
		$oldData = file_get_contents($filename);
		
		$oldData = $newData;
		
		file_put_contents( $filename, $newData);
		
		leerBase();
		
		echo "\n Actualizado correctamente.\n";		
		
	}else{
		echo "No existe.\n";
	}
}

function reestablecerBase(){
		
		global $filename;
		
	if( file_exists($filename) ){
	
		$filenamePro = "./baseDatos2.db";
		
		$filenamePro = file_get_contents($filenamePro);
		
		file_put_contents($filename , $filenamePro);
	}
}


//============Pruebas





/*===========Basura


//echo $separado_por_comas;

*/

?>
