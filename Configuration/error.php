<?php

return array(
    "error"=>array(
        "env"=>array(
            "dev"=>array(
                "title"=>"Exception Page",
                "file"=>getenv("ENV_VIEW_PATH").getenv("ENV_DIR_SEP")."error".getenv("ENV_DIR_SEP")."error-dev.php"
            ),
            "prod"=>array(
                "title"=>"Error Page",
                "file"=>getenv("ENV_VIEW_PATH").getenv("ENV_DIR_SEP")."error".getenv("ENV_DIR_SEP")."error-prod.php"
            )
        ),    
        "log"=>array(
            "file"=>getenv("ENV_LOG_PATH").getenv("ENV_DIR_SEP").getenv("ENV_LOG_FILE")
        )
    )    
);