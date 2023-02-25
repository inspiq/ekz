<?php
  // SESSION
  session_start();
  // DATABASE CONNECTION
  $connect = mysqli_connect('localhost', 'root', '', 'ekz');
  if(!$connect) {
    die('Ошибка подключаения к базе данных!');
  }
?>