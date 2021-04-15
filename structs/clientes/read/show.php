<?php
  require_once('read.php'); //Model
  $id = $_GET[ 'id' ];
  
/*==============
 *  BUTTONS
 *==============*/
    
$bottons = "    	   	
<div class='opcion' >
    <ul class='top-options' >
       <li > <a href='../update/edit.php?id=$id' > Editar </a> </li>
    </ul>
</div>

<div class='opcion' >
    <ul class='top-options'>
       <li > <a class='delete' href='../delete/confirm-user.php?id=$id' > Eliminar </a> </li>
    </ul>
</div>    	   	
";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente</title>

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
    
    <?php 
    	
    	if ( !$fileExists ) {
    	
    	   echo 'El archivo de "Clientes" NO existe! ';
    	         	
    	}else{
    	
    		if ( !( $id > ( $totalData -1 ) ) ) {
    		  
    		  $clientExists = true;
    		  
         	$template = file_get_contents("../templates/cliente.template");
    	   	$template = extractClientData_on_Template( $clients , $id , $template );		
    		  
    	   	echo $template;    	      	   	
    		}else{
    	    
      	  echo 'Este cliente NO existe!' ;    
    		}
    	}
    	
    ?>

    <div class="menu" >
        
        <?php if ( !$clientExists ){  }else{ echo $bottons; } ?>

        <div class="opcion" >
            <ul>
                <li> <a href="list.php"> Volver a la Lista </a> </li>
            </ul>
        </div>
    </div>
</body>
</html>
