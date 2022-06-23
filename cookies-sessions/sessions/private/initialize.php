<?php

//use ob_start() when code may be ported to other servers. Do not depend on the output buffering in the php.ini file.
ob_start();//output buffering is turned on
session_start(); 

//require_once('cookies.php');//cookies and sessions
require_once('functions.php');//getting the functions from the functions page
require_once('query_functions.php');//calling query_functions
require_once('validations.php');//calling validation_functions
?>