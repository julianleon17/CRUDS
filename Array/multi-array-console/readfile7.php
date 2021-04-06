<?php

require_once( "read/read.php" );
$filename2 = "./baseDatos2.db";



//===================Functions

function leerBase(){

	global $filename;
	global $pedidos;
	
	$data = file_get_contents($filename);
	$pedidos = explode("," , $data );
	
	//print_r($pedidos);
}






function sobre_escribir_Base($newData){

	global $filename;
	//global $pedidos;
	//global $data;
	
	$array = $newData;
	$newData = implode(",", $array);
	
	if( file_exists($filename) ){
			
		file_put_contents( $filename, $newData);
		
		/*
		leerBase();
		print_r( $pedidos );
		*/		
		echo "\n Actualizado correctamente.\n";
		
	}else{
		echo "No existe.\n";
	}
}




function reestablecerBase(){
		
		global $filename2;
		global $filename;
		global $pedidos;
		
	if( file_exists($filename) ){
		
		$filenamePro;
		
		$filenamePro = file_get_contents($filename2);
		
		file_put_contents($filename , $filenamePro);
	
	
	//Limpio los reciduos de la dataBase
	
		leerBase();
	
		$maxPedid = (count($pedidos) - 1) ;
	
		unset( $pedidos[$maxPedid] );
		$pedidos = array_values($pedidos);
		
		sobre_escribir_Base($pedidos);
	}
}




//===================Functions



	reestablecerBase();
	
leerBase();
print_r($pedidos);


$question = readLine("Deseas eliminar un usuario? y/n : ");

if($question == "y"){

	$question = readLine("Elije el número : ");	
	
	unset( $pedidos[$question] );
	$pedidos = array_values($pedidos);
	
	sobre_escribir_Base($pedidos);
	print_r($pedidos);
	
	
	
}else if($question == "n"){
	die();
}
//============Pruebas





/*===========Basura

	//Limpio los reciduos de la dataBase
	
	
function limpiarBase(){

	leerBase();

	$maxPedid = (count($pedidos) - 1) ;

	unset( $pedidos[$maxPedid] );
	$pedidos = array_values($pedidos);

	sobre_escribir_Base($pedidos);

}








//echo $separado_por_comas;

*/

?>
