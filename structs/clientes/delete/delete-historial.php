<?php

require_once('../read/read.php');
    
    if ( $fileExists  ) {
      
      unlink($filename);
      echo 'El archivo de Clientes fue eliminado exitosamente';
    }else{
      echo 'El archivo de "Clientes" NO existe! ';
    }
?>

<link rel="stylesheet" href="../../../CSS/styles.css">

<div class="menu" >
    <div class="opcion" >
	      <ul>
          <li> <a href="../index.html"> Volver al Inicio </a> </li>
		    </ul>
    </div>
</div>
