<?php

  $page = 'Board Games';
  require ('templates/header.php');

  use Intervention\Image\ImageManager;

  $id = $_GET['id'];
  $sql = "SELECT * FROM `board_games` WHERE id = $id";
  $result = mysqli_query($dbc, $sql);

  if ($result && mysqli_affected_rows($dbc) > 0) {
    $game = mysqli_fetch_array($result, MYSQLI_ASSOC);
  } else if ($result && mysqli_affected_rows($dbc) == 0) {
    die("ERROR: no game");
  } else {
    die("ERROR: cannot get the data requested");
  }

?>

    <div class="game-container">
      <img class="game-img" src="img/uploads/large/<?= $game['image_name'] ?>" alt="Magic Maze">
      <div class="item-details">
        <h2 class="item-title"><?= $game['title'] ?></h2>
        <p class="item-players"><?= $game['min_players'] ?> - <?= $game['max_players'] ?></p>
        <span class="clear"></span>
        <p class="item-type"><?= $game['type'] ?></p>
        <p class="game-discription"><?= $game['description'] ?></p>
        <a class="btn btn-delete" href="delete.php?id=<?= $id ?>">Delete</a>
        <a class="btn btn-edit" href="edit.php?id=<?= $id ?>">Edit</a>
        <div class="clear"></div>
      </div>
    </div>

  </body>
</html>
