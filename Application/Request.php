<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace Application;

use Application\requestInterface;
/**
 * Description of Context
 *
 * @author David
 */
class Request implements requestInterface{
    protected $get;
    protected $post;
    protected $cookie;
    protected $server;
    protected $env;
    protected $files;
    protected $session;
    protected $headers;
    protected $uri;
    protected $query;
   
    public function getGet($param) {
        return $this->get[$param];       
    }

    public function getPost($param) {
        return $this->post[$param];       
    }
    
    public function getCookie($param) {
        return $this->cookie[$param];       
    }
    
    public function getServer($param) {
        return $this->server[$param];       
    }

    public function getFiles($param) {
        return $this->files[$param];       
    }
    
    public function getSession($param) {
        return $this->session[$param];       
    }
    
    public function getEnv($param) {
        return $this->env[$param];       
    }

    public function getHeader($param) {
        return $this->headers[$param];       
    }
    
    public function setCookie($name, $value) {
        
    }






    public function getCookieFromGlobals($cookie) {
        foreach($cookie as &$value){
            $value=htmlspecialchars($value, ENT_QUOTES);
        } 
        return $cookie;
    }

    public function getEnvFromGlobals($env) {
        foreach($env as &$value){
            $value=htmlspecialchars($value, ENT_QUOTES);
        }
        return $env;
    }

    public function getFilesFromGlobals($files) {
        return $files;
    }

    public function getGetFromGlobals($get) {
        foreach($get as &$value){
            $value= htmlspecialchars($value, ENT_QUOTES);
        }
        return $get;
    }

    public function getPostFromGlobals($post) {
        foreach($post as &$value){
            $value=htmlspecialchars($value, ENT_QUOTES);
        }
        return $post;
    }

    public function getServerFromGlobals($server) {
        foreach($server as &$value){
            $value=htmlspecialchars($value, ENT_QUOTES);
        }
        return $server;
    }

    public function getSessionFromGlobals($session) {
        foreach($session as &$value){
            $value=htmlspecialchars($value, ENT_QUOTES);
        } 
        return $session;
    }
    
    public function getUri() {
        return $this->url;
    }
    
    public function getQuery() {
        return $this->query;
    }
    
    public function getHeaders($headers){
        try{
            foreach ($headers as &$value) {
                $value=htmlspecialchars($value, ENT_QUOTES);
            }
            return $headers;
        }catch(\Throwable $ex){
            throw $ex;
        }        
    }
    
    public function __construct($get, $post, $cookie, $server, $env, $files, $session, $headers) {
        $this->get = $this->getGetFromGlobals($get);
        $this->post = $this->getPostFromGlobals($post);
        $this->cookie = $this->getCookieFromGlobals($cookie);
        $this->server = $this->getServerFromGlobals($server);
        $this->env = $this->getEnvFromGlobals($env);
        $this->files = $this->getFilesFromGlobals($files);
        $this->session = $this->getSessionFromGlobals($session); 
        $this->headers = $this->getHeaders($headers);
        $this->uri=$this->getServer("REQUEST_URI");
        $this->query=$this->getServer("QUERY_STRING");
        
        
    }

}
