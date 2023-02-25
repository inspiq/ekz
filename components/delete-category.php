      <!-- CONTENT -->
      <main class="content">
        <div class="admin-panel">
          <h2 class="admin-panel__title">Категории</h2>
          <div class="table">
            <table>
              <thead>
                <tr class="table__item">
                  <td class="table__item-title">Название</td>
                </tr>
              </thead>
              <?php 
                // DATABASE CONNECTION
                require_once './controllers/db.php';
                // VARIABLES
                $out_categories = "SELECT * FROM `categories`";
                $categories = mysqli_query($connect, $out_categories);
                $categories = mysqli_fetch_all($categories);
                // OUTPUT CATEGORIES
                for ($i = 0; $i < count($categories); $i++) {
                  ?>
                    <tbody>
                      <tr class="table__item">
                        <td><?= $categories[$i][1]; ?></td>
                        <td>
                          <form action="./controllers/controller-delete.php?id=<?= $categories[$i][0]; ?>&&category=<?= $categories[$i][1]; ?>" method="POST">
                            <input class="btn-main red" value="Удалить" name="cat_delete" type="submit" />
                          </form>
                        </td>
                      </tr>
                    </tbody>
                  <?php
                }
              ?>
            </table>
          </div>
        </div>
      </main>