<?php

session_start();

require "../app/core/init.php"; 

if(DEBUG)
{
    ini_set('display error', 1);
}else
{
    ini_set('display error', 0);
}

$app = new App();
$app->loadController();
