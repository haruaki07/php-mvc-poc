<?php

class Database
{
  private static ?PDO $conn = null;

  public static function getConnection(): PDO
  {
    if (self::$conn === null) {
      self::$conn = new PDO(
        'sqlite:app.db',
        null,
        null,
        array(PDO::ATTR_PERSISTENT => true)
      );
    }

    return self::$conn;
  }

  public static function closeConnection(): void
  {
    self::$conn = null;
  }
}
