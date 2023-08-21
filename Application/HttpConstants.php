<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace Application;

/**
 * Description of HttpConstants
 *
 * @author David
 */
class HttpConstants {
    const HEADER_HOST = "Host"; 
    const HEADER_CONTENT_LANGUAGE = "Content-Language";
    const HEADER_CONTENT_TYPE = "Content-Type";
    const HEADER_CONTENT_LENGTH = "Content-Length";
    const HEADER_LOCATION = "Location";
    const HEADER_CACHE = "Cache-Control";
    const HEADER_REFRESH = "Refresh";
    const METHOD_GET = "get";
    const METHOD_POST = "post";
    const METHOD_PUT = "put";
    const METHOD_DELETE = "delete";
    const HTTP_METHODS = ["get","put","post","delete"];
    const STANDARD_PORTS = ["http" => 80, "https" => 443];
    
    const CONTENT_TYPE_TEXT_XML = "text/xml";
    const CONTENT_TYPE_TEXT_HTML = "text/html";
    const CONTENT_TYPE_FORM_ENCODED = "application/x-www-form-urlencoded";
    const CONTENT_TYPE_MULTI_FORM = "multipart/form-data";
    const CONTENT_TYPE_JSON = "application/json";
    const CONTENT_TYPE_HAL_JSON = "application/hal+json";
    const STATUS_CODES = [
    200 => "OK",
    301 => "Moved Permanently",
    302 => "Found",
    401 => "Unauthorized",
    404 => "Not Found",
    405 => "Method Not Allowed",
    418 => "Custom",
    500 => "Internal Server Error",
    ];
    
}
