<?php
  if(is_dir('vendor')){
    require 'vendor/autoload.php';
  } else {
    require '../vendor/autoload.php';
  }

  $dotenv = new Dotenv\Dotenv(__DIR__ . '/..');
  $dotenv->load();
  $baseURL = getenv('PROJECT_URL');

  require 'connection.php';

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page; ?></title>
    <link rel="stylesheet" href="./css/style.css">
  </head>
  <body>
    <div class="nav">
      <div class="nav-container">
        <a href="index.php" class="logo">Logo</a>
        <ul class="nav-list">
          <li><a href="list.php" class="nav-item">All Games</a></li>
          <li><a href="add.php" class="nav-item">Add Games</a></li>
        </ul>
      </div>
    </div>
