<?php
  // DATABASE CONNECTION
  require_once './db.php';
  // VARIABLES (CATEGORY)
  $category_id = $_GET['id'];
  $category = $_GET['category'];
  $cat_delete = $_POST['cat_delete'];
  // VARIABLES (REQUESTS)
  $id = $_GET['id'];
  $req_delete = $_POST['req_delete'];
  // DELETE CATEGORY AND REQUEST
  $str_delete_category = "DELETE FROM categories WHERE `categories`.`id` = '$category_id'";
  $str_delete_request = "DELETE FROM requests WHERE `requests`.`category` = '$category'";
  // CONDITIONAL DELETE CATEGORY AND REQUEST
  if ($cat_delete) {
    // QUERY DELETE
    mysqli_query($connect, $str_delete_request);
    mysqli_query($connect, $str_delete_category);
    // LOCATION
    header('Location: ../delete-category.php');
  }
  // CONDITIONAL DELETE REQUEST
  if ($req_delete) {
    // QUERY DELETE
    mysqli_query($connect, "DELETE FROM requests WHERE `requests`.`id` = '$id'");
    // LOCATION
    header('Location: ../account.php');
  }
?>