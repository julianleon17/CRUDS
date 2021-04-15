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


<div class="menu" >
    <div class="opcion" >
	      <ul>
          <li> <a href="../index.html"> Volver al Inicio </a> </li>
		    </ul>
    </div>
</div>
