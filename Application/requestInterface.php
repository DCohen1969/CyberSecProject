<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPInterface.php to edit this template
 */

namespace Application;

/**
 *
 * @author David
 */
interface requestInterface {
    public function getGetFromGlobals($get);
    public function getPostFromGlobals($post);
    public function getCookieFromGlobals($cookie);
    public function getServerFromGlobals($server);
    public function getSessionFromGlobals($session);
    public function getEnvFromGlobals($env);
    public function getFilesFromGlobals($files);
    public function getUri();
 
}
