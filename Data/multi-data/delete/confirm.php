<?php

require_once('../read/read.php');

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
    color: white;
    background-color: red;
}

</style>

<head>
<body>



<h1> ¿Seguro que quieres eliminar el historial? </h1>

</br>
</br>

<div class="menu" >
    <div class="opcion" >
    	<ul>
            <li class="delete" > <a href="delete.php"> Confirmar </a> </li>
    	</ul>
    </div>
</div>

<div class="menu" >
    <div class="opcion" >
    	<ul>
            <li> <a href="../read/list.php"> Cancelar </a> </li>
	    </ul>
    </div>
</div>


</body>
</html>
