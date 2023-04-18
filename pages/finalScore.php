<?php session_start();
  $incorrect_set = $_SESSION['incorrect'];
  $incorrects = $incorrect_set['wrongAnswers'];

  // if(empty($incorrects)) {
  //   header("location: ./dash.php");
  // }

  $userScore = $incorrect_set['totalPoints'] - $incorrect_set['points'];
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M.A.R.S</title>
    <?php include('../components/head.php'); ?>
</head>
<body>
    <?php include('../components/navigation.php'); ?>

    <div class="max-w-[800px] h-full mx-auto flex flex-col px-4">
        <div class="border-b-4 border-b-lightPrimary py-5 block mb-4 mt-16">
            <?php
              if($incorrect_set['points'] !== 0) {
                echo "<h1 class='text-5xl'>Score:  {$userScore}/{$incorrect_set['totalPoints']}</h1>";
              }
              else {
                echo "<h1 class='text-5xl'>Perfect Score! 🎉</h1>";
              }
            ?>
            <br>
            <a href="./dash.php"
            class="bg-Active text-white px-8 py-2 float-right rounded-lg"
            id="createBtn"
          >
            Go back
          </a>
        </div>

        <!-- loops -->
        <?php
          if(!empty($incorrects)) { 
          foreach($incorrects as $key => $arrs) {
        ?>
        <div class="bg-Primary h-1/6 w-full flex justify-between my-2">
            <div class="w-full text-white text-center p-6">
                <span>You said:</span>
                <h2 class="text-xl"><?php echo $arrs['answer'] ?></h2>
            </div>
            <div class="w-full text-white text-center p-6">
                <span>Correct answer:</span>
                <h2 class="text-xl text-green-400"><?php echo $arrs['correctAnswer'] ?></h2>
            </div>
        </div>
        <?php }}
          else {
        ?>
          <img src="../assets/congratulations-lettering-label-by-Vexels.png" alt="congrats">
        <?php }?>
        <!-- end loop -->

        
    </div>
</body>
</html>