<?php 
  // DATABASE CONNECTION
  require_once 'db.php';
  // VARIABLES 
  $request_id = $_POST['id'];
  $status = $_POST['status'];
  $description_cancel = $_POST['description_cancel'];
  // PHOTO
  $path = 'assets/images/uploads/' . time() . $_FILES['photo_resolved']['name'];
  $uploaded = move_uploaded_file($_FILES['photo_resolved']['tmp_name'], '../' . $path);
  // UPDATE
	$update_status = "UPDATE `requests` SET `status` = '$status', `description_cancel` = '$description_cancel' WHERE `requests`.`id` = '$request_id'";
  $update_status_photo = "UPDATE `requests` SET `status` = '$status', `photo_resolved` = '$path' WHERE `requests`.`id` = '$request_id'";
  // CONDITIONAL
  if ($status == 'Решена') {
    if ($uploaded) {
      mysqli_query($connect, $update_status_photo);
      header('Location: ../successful.php');
    } else {
      header('Location: ../update-status.php');
      $_SESSION['message'] = "Добавьте изображение решенной заявки!";
    }
  } else {
    if ($status == 'Отклонена') {
      if ($description_cancel) {
        mysqli_query($connect, $update_status);
        header('Location: ../successful.php');
      } else {
        header('Location: ../update-status.php');
        $_SESSION['message'] = "Заполните поле с причиной отказа!";
      }
    } if ($status == 'Новая') {
      header('Location: ../update-status.php');
    }
  }
?>