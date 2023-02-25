      <!-- CONTENT -->
      <main class="content">
        <h2 class="title">Регистрация</h2>
        <div class="container">
          <!-- FORM REGISTRATION -->
          <form action="./controllers/controller-add.php" method="POST" class="form">
            <input type="text" class="form__input" placeholder="ФИО" name="full_name" required />
            <input type="text" class="form__input" placeholder="Логин" name="login" required />
            <input type="email" class="form__input" placeholder="Почта" name="email" required />
            <input type="password" class="form__input" placeholder="Пароль" name="password" required />
            <input
              type="password"
              class="form__input"
              placeholder="Повторите пароль"
              name="password_confirm"
              required
            />
            <div class="form__agree">
              <input type="checkbox" name="agree" id="agree">
              <label for="agree">Согласен на обработку персональных данных</label>
            </div>
            <p class="form__message">
              <?php 
                echo $_SESSION['message']; 
                unset($_SESSION['message']);
              ?>
            </p>
            <input class="form__btn" type="submit" name="add_user" value="Зарегистрироваться" />
          </form>
        </div>
      </main>