<?php

spl_autoload_register(
    function ($class) {
        require_once  "database/$class.php";
        
    }
);

require_once "database/ConnectionManager.php";

session_start();
?>