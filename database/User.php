<?php

class User {

  private $id;
  private $email;
  private $pwd;
  private $firstname;
  private $lastname;
  private $dob;
  private $street;
  private $city;
  private $country;
  private $zip;
  private $phone;
  private $phonetype;
  private $role;
  private $createdate;

  public function __construct($id, $email,$pwd,$firstname,$lastname,$dob,$street,$city,$country,$zip,$phone,$phonetype,$role,$createdate) {
    $this->id = $id;
    $this->email = $email;
    $this->pwd = $pwd;
    $this->firstname = $firstname;
    $this->lastname = $lastname;
    $this->dob = $dob;
    $this->street = $street;
    $this->city = $city;
    $this->country = $country;
    $this->zip = $zip;
    $this->phone = $phone;
    $this->phonetype = $phonetype;
    $this->role = $role;
    $this->createdate = $createdate;
  }

  public function getId(){
    return $this->id;
  }

  public function getEmail(){
    return $this->email;
  }

  public function getPwd(){
    return $this->pwd;
  }

  public function getFirstName(){
    return $this->firstname;
  }

  public function getLastName(){
    return $this->lastname;
  }

  public function getdob(){
    return $this->dob;
  }

  public function getStreet(){
    return $this->street;
  }

  public function getCity(){
    return $this->city;
  }

  public function getCountry(){
    return $this->country;
  }

  public function getZip(){
    return $this->zip;
  }

  public function getPhone(){
    return $this->phone;
  }

  public function getPhoneType(){
    return $this->phonetype;
  }

  public function getRole(){
    return $this->role;
  }

  public function getCreateDate(){
    return $this->createdate;
  }
}

?>