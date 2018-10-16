<?php

  $page = 'Add New Game';
  require ('templates/header.php');

  use Intervention\Image\ImageManager;

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

    // die(strlen($type));

    if (!$description) {
      array_push($errors, 'Description is Required');
    } else if (strlen($description) < 100) {
      array_push($errors, 'Description is too short');
    } else if (strlen($description) > 1000) {
      array_push($errors, 'Description is too long');
    }

    // if (isset($_FILES['image'])) {
    //   // die('pass');
    //   $fileSize = $_FILES['image']['size'];
    //   $fileTmp = $_FILES['image']['tmp_name'];
    //   $fileType = $_FILES['image']['type'];
    //
    //   if ($fileSize == 0) {
    //     array_push($errors, 'You must include an Image');
    //   } else if ($fileSize > 5000000) {
    //     array_push($errors, 'The Image is too large, it must be under 5MB');
    //   } else {
    //     $validExtensions = array('jpeg', 'jpg', 'png');
    //     $fileNameArray = explode('.', $_FILES['image']['name']);
    //     $fileExt = strtolower(end($fileNameArray));
    //     // die($fileExt);
    //     if (in_array($fileExt, $validExtensions) === false) {
    //       array_push($errors, 'File type is not allowed.');
    //     }
    //   }
    // }

    // die($fileExt);

    if (empty($errors)) {
      $title = mysqli_real_escape_string($dbc, $title);
      $type = mysqli_real_escape_string($dbc, $type);
      $description = mysqli_real_escape_string($dbc, $description);

      // $newFileName = uniqid() .".".  $fileExt;
      // $fileName = mysqli_real_escape_string($dbc, $newFileName);

      $sql = "INSERT INTO `board_games`(`title`, `min_players`, `max_players`, `type`, `description`) VALUES ($title, $min, $max, $type, $description)";

      $result = mysqli_query($dbc, $sql);
      if ($result && mysql_affected_rows($dbc) > 0) {
      //   $destination = '../img/uploads';
      //   if (!is_dir($destination)) {
      //     mkdir('../img/uploads/', 0777, true);
      //   }
      //   $thumbDestination = '../img/uploads/thumbnails';
      //   if (!is_dir($thumbDestination)) {
      //     mkdir('../img/uploads/thumbnails', 0777, true);
      //   }
      //
      //   $manager = new ImageManager();
      //   $mainImage = $manager->make($fileTmp);
      //   $mainImage->save($destination.'.'.$newFileName, 100);
      //   $thumbnailImage = $manager->make($fileTmp);
      //   $thumbnailImage->resize(300, null, function($constraint){
      //     $constraint->aspectRatio();
      //     $constraint->upsize();
      //   });
      //   $thumbnailImage->save($thumbDestination.'/'.$newFileName, 100);

        header("Location: item.php");

      } else {
        die('Something went wrong, cannot add the entry to the database');
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

      <form class="item-details" action="add.php" method="post"  enctype="multipart/form-data">
        <input type="text" name="title" placeholder="Game Name" class="input-title">

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
        <textarea name="description" class="game-description" rows="5"></textarea><br>

        <label for="photo">Photo</label>
        <input type="file" name="photo"><br>

        <button type="submit" name="button" class="btn btn-green">Add Game</button>
        <div class="clear"></div>
      </form>
    </div>

  </body>
</html>
