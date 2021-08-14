<?php

class ConnectionManager
{
    public function getConnection()
    {
        $servername = 'h2d-db.ccffzdhmppvf.ap-southeast-1.rds.amazonaws.com';
        $dbname = 'main';
        $username = 'admin';
        $password = 'admin123';
        $port = 3306;
        $url = "mysql:host=$servername;dbname=$dbname;port=$port";

        $conn = new PDO($url, $username, $password);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conn;
    }
}

?>