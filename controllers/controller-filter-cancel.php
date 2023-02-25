<?php 
  // SESSION START
  session_start();
  // SESSION VARS
  $_SESSION['all'] = false;
  $_SESSION['solved'] = false;
  $_SESSION['new'] = false;
  $_SESSION['cancel'] = true;
  // LOCATION
  header('Location: ../account.php');
?>