<?php 
session_start();
include_once('../server/db_connection.php');
$user_table = $_SESSION['username'];

if(isset($_GET['title'])) {
  $card_set_title = $_GET['title'];


  $_SESSION['card_title'] = $card_set_title;


  $card_query = "SELECT * FROM `{$user_table}_{$card_set_title}`";

  $fetch_table_title = mysqli_query($connection, "SELECT title FROM `{$user_table}_dash_title` WHERE table_title='{$card_set_title}'");

  $cards_fetch = mysqli_query($connection, $card_query);

  if(!$cards_fetch || !$fetch_table_title) die("Error fetching card values " . mysqli_error($connection));

  while($row = mysqli_fetch_assoc($fetch_table_title)) {
    $Title = $row['title'];
  }

  $_SESSION['title_session'] = $card_set_title;

 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $Title ?> - M.A.R.S</title>
    <?php include('../components/head.php'); ?>
    <script defer src="./script/card-set.js"></script>
</head>
<body>
    <?php include('../components/navigation.php'); ?>
    <div class="max-w-[800px] w-full h-full mx-auto flex flex-col gap-4 mt-4 px-4" id="set_container">

        

         <div
          class="py-4 top-0 mx-auto max-w-[800px] px-4 w-full inline-flex gap-3 justify-end z-10"
          id="btn-float-container"
        >
        
          
        <a href="./practice.html"
            class="bg-Active text-white px-10 py-3 rounded-lg z-10 hover:scale-105"
            id="practiceBtn"
          >
            Practice
          </a>
        </div>

        <div class="p-5 border-b-4 inline-flex justify-between border-b-Active">
            <h1 class="text-4xl" id="setTitle"><?php echo $Title; ?></h1> 

        </div>

        <div class="my-5 flex flex-col gap-3">
            <?php 
              while($row = mysqli_fetch_assoc($cards_fetch)) {
            ?>
            <section class="bg-Primary p-6 text-white text-xl border-b-4 border-b-Active cursor-pointer hover:scale-102 inline-flex justify-between" id="card">
                <h2 id="term"><?php echo $row['term'] ?></h2>
                <p class="hidden" id="definition"><?php echo $row['definition'] ?></p>
                <div>
                  <a href="./editCard.php?id=<?php echo $row['id'] ?>" class="self-end text-white hover:text-Active mx-3" id="editBtn"><i class="far fa-edit"></i> Edit</a>
                </div>
            </section>
            <?php }}?>

        </div>
    </div>

    <div class="rounded-xl flex hidden" id="setModal">
        <a href="#" id="closeModal"><i class="fas fa-times text-2xl"></i></a>
        <h1 class="text-2xl my-6 font-medium" id="modalTitle"></h1>

        <p class="p-4 text-center overflow-auto" id="modalContent"></p>

    </div>
    <div class="hidden" id="overlay"></div>
</body>
</html>