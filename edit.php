<?php

  $page = 'Edit Game';
  require ('templates/header.php');

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

  if ($_POST) {
    extract($_POST);
    $errors = array();
    if (!$title) {
      array_push($errors, 'Game Title is Required');
    } else if (strlen($title) < 2) {
      array_push($errors, 'Game Title is too short');
    } else if (strlen($title) > 100) {
      array_push($errors, 'Game Title is too long');
    }

    if (!$min) {
    array_push($errors, 'Min Players is Required');
    } else if (strlen($min) > 2) {
      array_push($errors, 'Min Players is too long');
    }

    if (!$max) {
      array_push($errors, 'Max Players is Required');
    } else if (strlen($max) > 2) {
      array_push($errors, 'Max Players is too long');
    }

    if (!$type) {
      array_push($errors, 'Game Type is Required');
    } else if (strlen($type) < 2) {
      array_push($errors, 'Game Type is too short');
    } else if (strlen($type) > 100) {
      array_push($errors, 'Game Title is too long');
    }

    if (!$description) {
      array_push($errors, 'Description is Required');
    } else if (strlen($description) < 100) {
      array_push($errors, 'Description is too short');
    } else if (strlen($description) > 1000) {
      array_push($errors, 'Description is too long');
    }

    if (empty($errors)) {
      $title = mysqli_real_escape_string($dbc, $title);
      $type = mysqli_real_escape_string($dbc, $type);
      $description = mysqli_real_escape_string($dbc, $description);

      $sql = "UPDATE `board_games` SET `title`='$title',`min_players`='$min',`max_players`='$max',`type`='$type',`description`='$description' WHERE id = '$id'";

      $result = mysqli_query($dbc, $sql);
      if ($result && mysqli_affected_rows($dbc) > 0) {
        header("Location: item.php?id=$id");
      } else {
        die('Unable to update this entry');
      }
    }
  }
?>


    <div class="game-container">

      <?php if ($_POST && !empty($errors)): ?>
        <div class="item-details alert">
          <ul class="alert-ul">
            <?php foreach ($errors as $error): ?>
              <li class="alert-notice"><?= $error; ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>

      <form action="edit.php?id=<?= $id ?>" method="post">
        <img class="edit-img" src="img/uploads/large/<?= $game['image_name'] ?>" alt="Magic Maze">
        <div class="item-details">
          <input class="input-title input" name="title" value="<?= $game['title'] ?>"><br>
          <div class="div-players">
            <input type="number" name="min" class="input-players" value="<?= $game['min_players'] ?>" maxlength="2">
            <p class="input-players">-</p>
            <input type="number" name="max" class="input-players" value="<?= $game['max_players'] ?>">
          </div>
          <span class="clear"></span>
          <input type="text" name="type" class="input-type" value="<?= $game['type'] ?>">
          <textarea class="game-description" name="description" rows="10"><?= $game['description'] ?></textarea>
          <button class="btn btn-green" input="submit">Change</button>
          <div class="clear"></div>
        </div>
      </form>
    </div>

  </body>
</html>
