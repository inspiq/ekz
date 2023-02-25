<?php 
  // SESSION START
  session_start();
  // SESSION VARS
  $_SESSION['all'] = false;
  $_SESSION['cancel'] = false;
  $_SESSION['new'] = false;
  $_SESSION['solved'] = true;
  // LOCATION
  header('Location: ../account.php');
?>