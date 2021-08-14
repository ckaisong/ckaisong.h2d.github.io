<?php

require_once "common.php";

if (isset($_POST['inputEmail'])) {
  $inputEmail = $_POST['inputEmail'];
}

if (isset($_POST['inputPassword'])) {
  $inputPassword = $_POST['inputPassword'];
}

$dao = new UserDAO();

$result = $dao->authenticate($inputEmail,$inputPassword);

if ($result) {

  $usr = $dao->retrieve($inputEmail);
  $_SESSION['userid'] = $usr->getId();
  
  header('Location: dashboard1.html');
  exit();
}
else {

  header('Location: login.html');
  exit();
}
?>