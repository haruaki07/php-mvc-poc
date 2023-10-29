<?php

require_once "Controller.php";
require_once __DIR__ . "/../models/post.php";

class PostController extends Controller
{
  public function index()
  {
    $posts = Post::getPosts();

    $this->view("index", compact("posts"));
  }

  public function show(int $id)
  {
    $post = Post::getPostById($id);
    if (!$post) return $this->response("Not Found", 404);

    $this->view("show", compact("post"));
  }

  public function delete(int $id)
  {
    $exist = Post::isPostExist($id);
    if (!$exist) return $this->response("Not Found", 404);

    Post::deletePostById($id);

    $this->redirect("/");
  }

  public function create()
  {
    $this->view("create");
  }

  public function store()
  {
    if (!isset($_POST["title"]) || !isset($_POST["content"])) {
      return $this->response("Bad Request", 400);
    }

    $postId = Post::create($_POST["title"], $_POST["content"]);

    $this->redirect("/" . $postId);
  }
}
