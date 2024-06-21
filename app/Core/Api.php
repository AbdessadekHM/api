<?php

class Api {

     /**
     * Constructor to handle initial response if there's an error message
     * @param mixed $message Message to send in response
     * @param int $code HTTP status code
     */
    function __construct($message = null,$code = null){
        if($message != null && $code != 200){
            $this->sendJsonResponse($message,$code);
        }
    }
    /**
     * Send JSON response with optional HTTP status code
     * @param mixed $data Data to encode as JSON
     * @param int $statusCode HTTP status code (default: 200)
     */
    public static function sendJsonResponse($data, $statusCode = 200)
    {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }

    /**
     * Receive JSON input from the request body
     * @return mixed Parsed JSON data
     */
    public static function receiveJsonInput()
    {
        $input = file_get_contents('php://input');
        return json_decode($input, true);
    }
}
