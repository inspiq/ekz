      <!-- CONTENT -->
      <main class="content">
        <!-- SOLVED PROBLEMS -->
        <div class="solved-problems">
          <!-- TITLE -->
          <h2 class="title"><span>Решенные</span> проблемы</h2>
          <!-- CONTAINER -->
          <div class="container">
            <!-- ITEMS -->
            <?php 
              // DATABASE CONNECTION
              require_once './controllers/db.php';
              // VARIABLES
              $out_requests = "SELECT * FROM `requests` WHERE `requests`.`status` = 'Решена'";
              $requests = mysqli_query($connect, $out_requests);
              $requests = mysqli_fetch_all($requests);
              // COMPLETED REQUESTS
              for ($i = 0; $i < 4; $i++) { 
                ?>
                <div class="solved-problems__item">
                  <img
                    src="<?= $requests[$i][4]; ?>"
                    alt="Проблема"
                    width="450"
                    height="100%"
                    class="solved-problems__item-img"
                  />
                  <h4 class="solved-problems__name"><?= $requests[$i][1]; ?></h4>
                  <p class="solved-problems__tag-name"><?= $requests[$i][3]; ?></p>
                  <p class="solved-problems__time"><?= $requests[$i][5]; ?></p>
                </div>
                <?php
              }
            ?>
          </div>
        </div>
        <!-- TITLE -->
        <h2 class="title"><span>Решенных</span> заявок</h2>
        <!-- QUANTITY SOLVED PROBLEMS -->
        <div class="quantity-solved">
          <div class="quantity-solved__circle">
            <p class="quantity-solved__title"><span>#</span>             
             <?php 
                require_once './controllers/db.php';
                // VARIABLES
                $out_requests = "SELECT * FROM `requests` WHERE `status` = 'Решена'";
                $requests = mysqli_query($connect, $out_requests);
                $requests = mysqli_fetch_all($requests);
                ?>
                  <?= count($requests); ?>
                <?php
              ?>
            </p>
          </div>
        </div>
      </main>