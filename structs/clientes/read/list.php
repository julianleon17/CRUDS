<?php
  require_once( 'read.php' ); // Model
  
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

.delete {
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


.top-options{
	margin:auto;
	float:center;
}

</style>



</head>
<body>
    <h1>Listado de Clientes</h1>
    
    <?php
  		if ( !$fileExists ) {
      		echo 'El archivo de "Clientes" NO existe!';
  		} else if ( empty( $totalData ) ) {
      		echo 'No se han encontrado "Clientes"!';
  		} else {
  		
      		print_listClients( $filename , $totalData );
      		
      		$buttonDelete = "
          		<div class='opcion' >
            		<ul>
              		<li> <a class='delete' href='../delete/confirm-historial.php'> Eliminar Lista </a> </li>
            		</ul>
          		</div>
      		";
   		}           
    ?>
    

    <div class="menu" >
    
        <?php if( $fileExists ) { echo $buttonDelete; } ?>
        
        <div class="opcion" >
            <ul>
                <li> <a href="../index.html"> Volver al Inicio </a> </li>
            </ul>
        </div>
    </div>
        
    
</body>
</html>
