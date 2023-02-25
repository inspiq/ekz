     <?php 
      // DATABASE CONNECTION
      require_once './controllers/db.php';
      // VARIABLES
      $category = $_GET['category'];
      $out_requests = "SELECT * FROM `requests` WHERE `category` = '$category'";
      $requests = mysqli_query($connect, $out_requests);
      $requests_title = mysqli_fetch_array($requests);
     ?> 
      <!-- CONTENT -->
      <main class="content">
        <div class="admin-panel">
          <h2 class="admin-panel__title"><?= $requests_title[3]; ?></h2>
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
                // VARIABLES
                $requests = mysqli_query($connect, $out_requests);
                $requests = mysqli_fetch_all($requests);
                // COMPLETED REQUESTS
                for ($i = 0; $i < count($requests); $i++) {
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
                              <a class="btn-main disable">Изменить статус</a>
                            </td>
                          <?php
                        } else {
                          ?>
                            <td>
                              <a class="btn-main" href="./update-status.php?id=<?= $requests[$i][0]; ?>">Изменить статус</a>
                            </td>
                          <?php
                        }
                      ?>
                    </tr>
                    </tbody>
                  <?php
                }
              ?>
            </table>
          </div>
        </div>
      </main>