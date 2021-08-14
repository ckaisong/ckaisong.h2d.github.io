<?php

require_once "common.php";

if (isset($_POST['inputEmail'])) {
    $inputEmail = $_POST['inputEmail'];
}

if (isset($_POST['inputPassword'])) {
    $inputPassword = $_POST['inputPassword'];
}

if (isset($_POST['inputConfirmPassword'])) {
    $inputConfirmPassword = $_POST['inputConfirmPassword'];
}

if (isset($_POST['inputFName'])) {
    $inputFName = $_POST['inputFName'];
}

if (isset($_POST['inputLName'])) {
    $inputLName = $_POST['inputLName'];
}

if (isset($_POST['inputDOB'])) {
    $inputDOB = $_POST['inputDOB'];
}

if (isset($_POST['inputStreet'])) {
    $inputStreet = $_POST['inputStreet'];
}

if (isset($_POST['inputCity'])) {
    $inputCity = $_POST['inputCity'];
}

if (isset($_POST['inputCountry'])) {
    $inputCountry = $_POST['inputCountry'];
}

if (isset($_POST['inputZip'])) {
    $inputZip = $_POST['inputZip'];
}

if (isset($_POST['inputPhone'])) {
    $inputPhone = $_POST['inputPhone'];
}

if (isset($_POST['inputPhoneType'])) {
    $inputPhoneType = $_POST['inputPhoneType'];
}

if ($inputPassword == $inputConfirmPassword) {

    $dao = new UserDAO();

    $check = $dao->checkEmail($inputEmail);

    if (!$check) {

        $dao->addUser($inputEmail, $inputPassword, $inputFName, $inputLName, $inputDOB, $inputStreet, $inputCity, $inputCountry, $inputZip, $inputPhone, $inputPhoneType);

        header('Location: login.html');
        exit();
    } else {
        header('Location: register.html');
        exit();
    }
}
