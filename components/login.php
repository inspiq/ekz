      <!-- CONTENT -->
      <main class="content">
        <h2 class="title">Авторизация</h2>
        <div class="container">
          <!-- FORM LOGIN -->
          <form action="./controllers/controller-login.php" method="POST" class="form">
            <input type="text" class="form__input" placeholder="Логин" name="login" required />
            <input type="password" class="form__input" placeholder="Пароль" name="password" required />
            <p class="form__message">
              <?php 
                echo $_SESSION['message']; 
                unset($_SESSION['message']);
              ?>
            </p>
            <button class="form__btn" type="submit">Войти</button>
          </form>
        </div>
      </main>