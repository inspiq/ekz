      <!-- CONTENT -->
      <main class="content">
          <h2 class="title">Создание категории</h2>
          <div class="container">
            <!-- FORM add REQUEST -->
            <form action="./controllers/controller-add.php" method="POST" class="form" enctype="multipart/form-data">
              <input type="text" class="form__input" placeholder="Название категории" name="name_category" required />
              <?php
                // DATABASE CONNECTION
                require_once './controllers/db.php';
                // VARIABLES
					      $select_categories = "SELECT * FROM `categories`";
					      $categories = mysqli_query($connect, $select_categories);
                $categories = mysqli_fetch_all($categories);
					    ?>
              <p class="form__message">
                <?php 
                  echo $_SESSION['message']; 
                  unset($_SESSION['message']);
                ?>
              </p>
              <input class="form__btn" type="submit" name="add_cat" value="Создать категорию" />
            </form>
            </div>
          </div>
      </main>