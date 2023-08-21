<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace Application;

/**
 * Description of MyException
 *
 * @author David
 */
class ExceptionInfo {
    protected $class;
    protected $message;
    protected $code;
    protected $file;
    protected $line;
    protected $severity;
    protected $severityMessage;
    protected $trace;
    
    
    public function getSeverityMessage($severity)
    {
        $result=null;
        switch($severity)
        {
            case E_ERROR: // 1 //
                $result="E_ERROR";
                break;
            case E_WARNING: // 2 //
                $result="E_WARNING";
                break;
            case E_PARSE: // 4 //
                $result="E_PARSE";
                break;
            case E_NOTICE: // 8 //
                $result="E_NOTICE";
                break;
            case E_CORE_ERROR: // 16 //
                $result="E_CORE_ERROR";
                break;
            case E_CORE_WARNING: // 32 //
                $result="E_CORE_WARNING";
                break;
            case E_COMPILE_ERROR: // 64 //
                $result="E_COMPILE_ERROR";
                break;
            case E_COMPILE_WARNING: // 128 //
                $result="E_COMPILE_WARNING";
                break;
            case E_USER_ERROR: // 256 //
                $result="E_USER_ERROR";
                break;
            case E_USER_WARNING: // 512 //
                $result="E_USER_WARNING";
                break;
            case E_USER_NOTICE: // 1024 //
                $result="E_USER_NOTICE";
                break;
            case E_STRICT: // 2048 //
                $result="E_STRICT";
                break;
            case E_RECOVERABLE_ERROR: // 4096 //
                $result="E_RECOVERABLE_ERROR";
                break;
            case E_DEPRECATED: // 8192 //
                $result="E_DEPRECATED";
                break;
            case E_USER_DEPRECATED: // 16384 //
                $result="E_USER_DEPRECATED";
                break;
            case E_ALL: // 32767 //
                $result="E_ALL";
                break;
            default:
                $result="UNDEFINED";
        }
        return $result;
    }
   
    public function getTrace($exception){
        $trace=array();

        $traceTemp=$exception->getTrace();
        //print("<pre> 'this->vars' = ".print_r($traceTemp,true)."</pre>"); die();
        $index=0;
        while($index<count($traceTemp))
        {
            $temp=array();
            $temp["file"]=$traceTemp[$index]["file"]!==null ? $traceTemp[$index]["file"] : "UNDEFINED";
            $temp["class"]=$traceTemp[$index]["class"]!==null ? $traceTemp[$index]["class"] : "UNDEFINED";
            $temp["function"]=$traceTemp[$index]["function"]!==null ? $traceTemp[$index]["function"] : "UNDEFINED";
            $temp["line"]=$traceTemp[$index]["line"]!==null ? $traceTemp[$index]["line"] : "UNDEFINED"; 
            array_push($trace,$temp);
            $index++;
        }
        return $trace;
    }
    
    public function buildExceptionInfo($exception){
        $this->message=$exception->getMessage()!==null ? $exception->getMessage() : "UNDEFINED";
        $this->code=$exception->getCode()!==null ? $exception->getCode() : "UNDEFINED";
        $this->severity=$exception instanceof \ErrorException && $exception->getSeverity()!==null ? $exception->getSeverity() : "UNDEFINED";
        $this->severityMessage= $exception instanceof \ErrorException && $exception->getSeverity()!==null ? $this->getSeverityMessage($exception->getSeverity()) : "UNDEFINED";
        $this->file=$exception->getFile()!==null ? $exception->getFile() : "UNDEFINED";
        $this->class=get_class($exception)!==null ? get_class($exception) : "UNDEFINED";
        $this->line=$exception->getLine()!==null ? $exception->getLine() : "UNDEFINED";  
        $this->trace=$this->getTrace($exception);
        
    }
    
    public function toString(){
        return "[EXCEPTION_CLASS]: ".$this->class."\t[EXCEPTION_MESSAGE]: ".$this->message."\t[EXCEPTION_CODE]: ".$this->code."\t[EXCEPTION_SEVERITY]: ".$this->severity."\t[EXCEPTION_SEVERITY_MESSAGE]: ".$this->severityMessage."\t[EXCEPTION_FILE]: ".$this->file."\t[EXCEPTION_LINE]: ".$this->line;
    }
    
    
    public function __construct($exception) {
        $this->buildExceptionInfo($exception);
    }
    
    
}
