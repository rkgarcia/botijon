<?php
//initialize the help array
$helpArr = array();
$commands = array();

//include database
if ( ! include_once("include/clsDb.php")){
	throw  new Exception('No de pudo incluir la clase que maneja la base de datos.');
}

//include functions
if ( ! include_once("include/functions.php")){
	throw new Exception('No se pudo incluir el archivo de funciones');
}

//include the proces id manage
if ( ! include_once("include/pidmanager.php")){
	throw new Exception('No se pudo incluir el archivo manejador de procesos.');
}

//include configuration file
if ( ! include_once("config/dbconfig.php")){
	throw new Exception('No se pudo incluir el archivo de configuracion de la base de datos.');
}

//include configuration file
if ( ! include_once("config/config.php")){
	throw new Exception('No se pudo incluir el archivo de configuracion del bot.');
}

//include irc bot class
if ( ! include_once("include/ircbot.php")){
	throw  new Exception('No se pudo incluir la clase ircbot.php');
}

//include command class
if ( ! include_once("include/command.php")){
	throw new Exception('No se pudo incluir la clase command.php');
}

//instantiate the process id manager
$pid = new pidmanager();
if ( ! $pid instanceof pidmanager ){
	throw new Exception('No se pudo crear instancia del la clase pidmanager.');
}

//instantiate the database
$db = new clsDb();
if ( ! $db instanceof clsDb ){
	throw new Exception('No se pudo instanciar la clase manejadora de la base de datos');
}


//set the formatting characters
$formattingchars = array();
$formattingchars[] = chr(hexdec('1f'));//underline
$formattingchars[] = chr(hexdec('0f'));//underline
$formattingchars[] = chr(hexdec(2)); //bold 
$formattingchars[] = chr(hexdec(16)); //white text on black background

$colorcode = chr(hexdec(3));//color character
for ( $i = 0; $i <= 15; $i++){
	$num = str_pad($i, 2, '0', STR_PAD_LEFT);
	$formattingchars[] = $colorcode . $num;
}