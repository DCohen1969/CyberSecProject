<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace Application;

use Application\Configuration;
/**
 * Description of View
 *
 * @author David
 */
class View {
    protected $file;
    protected $data;


    public function getFile() {
        return $this->file;
    }

    public function getData() {
        return $this->data;
    }

    public function setFile($file): void {
        $this->file = $file;
    }

    public function setData($data): void {
        $this->data = $data;
    }

    
    public function toStdClass($var){
        try{
            if(is_object($var) && get_class($var)==="stdClass")
            {
                return $var; 
            }
            else 
            {   
                if((!is_object($var))&&(!is_array($var)))
                {
                    return $var;
                }
                else 
                {

                    $data = new \stdClass();
                    if((is_object($var))||(is_array($var)))
                    {
                        $obj=(object)(array)$var;

                    }
                    foreach ($obj as $aKey => $aValue)
                    {
                        $data->$aKey =$this->toStdClass($aValue);

                    }
                    return  $data;  
                }    
            }
        } catch (\Throwable $ex) {
            throw $ex;
        }
    }
    
    public function __construct($view,$data) {
        $this->viewConfig=Configuration::getInstance()->get($view);
        $data["view"]["page_title"]=$this->viewConfig["title"];
        $this->file=$this->viewConfig["file"];
        $this->data=$this->toStdClass($data); 
        
    }
}
