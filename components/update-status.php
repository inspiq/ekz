      <!-- CONTENT -->
      <main class="content">
        <div class="update-status">
        <h2 class="update-status__title">Изменение статуса заявки</h2>
        <p class="tip update-status__tip">Статус заявки изменять исключительно на "Решена" или "Отклонена"</p>
          <div class="container">
            <!-- FORM add REQUEST -->
            <form action="./controllers/controller-update.php" method="POST" class="form" enctype="multipart/form-data">
              <?php
                // VARIABLES 
                $request_id = $_GET['id'];
                // DATABASE CONNECTION
                require_once './controllers/db.php';
                // VARIABLES
					      $select_requests = "SELECT * FROM `requests` WHERE `id` = '$request_id'";
					      $requests = mysqli_query($connect, $select_requests);
                $requests = mysqli_fetch_array($requests);
					    ?>
              <select name="status" class="form__categories">
                <option value="<?= $requests[6]; ?>"><?= $requests[6]; ?></option>
                <option value="Решена">Решена</option>
                <option value="Отклонена">Отклонена</option>
              </select>
              <input type="hidden" name="id" value="<?= $requests[0]; ?>">
              <input type="file" class="form__file" name="photo_resolved" />
              <textarea name="description_cancel" class="form__description" cols="30" rows="10" placeholder="Причина отказа заявки (заполнить только в случае выбранного статуса: Отклонена)"></textarea>
              <p class="form__message">
                <?php 
                  echo $_SESSION['message']; 
                  unset($_SESSION['message']);
                ?>
              </p>
              <button class="form__btn" type="submit">Изменить</button>
            </form>
          </div>
        </div>
      </main>