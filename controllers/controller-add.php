<?php
  // DATABASE CONNECTION
  require_once './db.php';
  // VARIABLES (ADD CATEGORY)
  $add_cat = $_POST['add_cat'];
  $name_cat = $_POST['name_category'];
  // VARIABLES (ADD REQUEST)
  $add_req = $_POST['add_req'];
  $user_id = $_SESSION['user']['user_id'];
  $name_req = $_POST['name'];
  $description = $_POST['description'];
  $category = $_POST['category'];
  $date = date('d-m-Y H:i:s');
  // VARIABLES (ADD USER)
  $add_user = $_POST['add_user'];
  $full_name = $_POST['full_name'];
  $login = trim($_POST['login']);
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password_confirm = $_POST['password_confirm'];
  $agree = $_POST['agree'];
  // ADD CATEGORY
  $str_add_cat = "INSERT INTO `categories` (`id`, `category`) VALUES (NULL, '$name_cat')";
  // CONDITIONAL ADD CATEGORY
  if ($add_cat) {
    mysqli_query($connect, $str_add_cat);
    header('Location: ../successful.php');
  }
  // PHOTO (ADD REQUEST)
  $path = 'assets/images/uploads/' . time() . $_FILES['photo']['name'];
  $uploaded = move_uploaded_file($_FILES['photo']['tmp_name'], '../' . $path);
  // ADD REQUEST
  $str_add_req = "INSERT INTO `requests` (`id`, `name`, `description`, `category`, `photo`, `date`, `status`, `user_id`) VALUES (NULL, '$name_req', '$description', '$category', '$path', '$date', 'Новая', '$user_id')";
  // REQUEST CONDITIONALS
  if ($add_req) {
    // CHECK FOR SUPPORTS SIZE IMAGES
    if ($_FILES['photo']['size'] <= 10485760) {
      // CHECK FOR SUPPORTS FORMATS
      if ($_FILES['photo']['type'] == 'image/jpeg' 
      || $_FILES['photo']['type'] == 'image/jpg' 
      || $_FILES['photo']['type'] == 'image/png' 
      || $_FILES['photo']['type'] == 'image/bmp') {
        mysqli_query($connect, $str_add_req);
        header('Location: ../successful.php');
      } else {
        header('Location: ../add-request.php');
        $_SESSION['message'] = "Неверный формат изображения, поддерживаются (JPG, JPEG, PNG, BMP)";
      }
    } else {
      header('Location: ../add-request.php');
      $_SESSION['message'] = "Большой размер изображения";
    }
  }
  // INSERT QUERY
  $str_add_user = "INSERT INTO `users` (`id`, `fullname`, `login`, `email`, `password`) VALUES (NULL, '$full_name', '$login', '$email', '$password')";
  // CHECK LOGIN
  $str_check_login = "SELECT * FROM `users` WHERE `login` = '$login'";
  $run_check_user = mysqli_query($connect, $str_check_login);
  $check_login = mysqli_num_rows($run_check_user);
  // REGISTRATION CONDITIONS
  // REGULAR EXPRESSION FOR CHECKING FOR CYRILLIC FULL NAME
  if ($add_user) {
    if ($check_login == 0) {
      if (preg_match("/[А-Яа-я]/", $full_name) ) {
        // REGULAR EXPRESSION FOR CHECKING FOR LATIN ALPHABET LOGIN
        if (preg_match("/[A-Za-z]/", $login) && mb_strlen($login) >= 6) {
          // CHECKING FOR IDENTLY OF PASS AND REPEAT PASS
          if ($password === $password_confirm) {
            // CHECKING MIN VALUE PASSWORD
            if (mb_strlen($password) >= 6) {
              // CHECKING FOR EMPTY AGREE
              if (isset($agree)) {
                $password = md5($password);
                mysqli_query($connect, $str_add_user);
                header('Location: ../login.php');
              } else {
                header('Location: ../reg.php');
                $_SESSION['message'] = "Вы не дали согласие на обработку персональных данных!";
              }
            } else {
              header('Location: ../reg.php');
              $_SESSION['message'] = "Пароль должен содержать не менее 6 символов!";
            }
          } else {
            header('Location: ../reg.php');
            $_SESSION['message'] = "Пароли не совпадают!";
          }
        } else {
          header('Location: ../reg.php');
          $_SESSION['message'] = "Логин должен содержать только латинские символы и длину не менее 6 символов!";
        }
      } else {
        header('Location: ../reg.php');
        $_SESSION['message'] = "ФИО должен содержать только кириллицу!";
      }
    } else {
      header('Location: ../reg.php');
      $_SESSION['message'] = "Такой пользователь уже существует!";
    }
  }
?>