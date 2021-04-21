<?php
  require_once( '../read/read.php' );
?>

<?php  create_header_of_page( 'Registrar Nuevo producto' );  ?>

<body>
    <h1>NUEVO PRODUCTO</h1>
    </br>
    
    <form action="create.php" method="POST">

        <p><b>Nombre del Producto:</b> <input type="text" placeholder="Nombre" name="product[name]" required > </p>
        <p><b>Precio del Producto:</b> <input type="num" placeholder="Nombre" name="product[price]" required > </p>
        
        <p><b> Descripción del Producto :</b> <textarea rows="5" cols="50" placeholder="Escribe una descripción del producto" name="product[description]"></textarea> </p>
        
        <input type="submit" value="Enviar" >
        <input type="reset" value="Borrar" >
        <br>    

    </form>
    
        <?php create_button( "../index.html" , 'Volver al Inicio' ); ?>

</body>
</html>
