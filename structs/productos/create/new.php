<?php
  require_once( '../read/read.php' );

//=======================View :
create_header_of_page( "Registrar Nuevo $singularTheme" );  
?>

<body>
    <h1>Nuevo <?php echo $singularTheme; ?> </h1>
    </br>
    
    <form action="create.php" method="POST">

        <p><b>Nombre del <?php echo $singularTheme ?>:</b> 
        <input type="text" placeholder="Nombre" name="data[name]" required > </p>
        
        
        <p><b>Precio del <?php echo $singularTheme ?>:</b> 
        <input type="number" placeholder="Precio" name="data[price]" required > </p>
        
        
        
        <p><b> Descripción del <?php echo $singularTheme ?> :</b> 
        <textarea rows="5" cols="50" placeholder="Escribe una descripción del <?php echo $singularTheme; ?>" name="data[description]"></textarea> </p>
        
        
        
        <input type="submit" value="Enviar" >
        <input type="reset" value="Borrar" >
        <br>    

    </form>
    
        <?php create_button( "../index.php" , 'Volver al Inicio' ); ?>

</body>
</html>
