<?php
/*=======================
    S  E  T  T  I  N  G  S

 Elige "true" para Modificar el template de manera manual! El software te dará un template por defecto, y tu 
 lo podrás modificar a tu antojo, claro está que si agregas o eliminas un campo del array de 
 datos que serán creados debes agregar posteriormente ese espacio de manera manual en el template.

 Elige "false" para que el Software adminstre el template de manera automatica! Esta opciòn es la recomendad
 ya que el template se actualizará de forma automatica en caso de agregar o eliminar los datos que serán creados.

-Si eliges modificar el template, el software te dará un template por defecto, y tu 
 lo podrás modificar a tu antojo, claro está que si agregas o eliminas un campo de los 
 datos que serán creados debes agregar ese espacio de manera manual en el template.
 Lo recomendado es dejarlo sin modificar, ya que el template se actualizará en caso de agregar o eliminar
 los datos que serán creados.
 Si vas a modificar el template, cambia el valor de '$modifyTemplate' a true, sino, dejalo como está.
*=======================*/

$controller = '';
$settingsFilePath = '';

if ( isset( $_REQUEST[ 'controller' ] ) && trim( $_REQUEST[ 'controller' ] ) !== '' ) {
  $controller = strtolower( trim( $_REQUEST[ 'controller' ] ) );
  $settingsFilePath = ( dirname( __FILE__ ) . '/../settings/' . $controller . '.php' );
}

if ( ( $settingsFilePath !== '' ) && file_exists( $settingsFilePath ) ) {
  require_once( $settingsFilePath );
} else {
  $controller = $_REQUEST[ 'controller' ] = 'structures';
  $modifyTemplate = false; // "false" para que el Software lo modifique automaticamente

  // Tema a tratar ej: (sigular)Arbol, (plural)Arboles
  $singularTheme = 'Structure';
  $pluralTheme = 'Structures';

  // El nombre de la variable es la key
  $dictionaryData = [ 
    "val1" => array( 'type' => "text", 'required' => true ),
    "val2" => array( 'type' => "text", 'required' => true ),
    "val3" => array( 'type' => "text", 'required' => true ),
  ];

  // Es el nombre de dato por la que quieres listar la información
  $searchTo = "val1"; 
}
