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
    echo '<h1>Hello</h1>';
});

//Define a page 1 route
$f3->route('GET /page1', function (){
    echo '<h1>This is page 1</h1>';
});

$f3->route('GET /jewelry/rings/toe-rings', function (){
    //echo '<h1>Welcome to the jewelry Store</h1>';
    $template = new Template();
    echo $template->render('views/toe-rings.html');
});

$f3->route('GET /hello/@name',
    function ($f3, $params){
    //$name = $params['name'];
    //echo "<h1>Hello, $name</h1>";

    $f3->set('name', $params['name']);
        //echo '<h1>Welcome to the jewelry Store</h1>';
        $template = new Template();
        echo $template->render('views/hello.html');

});

$f3->route('GET /hi/@first/@last',
    function ($f3, $params){
        $f3->set('name', $params['name']);

        $f3->set('first', $params['first']);
        $f3->set('last', $params['last']);
        $f3->set('message', 'Hi');

        $template = new Template();
        echo $template->render('views/hi.html');

    });

$f3->route('GET /language/@lang',
    function ($f3, $params){
        switch ($params ['lang']) {
            case 'sawhili':
                echo 'Jumbo!';
                break;
            case 'spanish':
                echo 'Hola!';
                break;
            case 'russian':
                echo 'Privat!';
                break;
            case 'farsi':
                echo 'Salam!';
                break;
            //reroute to another page
            case 'french':
                $f3->reroute('/');
            //404
            default :
                $f3->error(404);
        }
    });


//run fat free
$f3->run();