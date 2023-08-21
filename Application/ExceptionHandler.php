<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace Application;

/**
 * Description of ExceptionHandler
 *
 * @author David
 */
class ExceptionHandler {
    
    public function __construct() {
        set_exception_handler(array($this, 'exceptionHandler'));
   }

   public function exceptionHandler($exception) {
       register_shutdown_function('shutdown',$exception);
       exit();
   }    
}
