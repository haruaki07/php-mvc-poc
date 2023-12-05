<?php 

require_once 'Controller.php';
require_once __DIR__ . "/../models/User.php";

class AuthController extends Controller
{ 
  public function index()
  {
    if (isset($_SESSION["user"])) {
      $this->redirect('/');
    }
    
    $this->view('login');
  }

  public function login()
  {
    if (isset($_SESSION["user"])) {
      $this->redirect('/');
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = User::getUserByUsername($username);
    if (!$user) {
      $error = "Username atau password salah!";

      return $this->view("login", compact("error"));
    }

    $valid = password_verify($password, $user["password"]);
    if (!$valid) {
      $error = "Username atau password salah!";

      return $this->view("login", compact("error"));
    }

    $_SESSION["user"] = $user;

    return $this->redirect('/');
  }
  
  public function logout() {
    unset($_SESSION["user"]);
    
    $this->redirect('/login');
  }
}