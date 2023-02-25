      <!-- CONTENT -->
      <main class="content">
        <div class="select-category">
          <h2 class="select-category__title">Выберите категорию</h2>
          <div class="container">
            <p class="account__welcome">
              Добро пожаловать, <?= $_SESSION['user']['fullname']; ?>!
            </p>
            <nav class="nav">
              <div class="nav__items">
                <a class="btn-main nav__item" href="./all-request.php">Все заявки</a>
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
                      <a href="./admin-panel.php?category=<?= $categories[$i][1]; ?>" class="btn-main nav__item"><?= $categories[$i][1]; ?></a>
                    <?php
                  }
					      ?>
                  <a href="./category-management.php" class="btn-main nav__item red">
                    Управление категориями
                  </a>
              </div>
            </nav>
          </div>
        </div>
      </main>