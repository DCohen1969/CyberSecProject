<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace Application;

/**
 * Description of ErrorExceptionHandler
 *
 * @author David
 */
class ErrorExceptionHandler {
    public function __construct() {
        set_error_handler(array($this, "errorHandler"));
    } 
    public function errorHandler($errorno,$message, $file, $line){
        $errorException=new \ErrorException($message,0,$errorno,$file,$line);
        register_shutdown_function('shutdown',$errorException);
        exit();
    }
}