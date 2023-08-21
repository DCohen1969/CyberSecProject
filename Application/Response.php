<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace Application;

use Application\HttpConstants;
/**
 * Description of Response
 *
 * @author David
 */
class Response {
    protected $protocolName;
    protected $protocolVersion;
    protected $statusCode;
    protected $reasonPhrase;
    protected $headers;
    protected $body;
    protected $request;
    protected $view;
    protected $render;
    
    public function getProtocolName() {
        return $this->protocolName;
    }

    public function getProtocolVersion() {
        return $this->protocolVersion;
    }

    public function getStatusCode() {
        return $this->statusCode;
    }

    public function getReasonPhrase() {
        return $this->reasonPhrase;
    }

    public function getHeaders() {
        return $this->headers;
    }

    public function getBody() {
        return $this->body;
    }

    public function getRequest() {
        return $this->request;
    }

    public function getView() {
        return $this->view;
    }

    public function getRender() {
        return $this->render;
    }

    public function setProtocolName($protocolName): void {
        $this->protocolName = $protocolName;
    }

    public function setProtocolVersion($protocolVersion): void {
        $this->protocolVersion = $protocolVersion;
    }

    public function setStatusCode($statusCode): void {
        $this->statusCode = $statusCode;
    }

    public function setReasonPhrase($reasonPhrase): void {
        $this->reasonPhrase = $reasonPhrase;
    }

    public function setHeaders($headers): void {
        $this->headers = $headers;
    }

    public function setBody($body): void {
        $this->body = $body;
    }

    public function setRequest($request): void {
        $this->request = $request;
    }

    public function setView($view): void {
        $this->view = $view;
    }

    public function setRender($render): void {
        $this->render = $render;
    }
    
    
    public function getStatusLine(){
        return $this->protocolName.$this->protocolVersion." ".$this->statusCode." ".$this->reasonPhrase;
    }
    
    public function withHeader($key,$value){
        $this->headers[$key]=$value;
    }
    
    public function send() {
        try{
            ob_start();
            header($this->getStatusLine());
            foreach ($this->getHeaders() as $key => $value)
            {
                header($key . ': ' . $value,true);
                echo "\r\n";
                
            }
            if(strlen($this->body)>0)
            {    
                echo "\r\n";
                echo $this->body;
            }    
            ob_end_flush();
        } catch (\Throwable $ex) {
            throw $ex;
        }    
    }
    
    public function __construct($request,$view,$statusCode) {
        $this->protocolName=getenv("ENV_PROTOCOL_NAME");
        $this->protocolVersion=getenv("ENV_PROTOCOL_VERSION");
        $this->statusCode=$statusCode;
        $this->reasonPhrase=HttpConstants::STATUS_CODES[$this->statusCode];
        $this->request=$request;
        $this->view=$view;
        $this->render=new Render($request,$view);
        
    }
   
    
}
