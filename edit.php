<?php
  require ('templates/header.php')
?>

    <div class="game-container">
      <img class="item-img" src="img/magicmaze.png" alt="Magic Maze">
      <form class="item-details" action="item.php" method="post">
        <input class="input-title input" value="Magic Maze"><br>
        <div class="div-players">
          <input type="number" name="players-min" class="input-players" value="1" maxlength="2">
          <p class="input-players"> - </p>
          <input type="number" name="players-max" class="input-players" value="8">
        </div>
        <span class="clear"></span>
        <input type="text" name="type" class="input-type" value="Strategy">
        <textarea class="game-description" rows="10">After being stripped of all their possessions, a mage, a warrior, an elf, and a dwarf are forced to go rob the local Magic Maze shopping mall for all the equipment necessary for their next adventure. They agree to map out the labyrinth in its entirety first, then find each individual’s favorite store, and then locate the exit. In order to evade the surveillance of the guards who eyed their arrival suspiciously, all four will pull off their heists simultaneously, then dash to the exit. That's the plan anyway…but can they pull it off?

Magic Maze is a real-time, cooperative game. Each player can control any hero in order to make that hero perform a very specific action, to which the other players do not have access: Move north, explore a new area, ride an escalator… All this requires rigorous cooperation between the players in order to succeed at moving the heroes prudently. However, you are allowed to communicate only for short periods during the game; the rest of the time, you must play without giving any visual or audio cues to each other. If all of the heroes succeed in leaving the shopping mall in the limited time allotted for the game, each having stolen a very specific item, then everyone wins together.

At the start of the game, you have only three minutes in which to take actions. Hourglass spaces you encounter along the way give you more time. If the sand timer ever completely runs out, all players lose the game: Your loitering has aroused suspicion, and the mall security guards nab you!</textarea>
        <button class="btn btn-green" input="submit">Change</button>
        <div class="clear"></div>
      </form>
    </div>

  </body>
</html>
