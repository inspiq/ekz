<?php 
  // SESSION START
  session_start();
  // SESSION VARS
  $_SESSION['all'] = false;
  $_SESSION['solved'] = false;
  $_SESSION['cancel'] = false;
  $_SESSION['new'] = true;
  // LOCATION
  header('Location: ../account.php');
?>