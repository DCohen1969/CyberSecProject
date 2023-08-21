<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace Application;

use Application\CustomException;

/**
 * Description of Configuration
 *
 * @author David
 */
class Configuration {
 
    private static $instance;
    public $config;
  
    public function loadConfig($file){
        try{
            $filePath=getenv("ENV_CONFIGURATION_PATH").getenv("ENV_DIR_SEP").$file;
            $isLoaded=in_array($filePath,get_required_files());
            if(!$isLoaded)
            {
                $newConfig= require_once($filePath);
                $this->mergeConfig(is_array($newConfig)? $newConfig : array());
            }    
        }catch(\Throwable $ex){
            throw $ex;
        }    
    } 
    
    public function mergeConfig($newConfig){
        $this->config= array_merge_recursive($this->config,$newConfig);
    }
    
    public function getValues($values,$path){
        try{
            $temp = !empty($path) && $path!==null ? $values : null;
            if($temp!==null){
                foreach ($path as $key){
                    if(key_exists($key, $temp)){        
                        $temp=$temp[$key];
                    } 
                    else{
                        $temp=null;
                        break;
                    }
                }
            }
            return $temp;
        } catch (\Throwable $ex) {
            throw $ex;
        }    
    }
    
    public function get($id) {
        try{
            $keyPath=explode(".",$id);
            $result=$this->getValues($this->config,$keyPath);
            if($result===null){
                throw new CustomException("Configuration key '".$id."' not found",10000);
            }
            return $result;
        } catch (\Throwable $ex) {
            throw $ex;
        }    
    }
    
    
    private  function __construct(){
        $this->config=array();
    }    

    /**
     * @return self
     */
    public static function getInstance(): self
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }
    
}
