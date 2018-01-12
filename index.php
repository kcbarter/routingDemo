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
    echo $view ->render('views/hello.html');
});

//Define a page 1 route
$f3->route('GET/page1', function (){
    echo '<h1>This is page 1</h1>';
});

//run fat free
$f3->run();