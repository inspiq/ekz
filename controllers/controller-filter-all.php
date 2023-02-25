<?php 
  // SESSION START
  session_start();
  // SESSION VARS
  $_SESSION['solved'] = false;
  $_SESSION['new'] = false;
  $_SESSION['cancel'] = false;
  $_SESSION['all'] = true;
  // LOCATION
  header('Location: ../account.php');
?>