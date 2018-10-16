<?php

  $page = 'All Games';
  require ('templates/header.php');

  $sql = "SELECT * FROM `board_games` WHERE 1";
  $result = mysqli_query($dbc, $sql);

  if ($result) {
    $games = mysqli_fetch_all($result, MYSQLI_ASSOC);
  } else {
    die('Error! Unable to fetch games');
  }
?>

    <div class="item-container">
      <?php if ($games): ?>
        <?php foreach ($games as $game): ?>
          <div class="item">
            <img class="item-img" src="img/uploads/<?= $game['image_name'] ?>" alt="<?= $game['image_name'] ?>">
            <div class="item-details">
              <a class="item-title" href="item.php?id=<?= $game['id'] ?>"><?= $game['title'] ?></a>
              <p class="item-players"><?= $game['min_players'] ?> - <?= $game['max_players'] ?></p>
              <p class="item-type"><?= $game['type'] ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>

  </body>
</html>
