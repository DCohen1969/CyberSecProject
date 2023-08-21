<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace Application;

use Application\Response;
use Application\HttpConstants;
/**
 * Description of Response
 *
 * @author David
 */
class HtmlResponse extends Response{


    public function buildResponse(): void {
        try{
            $this->withHeader(HttpConstants::HEADER_CONTENT_TYPE,HttpConstants::CONTENT_TYPE_TEXT_HTML);
            $this->withHeader(HttpConstants::HEADER_CONTENT_LENGTH,strlen($this->body));
            parent::getHeaders();
        } catch (\Throwable $ex) {
            throw $ex;
        }
    }
    
    public function __construct($request,$view) {
        parent::__construct($request, $view,200);
        $this->body=$this->render->render();
        $this->buildResponse();
    }
   
    
}
