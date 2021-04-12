<?php
require_once("../read/read.php");

    $data = file_get_contents( $filename );
    $pedidos = explode(',' , $data );

$id = $_GET['id'];

$numCliente = $id + 1;


extractData($id);

/*=========================
 *		Functions
 *=========================*/
 
 $name;
 $tel;
 $ped;
	
 
 function extractData($key){
	//Mirar linea por linea cada pedido
	
	global $pedidos;
	global $pedido;
	
	global $name;
	global $tel;
	global $ped;
	
	$numUser = $pedidos[$key];
	
	$pedido = explode( "</br>" , $numUser );
	$pedido = preg_replace("[Nombre :|Telefono :|Pedido :]" , "" , $pedido);

	$numDatos = count($pedido);
	
	for($i = 0; $i < $numDatos; $i ++){
	
		if( $i == 0 ){
			$name = $pedido[$i] ;
		}
		
		if( $i == 1 ){
			$tel = (int)$pedido[$i];
		}
		
		if( $i == 2 ){
			$ped = $pedido[$i];
		}
	}	
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>

    <link rel="stylesheet" href="../../../CSS/styles.css">
</head>
<body>
	<h1> Pedido del Cliente <?php echo $numCliente; ?> </h1>
    <form action="update.php?id=<?php echo $id?>" method="POST">
    

        <p><b>Nombre del Cliente:</b> <input type="text" placeholder="Su Nombre" name="nombre" value="<?php echo $name; ?>" required/> </p>
        <p><b>Número Celular:</b> <input type="number" placeholder="Su Número" name="celular" value="<?php echo $tel; ?>" required/> </p> 
        <br>
        
        <p> <b>Pedido: </b> (<?php echo $ped; ?> )  
            <br> 
            <br> 
        
            <input type="radio" name="pedido" id="Hamburguesa"  value="Hamburguesa" required=""/> 
            <label for="Hamburguesa">Hamburguesa</label>
            <br>
            <br>

            <input type="radio" name="pedido" id="Platano"  value="Platano" required=""/>  
            <label for="Platano">Platano</label>
            <br>
            <br>

            <input type="radio" name="pedido" id="PerroFrito"  value="Perro Frito" required=""/> 
            <label for="PerroFrito">Perro Frito</label>
            <br>
            <br>

            <input type="radio" name="pedido" id="GatoFrito"  value="Gato Frito" required=""/> 
            <label for="GatoFrito">Gato Frito</label>
            <br>
            <br>
        </p>

        <input type="submit" value="Enviar" >
        <input type="reset" value="Borrar" >
        <br>    

        <div class="menu" >
            <div class="opcion" >
	            <ul>
                    <li> <a href="../read/show.php?id=<?php echo $id; ?>"> Cancelar </a> </li>
    	        </ul>
            </div>
        </div>
    </form>

</body>
</html>
