<?php
  $dbc = mysqli_connect(getenv('DB_HOST'), getenv('DB_USER'), getenv('DB_PASS'), getenv('DB_TABLE'));

  if($dbc){
    // var_dump('connection successfull');
    $dbc->set_charset('utf8');
  } else {
    die("ERROR, connection couldn't be made, Please check your enviroment files and include the right host, username, password and table.");
  }
?>
