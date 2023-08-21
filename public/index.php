<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
session_start();

require_once '../vendor/autoload.php';
putenv("ENV_ENV=DEV");
require_once '../Application/Env.php';

use Application\Router;
use Application\Request;
use Application\ExceptionHandler;
use Application\ErrorExceptionHandler;
use Application\ExceptionInfo;
use Application\Logger;
use Application\View;
use Application\ErrorResponse;
use Application\Configuration;

$exceptionHancler=new ExceptionHandler();
$errorExceptionHancler=new ErrorExceptionHandler();

function shutDown($exception){
    if(isset($exception)){
        $exceptionInfo = new ExceptionInfo($exception); 
        Configuration::getInstance()->loadConfig("error.php");
        $logger= new Logger("error.log",$exceptionInfo);
        $logger->write();
        $view=new View("error.env.".strtolower(getenv("ENV_ENV")),array("exception"=> $exceptionInfo));
        $response= new ErrorResponse($view,404);
        $response->send();
    }    
}

try{
    $request= new Request($_GET,$_POST, $_COOKIE, $_SERVER, $_ENV, $_FILES,$_SESSION,apache_request_headers());
    //print("<pre>  'request' = ".print_r($requests,true)."</pre>");
    //Configuration::getInstance()->get("service");
}catch(\Throwable $ex){
    throw $ex;
}



