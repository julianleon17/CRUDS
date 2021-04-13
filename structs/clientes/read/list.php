<?php
  require_once( 'read.php' ); // Model

/*===============
 *  Functions
 *===============*/
 
 // Controller
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
 // View :
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>

    <link rel="stylesheet" href="../../../CSS/styles.css">
    
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
<body>
    <h1>Listado de Clientes</h1>
    
    <?php

  if ( !$fileExists ) {
      echo 'El archivo de "Clientes" NO existe!';
  } else if ( empty( $totalClientes ) ) {
      echo 'No se han encontrado "Clientes"!';
  } else {
 
    $contador = "<h2>~~~ Clientes encontrados " . $totalClientes . " ~~~</h2> </br><hr>";
    
      echo $contador;
      
      print_listClients( $filename );
      
        echo "
    			<div class='menu' >
            <div class='opcion' >
              <ul>
                <li class='delete'> <a href='../delete/confirm-historial.php'> Eliminar Lista </a> </li>
              </ul>
            </div>
          </div>      
        ";
   }
                 
    ?>
    

    <div class="menu" >
        <div class="opcion" >
            <ul>
                <li> <a href="../index.html"> Volver al Inicio </a> </li>
            </ul>
        </div>
    </div>
        
    
</body>
</html>
