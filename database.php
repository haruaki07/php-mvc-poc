<?php

class Database
{
  private static ?mysqli $conn = null;

  public static function getConnection()
  {
    define("DB_HOST", "localhost");
    define("DB_USERNAME", "demo");
    define("DB_PASSWORD", "demo");
    define("DB_NAME", "db");

    if (self::$conn === null) {
      self::$conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
      
      if (self::$conn->connect_error) {
        die("Connection failed: " . self::$conn->connect_error);
      }
    }

    return self::$conn;
  }

  public static function closeConnection(): void
  {
    self::$conn = null;
  }
}
