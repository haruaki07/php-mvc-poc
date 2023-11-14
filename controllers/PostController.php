<?php

require_once "Controller.php";
require_once __DIR__ . "/../models/Article.php";

class PostController extends Controller
{
  public function index()
  {

    $articles = Article::getArticles();

    $this->view("index", compact("articles"));
  }  
}


