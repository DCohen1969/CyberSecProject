<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace Application;

/**
 * Description of CustomException
 *
 * @author David
 */
class CustomException extends \Exception{
    
    public function __construct($message,$code) {
        parent::__construct($message, $code);
    }
}
