      <!-- CONTENT -->
      <main class="content">
          <h2 class="title">Создание заявки</h2>
          <div class="container">
            <!-- FORM add REQUEST -->
            <form action="./controllers/controller-add.php" method="POST" class="form" enctype="multipart/form-data">
              <input type="text" class="form__input" placeholder="Название" name="name" required />
              <textarea name="description" cols="30" rows="10" placeholder="Опишите проблему" class="form__description" required></textarea>
              <select name="category" class="form__categories">
              <?php
                // DATABASE CONNECTION
                require_once './controllers/db.php';
                // VARIABLES
					      $select_categories = "SELECT * FROM `categories`";
					      $categories = mysqli_query($connect, $select_categories);
                $categories = mysqli_fetch_all($categories);
                // OUTPUT CATEGORIES
                for ($i = 0; $i < count($categories); $i++) { 
                  ?>
                    <option value="<?= $categories[$i][1]; ?>"><?= $categories[$i][1]; ?></option>
                  <?php
                }
					    ?>
              </select>
              <input type="file" class="form__file" name="photo" required />
              <p class="form__message">
                <?php 
                  echo $_SESSION['message']; 
                  unset($_SESSION['message']);
                ?>
              </p>
              <input class="form__btn" type="submit" name="add_req" value="Отправить заявку" />
            </form>
            </div>
          </div>
      </main>