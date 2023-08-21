<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace Application;

use Application\Configuration;

/**
 * Description of Logger
 *
 * @author David
 */
class Logger {
    protected $file;
    protected $exceptionInfo;
    
    public function getFile() {
        return $this->file;
    }
    
    public function getExceptionInfo() {
        return $this->exceptionInfo;
    }

      
    public function write(){
        try{
            if(isset($this->file))
            {    
                if(file_exists($this->file))
                {
                    $handle=fopen($this->file,"a");
                    fputs($handle,$this->toString());
                    fclose($handle);
                }
                else
                {
                    throw new CustomException("Log file not found in path: ".$this->file, 10010);
                }
            }
            else
            {
                throw new CustomException("Log file property not set.", 10020);
            }    
        } catch (Throwable $ex) {
            throw $ex;
        } 
    } 
    public function toString(){
        try{
            $result="";
            $remoteAddr = isset($_SERVER["REMOTE_ADDR"]) ? $_SERVER["REMOTE_ADDR"] : "UNKNOWN";
            $remoteHost = isset($_SERVER["REMOTE_HOST"]) ? $_SERVER["REMOTE_HOST"] : "UNKNOWN";
            $remotePort = isset($_SERVER["REMOTE_PORT"]) ? $_SERVER["REMOTE_PORT"] : "UNKNOWN";
            $remoteUser = isset($_SERVER["REMOTE_USER"]) ? $_SERVER["REMOTE_USER"] : "UNKNOWN";
            $dateTime=new \DateTime("now");
            $time=$dateTime->format("Y-m-d H:i:s.u");
            $result.="[REMOTE_ADDR]:".$remoteAddr."\t"."[REMOTE_HOST]:".$remoteHost."\t"."[REMOTE_PORT]:".$remotePort."\t"."[REMOTE_USER]:".$remoteUser."\t"."[TIME]:".$time."\t".$this->exceptionInfo->toString()."\r\n";
            return $result; 
        } catch (Throwable $ex) {
            throw $ex;
        } 
    }
    
    public function __construct($fileKey, ExceptionInfo $exceptionInfo) {
        try{
            $this->file = Configuration::getInstance()->get($fileKey.".file");
            $this->exceptionInfo = $exceptionInfo;
        } catch (Throwable $ex) {
            throw $ex;
        }
    }


}