<?php
session_start();
include_once('../server/db_connection.php');
$user_table = $_SESSION['username'];

$card_title_query = "SELECT * FROM `{$user_table}_dash_title`";

$fetching_title = mysqli_query($connection, $card_title_query);

if(!$fetching_title) {
  die("Error in fetching titles from table" . mysqli_error($connection));
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home - M.A.R.S Quiz</title>
    <?php include('../components/head.php'); ?>
  </head>
  <body>
    <?php include_once('../components/navigation.php'); ?>

    <main class="lg:max-w-[1200px] lg:px-5 w-full items-center mx-auto">
      
      <div class="grid lg:grid-cols-3 grid-rows-1 gap-4 mt-6">
        <a href="./createSet.php"
          class="lg:max-w-[400px] w-full h-[120px] bg-Primary flex items-center justify-center text-white cursor-pointer hover:scale-105 duration-200"
          id="newCard"
        >
          <ion-icon name="add-outline" class="text-5xl"></ion-icon>
          <span class="text-3xl">New Set</span>
        </a>

        
        <?php 
          while($row = mysqli_fetch_assoc($fetching_title)) {
        ?>
        <div
          class="lg:max-w-[400px] w-full h-[120px] bg-Primary p-5 flex flex-col justify-between relative hover:shadow-2xl shadow-Active duration-200"
        >
          <a href="./set.php?title=<?php echo strtolower(str_replace(" ", "", $row['title'])) ?>" class="text-white text-3xl" id="cardSet"><?php echo $row['title'] ?></a>
          <a href="../server/dash_server.php?delete_set=<?php echo $row['title']; ?>" class="absolute bottom-3 right-5" id="delBtn" >
            <ion-icon
              name="trash-outline"
              class="text-white text-xl"
            ></ion-icon>
          </a>
        </div>
        <?php }?>
      </div>
    </main>

    <script>
      const delBtn = document.querySelectorAll('#delBtn');

      delBtn.forEach(del => {
        del.addEventListener('click', e => {
          const confirm_del = confirm('Are you sure you want to delete?');

          if (!confirm_del) {
            e.preventDefault();
            return;
          }
        });
      });

    </script>

  </body>
</html>
