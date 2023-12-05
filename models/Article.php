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

  public static function createArticle($title, $content) {
    $conn = Database::getConnection();

    $stmt = $conn->prepare("INSERT INTO articles (title, content) VALUES (?, ?)");
    $stmt->execute([$title, $content]);
  }

  public static function deleteArticle($id) {
    $conn = Database::getConnection();

    $stmt = $conn->prepare("DELETE FROM articles WHERE id = ?");
    $stmt->execute([$id]);
  }

  public static function getArticleById($id) {
    $conn = Database::getConnection();

    $result = $conn
      ->query("SELECT * FROM articles WHERE id = $id");

    return $result->fetch_assoc();
  }

  public static function updateArticle($id, $title, $content) {
    $conn = Database::getConnection();

    $stmt = $conn->prepare("UPDATE articles SET title = ?, content = ? WHERE id = ?");
    $stmt->bind_param("ssi", $title, $content, $id);

    $stmt->execute();
  }
}