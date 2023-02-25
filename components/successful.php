      <!-- CONTENT -->
      <main class="content">
        <div class="successful">
          <div class="container">
            <div class="successful__modal">
              <h3>Выполнено успешно!</h3>
              <?php
                if ($_SESSION['user']['admin'] == false) {
                  ?>
                    <p class="tip">Вы можете управлять заявками прямо из личного кабинета!</p>
                    <a href="account.php" class="btn-main">
                      Перейти в личный кабинет
                    </a>
                  <?php
                } else {
                  ?>
                    <p class="tip">Вы можете управлять заявками с помощью админ панели!</p>
                    <a href="select-category.php" class="btn-main">
                      Перейти в админ панель
                    </a>
                  <?php
                }
              ?>
            </div>
          </div>
        </div>
      </main>