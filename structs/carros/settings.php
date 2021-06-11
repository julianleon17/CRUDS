<?php
  /*=======================
   *    S E T T I N G S
   *=======================*/

//Tema sobre el que trata ej: (sigular)Arbol, (plural)Arboles
$pluralTheme = 'Carros';
$singularTheme = 'Julian';


//La key es el nombre de la variable
$dictionaryData = [ 
  "placa" => array( 'type' => "text", 'required' => true ),
  "marca" => array( 'type' => "text", 'required' => true ),
  "modelo" => array( 'type' => "text" ),
  "color" => array( 'type' => "text" ),
  "precio" => array( 'type' => "number" ),
  "producto" => array( 'type' => "select", 'options' => array( 'key' => 'Value', 'key2' => 'Value2' ) )
];


