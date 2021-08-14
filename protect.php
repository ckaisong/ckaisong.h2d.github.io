<?php

require_once 'common.php';

if (!isset($_SESSION["userid"])) {

    header("Location: login.html");

    exit();
}
?>
