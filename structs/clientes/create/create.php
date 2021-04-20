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

<?php create_header_of_page( 'Cliente Creado' ) ?>

<body>

     <?php
     
       createData( $clientData , $filename , 'Cliente creado exitosamente' );
       print_Data_on_Template( $client , $template )  
     ?>
    
    <?php create_button( "../index.html" , 'Volver al Inicio' ); ?>
    
</body>
</html>
