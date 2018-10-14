<?php
  require ('templates/header.php')
?>

    <div class="game-container">
      <form class="item-details" action="item.php" method="post">
        <label for="title" class="item-title">Game Name</label>
        <input type="text" name="title" value="">

        <div class="div-players">
          <label for="min-players" class="item-players">Min Players</label>
          <input type="number" name="players-min" class="input-players players-min" value="1" maxlength="2">
          <p class="input-players"> - </p>
          <label for="max-players" class="item-players">Max Players</label>
          <input type="number" name="players-max" class="input-players players-max" value="8">
        </div>
        <div class="clear"></div>

        <label for="type">Game Type</label>
        <input type="text" name="type"><br>

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
