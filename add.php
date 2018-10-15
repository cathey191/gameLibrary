<?php

  $page = 'Add New Game';

  require ('templates/header.php');
?>

    <div class="game-container">
      <div class="item-details alert">
        <h3>skjgnas;kdjf</h3>
      </div>
      <form class="item-details" action="item.php" method="post">
        <input type="text" name="title" value="Game Name" class="item-title">

        <div class="div-players">
          <label for="min-players" class="item-players">Min Players</label>
          <input type="number" name="players-min" class="input-players" value="1" maxlength="2">
          <h2 class="item-players margin">-</h2>
          <label for="max-players" class="item-players">Max Players</label>
          <input type="number" name="players-max" class="input-players" value="8">
        </div>
        <div class="clear"></div>

        <input type="text" name="type" class="item-type" value="Game Type"><br>

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
