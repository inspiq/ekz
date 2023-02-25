<?php
  // SESSION START
  session_start();
  // UNSET SESSION USER
  unset($_SESSION['user']);
  // FILTER
  $_SESSION['all'] = true;
  $_SESSION['solved'] = false;
  $_SESSION['cancel'] = false;
  $_SESSION['new'] = false;
  // LOCATION
  header('Location: ../index.php');
?>