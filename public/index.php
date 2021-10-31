<?php
use Laminas\Diactoros\ServerRequestFactory;
use Laminas\Diactoros\Response;

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

$request = ServerRequestFactory::fromGlobals();
$request->withHeader('test', 'test');

$name = $request->getQueryParams()['name'] ?? 'Guest';
$response = new Response();
$response->getBody()->write("My name is ". $name);
$response = $response
->withHeader('MyNameIs', 'Andrey');

//$request->getParsedBody();

/*header('HTTP/1.0 '. $response->getStatusCode() . ' ' . $response->getReasonPhrase());
foreach ($response->getHeader('GET') as $name => $values) {
    header($name . ':' . implode(', ', values));
}*/
echo $response->getBody();
