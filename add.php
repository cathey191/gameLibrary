<?php

  if ($_POST) {
    extract($_POST);
    $errors = array();
    if (!$title) {
      array_push($errors, 'Game Title is Required');
    } else if (strlen($title) > 2) {
      array_push($errors, 'Game Title is too short');
    } else if (strlen($title) < 100) {
      array_push($errors, 'Game Title is too long');
    }

    if (!$min) {
      array_push($errors, 'Min Players is Required');
    } else if (strlen($min) < 3) {
      array_push($errors, 'Min Players is too long');
    }

    if (!$max) {
      array_push($errors, 'Max Players is Required');
    } else if (strlen($max) < 2) {
      array_push($errors, 'Max Players is too long');
    }

    if (!$type) {
      array_push($errors, 'Game Type is Required');
    } else if (strlen($type) > 2) {
      array_push($errors, 'Game Type is too short');
    } else if (strlen($type) < 100) {
      array_push($errors, 'Game Title is too long');
    }

    // if (!$photo) {
    //   array_push($errors, 'Game Photo is Required');
    // }
  }

  $page = 'Add New Game';
  require ('templates/header.php');
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

      <form class="item-details" action="add.php" method="post"  enctype="multipart/form-data">
        <input type="text" name="title" placeholder="Game Name" class="item-title">

        <div class="div-players">
          <label for="min-players" class="item-players">Min Players</label>
          <input type="number" name="min" class="input-players" placeholder="1" maxlength="2">
          <h2 class="item-players margin">-</h2>
          <label for="max-players" class="item-players">Max Players</label>
          <input type="number" name="max" class="input-players" placeholder="8">
        </div>
        <div class="clear"></div>

        <input type="text" name="type" class="item-type" placeholder="Game Type"><br>

        <label for="description">Description</label><br>
        <textarea name="textarea" value="" class="game-description" rows="5"></textarea><br>

        <label for="photo">Photo</label>
        <input type="file" name="photo"><br>

        <button type="submit" name="button" class="btn btn-green">Add Game</button>
        <div class="clear"></div>
      </form>
    </div>

  </body>
</html>
