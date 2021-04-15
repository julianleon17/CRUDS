<?php
  require_once('../read/read.php');
  $id = $_GET['id'];
?>

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



<?php

  if ( $fileExists  ) {
		
    if ( $id > $totalDatos ) {
    
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
