<link href="https://fonts.googleapis.com/css2?family=Dosis&family=Lato&family=Lobster&family=Poppins&display=swap" rel="stylesheet">
<?php 

define("ROOT", dirname(__DIR__));

require ROOT."/Autoloader.php";
Autoloader::register();

session_start();

require ROOT."/Router.php";