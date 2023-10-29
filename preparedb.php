<?php

require_once "database.php";

$conn = Database::getConnection();

$conn->exec('CREATE TABLE IF NOT EXISTS posts (title VARCHAR, content TEXT)');
