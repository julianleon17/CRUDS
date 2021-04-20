<?php
  require_once( '../read/read.php' );
?>

<?php  create_header_of_page( 'Registrar Nuevo Cliente' );  ?>

<body>
    <form action="create.php" method="POST">

        <p><b>Nombre del Cliente:</b> <input type="text" placeholder="Su Nombre" name="client[name]" required > </p>
        
        <p><b>Número Celular:</b> <input type="number" placeholder="Número de celular" name="client[phone]" required > </p>
        
        <p><b>Email:</b> <input type="email" placeholder="Email" name="client[email]" required > </p>
        
        <p><b>Dirección:</b> <input type="number" placeholder="Dirección" name="client[address]" required > </p>

        <input type="submit" value="Enviar" >
        <input type="reset" value="Borrar" >
        <br>    

    </form>
    
        <?php create_button( "../index.html" , 'Volver al Inicio' ); ?>

</body>
</html>
