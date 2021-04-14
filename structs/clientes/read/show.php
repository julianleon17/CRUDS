<?php
  require_once("read.php");
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
    color: white;
    background-color: red;
}


.top-options{
	margin:auto;
	float:center;
}

</style>

</head>
<body>
    
    <?php 
    	$id = $_GET['id'];
    	
      $template = file_get_contents("../templates/cliente.template");
    	$template = extractClientData_on_Template( $clients , $id , $template );		
    	
    	echo $template;
    ?>

    <div class="menu" >
        
        <div class="opcion" >
            <ul class="top-options" >
                <li > <a href="../update/edit.php?id=<?php echo $id; ?>" > Editar </a> </li>
            </ul>
        </div>
        
        <div class="opcion" >
            <ul class="top-options">
                <li > <a class="delete" href="../delete/confirm-user.php?id=<?php echo $id; ?>" > Eliminar </a> </li>
            </ul>
        </div>

        <div class="opcion" >
            <ul>
                <li> <a href="list.php"> Volver a la Lista </a> </li>
            </ul>
        </div>
    </div>
</body>
</html>
