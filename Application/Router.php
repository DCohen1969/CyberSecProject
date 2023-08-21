<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */
namespace Application;
/**
 * Class of objects in charge of routing requests
 * @author David
 */
class Router implements routerInterface{
    protected $request;
    protected $config;
    
    
    public function filterRequestQuery() {
        $tempArgs=explode("&",$this->request->getQuery());
    }

    public function route() {
        
    }
    
    public function __construct($request,$config) {
        $this->request = $request;
        $this->config = $config;
    }

}
