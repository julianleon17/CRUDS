<?php
/*=======================
    S  E  T  T  I  N  G  S
	
-Si eliges modificar el template, el software te dará un template por defecto, y tu 
 lo podrás modificar a tu antojo, claro está que si agregas o eliminas un campo de los 
 datos que serán creados debes agregar ese espacio de manera manual en el template.
 Lo recomendado es dejarlo sin modificar, ya que el template se actualizará en caso de agregar o eliminar
 los datos que serán creados.
 Si vas a modificar el template, cambia el valor de '$modifyTemplate' a true, sino, dejalo como está.
*=======================*/
$modifyTemplate = false;

// Tema a tratar ej: (sigular)Arbol, (plural)Arboles
$singularTheme = 'Carro';
$pluralTheme = 'Carros';

$searchTo = "Marca :"; // Es la key por la que quieres listar la información

// Elnombre de la variable es la key
$dictionaryData = [ 
  "placa" => array( 'type' => "text", 'required' => true ),
  "marca" => array( 'type' => "text", 'required' => true ),
  "modelo" => array( 'type' => "text" ),
  "color" => array( 'type' => "text" ),
  "precio" => array( 'type' => "number" ),
];
