<?php

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
    $requestBody = file_get_contents('php://input');
    $json = json_decode($requestBody);
    $date_time = $json->queryResult->outputContexts[0]->parameters->date_time->date_time;
    $number = $json->queryResult->outputContexts[0]->parameters->number;
    $speech = "Reservation done for ".$number." people on ".$date_time;

    $response = new \stdClass();
    $response->fulfillmentText = $speech;
    $response->source = "webhook";
    echo json_encode($response);
}
else
{
    echo "Method not allowed";
}

?>




