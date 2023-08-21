<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Render
 *
 * @author David
 */

namespace Application;


/**
 * Description of Render
 *
 * @author David Cohen
 */
class Render{
    protected $request;
    protected $view;
    
    public function getRequest() {
        return $this->request;
    }

    public function getView() {
        return $this->view;
    }
    
    public function getUrl($path){
        try{
            return getenv("ENV_BASE_URL").$path;
        } catch (\Throwable $ex) {
            throw $ex;
        }
    }
    
    public function getAsset($path){
        try{
            return getenv("ENV_BASE_ASSET_URL").$path;
         } catch (\Throwable $ex) {
            throw $ex;
        }    
    }
    
    public function render() : string{
        try{
            $out="";
            $this->vars=$this->view->getData();
            ob_start();
            require_once $this->view->getFile();
            $out=ob_get_contents(); 
            ob_end_clean();          
            return $out;
            
        } catch (\Throwable $ex) {
            throw $ex;
        }
    }
    
    public function renderJson() : string{
        try{
            return json_encode($this->request->vars);
        } catch (\Throwable $ex) {
            throw $ex;
        }
    }

    
    public function __construct($request,$view) {
        try{
            $this->request=$request;
            $this->view=$view;
        } catch (\Throwable $ex) {
           throw $ex;
        }
    }

}
