<?php
  // DATABASE CONNECTION
  require_once './db.php';
  // VARIABLES
  $login = $_POST['login'];
  $password = $_POST['password'];
  $agree = $_POST['agree'];
  // SELECT QUERY
  $select_user = "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'";
  // FIND USER FROM DATABASE
  $find_user = mysqli_query($connect, $select_user);
  // FETCH ARRAY
  $user = mysqli_fetch_array($find_user);
  // LOGIN CONDITIONS
  // CHECKING FOR EMPTY USER
  if (mysqli_num_rows($find_user) > 0) {
    $_SESSION['user'] = [
      "fullname" => $user[2],
      "user_id" => $user[0],
      "loggedin" => true,
      "admin" => false
    ];
    // CHECKING FOR ADMIN
    if ($user[1] == 1) {
      $_SESSION['user']['admin'] = true;
      header('Location: ../select-category.php');
    } else {
      header('Location: ../account.php');
    }
  } else {
    header('Location: ../login.php');
    $_SESSION['message'] = "Неверный логин или пароль!";
  }
?>