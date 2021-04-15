<?php
  require_once( "../read/read.php" );
  
					/*========Template=========*/
  $template = "../templates/cliente.template";


          //Data of client
  
  $client = $_POST['client'];
  $client = sanitize_dataClient( $client );

  $clientData = 'Nombre :' . $client['name'] . "</br>\n";
  $clientData .= 'Telefono :' . $client['phone'] . "</br>\n";
  $clientData .= 'Email :' . $client['email'] . "</br>\n";
  $clientData .= 'Direccion :' . $client['address'] . "</br>\n";
  $clientData .= ",\n";
  
?>    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente creado</title>
    
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



</head>
<body>

     <?php
     
       createData( $clientData , $filename , 'Cliente creado exitosamente' );
       print_Data_on_Template( $client , $template )  
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
