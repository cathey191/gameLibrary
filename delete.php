<?php

  $page = 'Delete Game';
  require ('templates/header.php');

  $id = $_GET['id'];
  $sql = "SELECT `title` FROM `board_games` WHERE id = $id";
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
      <form class="item-details" action="delete.php?id=<?= $id ?>" method="post">
        <h2 class="item-title" href="item.html">Are you sure you want to delete: <?= $game['title'] ?></h2>
        <a class="btn btn-delete" href="deleted.php?id=<?= $id ?>">Delete</a>
        <a class="btn btn-edit" href="item.php?id=<?= $id ?>">Cancel</a>
        <div class="clear"></div>
      </form>
    </div>

  </body>
</html>
