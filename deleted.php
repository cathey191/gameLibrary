<?php

  $page = 'Delete Game';
  require ('templates/header.php');

  $id = $_GET['id'];
  $sql = "SELECT `image_name` FROM `board_games` WHERE id = $id";
  $result = mysqli_query($dbc, $sql);

  if ($result && mysqli_affected_rows($dbc) > 0) {
    $game = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $image = $game['image_name'];
    unlink("img/uploads/$image");
    unlink("img/uploads/thumbnails/$image");
    unlink("img/uploads/large/$image");
  }

  $sql = "DELETE FROM `board_games` WHERE id = $id";
  $result = mysqli_query($dbc, $sql);

  if ($result && mysqli_affected_rows($dbc) > 0) {
    header("Location: list.php");
  } else if ($result && mysqli_affected_rows($dbc) == 0) {
    die("ERROR: no game");
  } else {
    die("ERROR: cannot get the data requested");
  }

?>
