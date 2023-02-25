<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- LINK CSS -->
    <link rel="stylesheet" href="src/css/styles.css" />
    <!-- WEBSITE NAME -->
    <title>Городской портал</title>
  </head>
  <body>
    <!-- WRAPPER -->
    <div class="wrapper">
      <!-- HEADER -->
      <header class="header">
        <!-- CONTAINER -->
        <div class="container">
          <!-- LOGOTYPE -->
          <a class="header__logo" href="index.php">
            <img src="../assets/images/logo.png" alt="Логотип" width="50" />
          </a>
          <!-- BUTTONS -->
          <div class="header__menu">
            <?php 
              if ($_SESSION['user']['loggedin'] == true) {
                if ($_SESSION['user']['admin'] == true) {
                  echo '<a href="../select-category.php" class="header__menu-item">Управление заявками</a>';
                } else {
                  echo '
                    <a href="../add-request.php" class="header__menu-item">Заполнить заявку</a>
                    <a href="../account.php" class="header__menu-item">Личный кабинет</a>
                  ';
                }
                echo '<a href="./controllers/controller-logout.php" class="header__menu-item header__exit">Выйти</a>';
              } else {
                echo '
                  <a class="btn-main" href="reg.php">Регистрация</a>
                  <a class="btn-main" href="login.php">Войти</a>
                ';
              }
            ?>
          </div>
        </div>
      </header>