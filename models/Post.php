<?php

require_once __DIR__ . "/../database.php";

class Post
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

  public static function getPosts(): array
  {
    $conn = Database::getConnection();

    $result = $conn->query('SELECT rowid as id, title, content FROM posts');

    $posts = [];
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $posts[] = new Post($row["id"], $row["title"], $row["content"]);
    }

    return $posts;
  }

  public static function getPostById(int $id): ?Post
  {
    $conn = Database::getConnection();

    $stmt = $conn->prepare('SELECT rowid as id, title, content FROM posts WHERE id = :id');
    $stmt->bindValue(":id", $id, PDO::PARAM_INT);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$row) return null;

    return new Post($row["id"], $row["title"], $row["content"]);
  }

  public static function isPostExist(int $id): bool
  {
    $conn = Database::getConnection();

    $stmt = $conn->prepare("SELECT COUNT(rowid) as count FROM posts WHERE rowid = :id");
    $stmt->bindValue(":id", $id, PDO::PARAM_INT);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row["count"] > 0;
  }

  public static function deletePostById(int $id): void
  {
    $conn = Database::getConnection();

    $stmt = $conn->prepare("DELETE FROM posts WHERE rowid = :id");
    $stmt->bindValue(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
  }

  public static function create(string $title, string $content): int
  {
    $conn = Database::getConnection();

    $stmt = $conn->prepare("INSERT INTO posts VALUES (:title, :content) RETURNING rowid");
    $stmt->bindValue(":title", $title);
    $stmt->bindValue(":content", $content);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row["rowid"];
  }
}
