<?php

require_once "Controller.php";
require_once __DIR__ . "/../models/Article.php";

class PostController extends Controller
{
  public function __construct() {
    if (!isset($_SESSION["user"])) {
      $this->redirect('/login');
    }
  }
    
  public function index()
  {

    $articles = Article::getArticles();

    $this->view("index", compact("articles"));
  }  

  public function create()
  {
    $this->view("create");
  }

  public function store() {
    $title = $_POST["title"];
    $content = $_POST["content"];

    Article::createArticle($title, $content);

    $this->redirect("/");
  }

  public function delete(int $id) {
    Article::deleteArticle($id);

    $this->redirect("/");
  }

  public function show(int $id) {
    $article = Article::getArticleById($id);
    
    $this->view("show", compact("article"));
  }

  public function edit(int $id) {
    $article = Article::getArticleById($id);

    $this->view("edit", compact("article"));
  }

  public function update(int $id) {
    $title = $_POST["title"];
    $content = $_POST["content"];

    Article::updateArticle($id, $title, $content);
      
    $this->redirect("/");
  }
}


