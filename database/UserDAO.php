<?php

require_once 'common.php';

class UserDAO
{

  public function checkEmail($email)
  {
    $sql = "SELECT * FROM User where email = :email";

    $connMgr = new ConnectionManager();
    $conn = $connMgr->getConnection();

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();

    while ($row = $stmt->fetch()) {
      return True;
    }

    $stmt = null;
    $conn = null;

    return False;
  }

  public function addUser($inputEmail, $inputPassword, $inputFName, $inputLName, $inputDOB, $inputStreet, $inputCity, $inputCountry, $inputZip, $inputPhone, $inputPhoneType)
  {
    $result = true;
    $password_hashed = password_hash($inputPassword, PASSWORD_DEFAULT);

    $connMgr = new ConnectionManager();
    $conn = $connMgr->getConnection();

    $sql = "INSERT INTO User (email, pwd, firstName, lastName, dob, street, city, country, zip, phone, phoneType, userRole) VALUES (:email, :pwd, :firstName, :lastName, :dob, :street, :city, :country, :zip, :phone, :phoneType, 'user')";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(":email", $inputEmail, PDO::PARAM_STR);
    $stmt->bindParam(":pwd", $password_hashed, PDO::PARAM_STR);
    $stmt->bindParam(":firstName", $inputFName, PDO::PARAM_STR);
    $stmt->bindParam(":lastName", $inputLName, PDO::PARAM_STR);
    $stmt->bindParam(":dob", $inputDOB, PDO::PARAM_STR);
    $stmt->bindParam(":street", $inputStreet, PDO::PARAM_STR);
    $stmt->bindParam(":city", $inputCity, PDO::PARAM_STR);
    $stmt->bindParam(":country", $inputCountry, PDO::PARAM_STR);
    $stmt->bindParam(":zip", $inputZip, PDO::PARAM_STR);
    $stmt->bindParam(":phone", $inputPhone, PDO::PARAM_STR);
    $stmt->bindParam(":phoneType", $inputPhoneType, PDO::PARAM_STR);

    $result = $stmt->execute();

    $stmt = null;
    $conn = null;

    return $result;
  }

  public function authenticate($email, $password)
  {

    $connMgr = new ConnectionManager();
    $conn = $connMgr->getConnection();

    $sql = "SELECT * FROM User where email = :email";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $isValid = False;
    $stmt->execute();

    $user_obj = null;

    while ($row = $stmt->fetch()) {
      $user_obj = new User($row['id'], $row['email'], $row['pwd'], $row['firstname'], $row['lastname'], $row['dob'], $row['street'], $row['city'], $row['country'], $row['zip'], $row['phone'], $row['phonetype'], $row['role'], $row['createdate']);
    }

    if (!empty($user_obj)) {

      $pass_hashed = $user_obj->getPwd();

      if (password_verify($password, $pass_hashed)) {
        $isValid = True;
      }
    }

    $stmt = null;
    $conn = null;

    return $isValid;
  }

  public function retrieve($email)
  {
    $sql = "SELECT * FROM User where email = :email";

    $connMgr = new ConnectionManager();
    $conn = $connMgr->getConnection();

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();

    while ($row = $stmt->fetch()) {
      return new User($row['id'], $row['email'], $row['pwd'], $row['firstname'], $row['lastname'], $row['dob'], $row['street'], $row['city'], $row['country'], $row['zip'], $row['phone'], $row['phonetype'], $row['role'], $row['createdate']);
    }

    $stmt = null;
    $conn = null;

    return null;
  }

}

?>
