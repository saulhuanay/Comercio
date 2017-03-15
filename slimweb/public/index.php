<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$app = new \Slim\App;

$app->get('/users', 'getUsers');

$app->get('/ws/{minimo}/{maximo}', function ($request, $response) {

	$data = file_get_contents("../archivo/employees.json");
	$empleados = json_decode($data, true);

    $minimo = number_format($request->getAttribute('minimo'),2);
    $maximo = number_format($request->getAttribute('maximo'),2);

    foreach ($empleados as $index => $arrContent) 
	{		
		$numero = explode("$", $arrContent["salary"]);
    	if (!($numero[1] >= $minimo && $numero[1] <= $maximo))
	    {
	    	unset($empleados[$index]);
	    }
	   
	}

	header('Content-Type: application/json');
	return json_encode($empleados);
});

$app->run();

function getUsers() {
	try {
		$data = file_get_contents("../archivo/employees.json");
		$empleados = json_decode($data, true);
	    echo json_encode($empleados);
  	} catch(PDOException $e) {
    	echo '{"error":{"text":'. $e->getMessage() .'}}'; 
  	}
}
