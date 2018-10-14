<?php
  require ('templates/header.php')
?>

    <div class="game-container">
      <form class="item-details" action="item.php" method="post">
        <label for="title">Game Name</label>
        <input type="text" name="title" value=""> <br>

        <p>Game Type</p>
        <input type="checkbox" id="type-bl" value="Bluffing"><label for="type-bl"> Bluffing</label>
        <input type="checkbox" id="type-cr" value="Creative"><label for="type-cr"> Creative</label>
        <input type="checkbox" id="type-ex" value="Exploration"><label for="type-ex"> Exploration</label>
        <input type="checkbox" id="type-hu" value="Humor"><label for="type-hu"> Humor</label>
        <input type="checkbox" id="type-st" value="Strategy"><label for="type-st"> Strategy</label><br>

        <label for="min-players">Min Players</label>
        <input type="number" name="min-players" value=""><br>

        <label for="max-players">Max Players</label>
        <input type="number" name="max-players" value=""><br>

        <label for="discription">Discription</label>
        <input type="textarea" name="textarea" value=""><br>

        <label for="photo">Photo</label>
        <input type="file" name="photo"><br>

        <button type="submit" name="button" class="btn btn-green">Add Game</button>
        <div class="clear"></div>
      </form>
    </div>

  </body>
</html>
