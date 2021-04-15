<?php
  require_once('../read/read.php');
  $id = $_GET[ 'id' ];

/*==============
 *  BUTTONS
 *==============*/
 
$bottonBack = "
<div class='menu' >        
    <div class='opcion' >
        <ul>
            <li> <a href='../index.html'> Volver al Inicio </a> </li>
        </ul>
    </div>
</div>
";


$options = "					
<h1> ¿Seguro que quieres eliminar este cliente? </h1>
	
	</br>
	</br>
	
	<div class='menu' >
    	<div class='opcion' >
    		<ul>
            	<li class='delete' > <a href='delete-user.php?id=$id' > Confirmar </a> </li>
    		</ul>
    	</div>
	</div>
	
	<div class='menu' >
    	<div class='opcion' >
    		<ul>
            	<li> <a href='../read/show.php?id=$id' > Cancelar </a> </li>
	    	</ul>
    	</div>
	</div>
";
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar</title>

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


.top-options{
	margin:auto;
	float:center;
}

</style>



<head>
<body>
		
		<?php
  		if ( $fileExists  ) {
  		
    		if ( $id > $totalData ) {

      		echo 'Este cliente NO existe!' . $bottonBack;    
    		}else {
    		   
				 	echo $options;
  		  }
  		}else{
					
    		echo 'El archivo de "Clientes" NO existe! ' . $bottonBack;
  		}
		?>

</body>
</html>
