<?php

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



       //Crear la cabecera de la pagina
       
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
       
       


                  //Crear botones        
       
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
       
       

