<?php

require 'classes/Dbh3.php';
require 'classes/UserAuth.php';
require 'classes/Route.php';

$route = new formController();

$route->handleForm();
?>