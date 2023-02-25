      <!-- CONTENT -->
      <main class="content">
        <div class="account">
        <h2 class="account__title">Управление заявками</h2>
          <div class="container">
            <p class="account__welcome">
              Добро пожаловать, <?= $_SESSION['user']['fullname']; ?>!
            </p>
            <div class="filters">
              <a class="btn-main" href="./controllers/controller-filter-all.php">Все</a>
              <a class="btn-main" href="./controllers/controller-filter-new.php">Новые</a>
              <a class="btn-main green" href="./controllers/controller-filter-solved.php">Решенные</a>
              <a class="btn-main red" href="./controllers/controller-filter-cancel.php">Отклоненные</a>
            </div>
            <div class="table">
            <table>
              <thead>
                <tr class="table__item">
                  <td class="table__item-title">Название</td>
                  <td class="table__item-title">Описание</td>
                  <td class="table__item-title">Категория</td>
                  <td class="table__item-title">Дата</td>
                  <td class="table__item-title">Статус</td>
                </tr>
              </thead>
              <?php 
                $user_id = $_SESSION['user']['user_id'];
                // DATABASE CONNECTION
                require_once './controllers/db.php';
                // VARIABLES
                $out_requests = "SELECT * FROM `requests` WHERE `requests`.`user_id` = '$user_id'";
                $requests = mysqli_query($connect, $out_requests);
                $requests = mysqli_fetch_all($requests);
                // COMPLETED REQUESTS
                for ($i = 0; $i < count($requests); $i++) {
                  if($_SESSION['all'] == true) {
                  ?>
                    <tbody>
                    <tr class="table__item">
                      <td><?= $requests[$i][1]; ?></td>
                      <td><?= $requests[$i][2]; ?></td>
                      <td><?= $requests[$i][3]; ?></td>
                      <td><?= $requests[$i][5]; ?></td>
                      <td><?= $requests[$i][6]; ?></td>
                      <?php
                        if($requests[$i][6] == 'Решена' || $requests[$i][6] == 'Отклонена') {
                          ?>
                            <td>
                              <a class="btn-main disable">Удалить</a>
                            </td>
                          <?php
                        } else {
                          ?>
                            <td>
                              <form action="./controllers/controller-delete.php?id=<?= $requests[$i][0]; ?>" method="POST">
                                <input type="submit" class="btn-main red" value="Удалить" name="req_delete" />
                              </form>
                            </td>
                          <?php
                        }
                      ?>
                    </tr>
                    </tbody>
                  <?php
                  }
                  if($_SESSION['cancel'] == true) {
                    if($requests[$i][6] == "Отклонена") {
                      ?>
                      <tbody>
                      <tr class="table__item">
                        <td><?= $requests[$i][1]; ?></td>
                        <td><?= $requests[$i][2]; ?></td>
                        <td><?= $requests[$i][3]; ?></td>
                        <td><?= $requests[$i][5]; ?></td>
                        <td><?= $requests[$i][6]; ?></td>
                        <td>
                          <a class="btn-main disable">Удалить</a>
                        </td>
                      </tr>
                      </tbody>
                      <?php
                    }
                  }
                  if($_SESSION['solved'] == true) {
                    if($requests[$i][6] == "Решена") {
                      ?>
                      <tbody>
                      <tr class="table__item">
                        <td><?= $requests[$i][1]; ?></td>
                        <td><?= $requests[$i][2]; ?></td>
                        <td><?= $requests[$i][3]; ?></td>
                        <td><?= $requests[$i][5]; ?></td>
                        <td><?= $requests[$i][6]; ?></td>
                        <td>
                          <a class="btn-main disable">Удалить</a>
                        </td>
                      </tr>
                      </tbody>
                      <?php
                    }
                  }
                  if($_SESSION['new'] == true) {
                    if($requests[$i][6] == "Новая") {
                      ?>
                      <tbody>
                      <tr class="table__item">
                        <td><?= $requests[$i][1]; ?></td>
                        <td><?= $requests[$i][2]; ?></td>
                        <td><?= $requests[$i][3]; ?></td>
                        <td><?= $requests[$i][5]; ?></td>
                        <td><?= $requests[$i][6]; ?></td>
                        <td>
                          <a class="btn-main" href="./controllers/controller-delete.php?id=<?= $requests[$i][0]; ?>">Удалить</a>
                        </td>
                      </tr>
                      </tbody>
                      <?php
                    }
                  }
                }
              ?>
            </table>
            </div>
          </div>
        </div>
      </main>