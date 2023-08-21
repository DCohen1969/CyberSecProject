<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */


putenv("ENV_PROTOCOL_NAME=http");
putenv("ENV_PROTOCOL_VERSION=1.1");
putenv("ENV_PROTOCOL_PORT=80");
putenv("ENV_DIR_SEP=/");
putenv("ENV_PATH_SEP=/");
putenv("ENV_APP_NAME=CyberSecProject");
putenv("ENV_PUBLIC_DIR=public");
putenv("ENV_INDEX_FILE=index.php");
putenv("ENV_LOG_FILE=log.txt");

if(getenv("ENV_ENV")==="DEV"){
    putenv("ENV_HOST=locahost");
    putenv("ENV_BASE_ASSET_URL=".getenv("ENV_PROTOCOL_NAME")."://".getenv("ENV_HOST").getenv("ENV_PATH_SEP").getenv("ENV_APP_NAME").getenv("ENV_PATH_SEP").getenv("ENV_PUBLIC_DIR"));
    putenv("ENV_BASE_URL=".getenv("ENV_BASE_ASSET_URL").getenv("ENV_PATH_SEP").getenv("ENV_index_FILE"));
 
}
elseif(getenv("ENV_ENV")==="DEV"){
    putenv("ENV_HOST=my_host_name");
}


   

putenv("ENV_PROJECT_PATH=".str_replace("\\","/",__DIR__.getenv("ENV_DIR_SEP")."..".getenv("ENV_DIR_SEP")));
putenv("ENV_APPLICATION_PATH=".getenv("ENV_PROJECT_PATH")."Application");
putenv("ENV_CONFIGURATION_PATH=".getenv("ENV_PROJECT_PATH")."Configuration");
putenv("ENV_MODEL_PATH=".getenv("ENV_PROJECT_PATH")."Model");
putenv("ENV_VIEW_PATH=".getenv("ENV_PROJECT_PATH")."View");
putenv("ENV_CONTROLLER_PATH=".getenv("ENV_PROJECT_PATH")."Controller");
putenv("ENV_LOG_PATH=".getenv("ENV_PROJECT_PATH")."Logging");

