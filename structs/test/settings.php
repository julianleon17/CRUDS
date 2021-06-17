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
$modifyTemplate = false; // "false" para que el Software lo modifique automaticamente

// Tema a tratar ej: (sigular)Arbol, (plural)Arboles
$singularTheme = 'Carro';
$pluralTheme = 'Carros';

// El nombre de la variable es la key
$dictionaryData = [ 
  "marca" => array( 'type' => "text", 'required' => true ),
  "color" => array( 'type' => "text", 'required' => true ),
  "precio" => array( 'type' => "number", 'required' => true ),
];

// Es el nombre de dato por la que quieres listar la información
$searchTo = "marca"; 
