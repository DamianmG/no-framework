<?php declare(strict_types = 1);

namespace Example;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

require __DIR__ . '/../vendor/autoload.php';

error_reporting(E_ALL);

$environment = 'development';

/**
* Register the error handler
*/
$whoops = new \Whoops\Run;
if ($environment !== 'production') {
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
} else {
    $whoops->pushHandler(function($e){
        echo 'Todo: Friendly error page and send an email to the developer';
    });
}
$whoops->register();



$request = Request::createFromGlobals();

$response = new Response(
    'Content',
    Response::HTTP_OK,
    ['content-type' => 'text/html']
);

echo $response;