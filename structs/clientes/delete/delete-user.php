<?php
  require_once('../read/read.php');
?>

<link rel="stylesheet" href="../../../CSS/styles.css">

<?php

  if ( $fileExists  ) {
			
		$id = $_GET['id'];
		
    if ( $id > $totalClientes ) {
    
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
