<?php
/**
 * Created by PhpStorm.
 * User: kcbar
 * Date: 1/11/2018
 * Time: 11:04 AM
 */

//Require the autoload file
require_once('vendor/autoload.php');

//create an instance of the Base class
$f3 = Base::instance();

//Define a default route
$f3->route('GET /', function (){
    $view = new View;
    echo $view ->render('home.html');
});

//run fat free
$f3->run();