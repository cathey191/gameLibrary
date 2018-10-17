<?php

  $page = 'Deleted Game';
  require ('templates/header.php');

  $id = $_GET['id'];
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
