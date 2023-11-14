<?php

require_once __DIR__ . "/../database.php";
class Article 
{
 public int $id;
 public string $title;
  public string $content;
  
  function __construct(int $id, string $title, string $content)
  {
    $this->id = $id;
    $this->title = $title;
    $this->content = $content;
  }

  public static function getArticles(): array
  {
    $conn = Database::getConnection();

    $result = $conn->query("SELECT * FROM articles");

    $articles = [];
    foreach($result as $row) {
      $articles[] = new Article($row["id"], $row["title"], $row["content"]);
    }

    return $articles;
  }
}