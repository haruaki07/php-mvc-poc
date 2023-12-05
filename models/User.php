<?php 

require_once __DIR__ . "/../database.php";
class User 
{
  public $id;
  public $username;
  public $password;

  public static function getUserByUsername($username)
  {
    $conn = Database::getConnection();

    $result = $conn
      ->query("SELECT * FROM users WHERE username = '$username'");
    
    return $result->fetch_assoc();
  }
}