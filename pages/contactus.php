<?php
include_once('../server/db_connection.php');
session_start();

if(isset($_POST['contactField'])) {
  $suggestion_query = mysqli_query($connection, "INSERT INTO suggestion_tbl(username, suggestion) VALUES('{$_SESSION['username']}','{$_POST['contactField']}')");

  if(!$suggestion_query) die("Error in query " . mysqli_error($connection));

  header("location: ./dash.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - M.A.R.S</title>
    <?php include('../components/head.php'); ?>
</head>
<body>
  <?php include('../components/navigation.php') ?>
    <div class="max-w-[800px] w-full h-screen mx-auto flex flex-col gap-4 px-4 justify-center items-center">
        <div
        class="absolute bg-slate-500 text-white flex flex-col items-center text-xl py-9 sm:px-20 px-9 hidden"
        id="success"
        >
        <h1 class="text-2xl">Message Sent</h1>
        <br>
        <img src="../assets/email.png" alt="sent" width="100">
      </div>

        <form action="contactus.php" method="post" class="w-full flex flex-col bg-[#ddd] p-7 text-[#333] shadow-lg shadow-black text-center" id="contactForm">
            
            <label for="contactField" class="p-4 text-2xl">Send your suggestion/recommendation</label>
            
            <textarea name="contactField" id="contactField" required></textarea>
            </button>
            <button
            class="bg-green-500 text-white sm:px-8 px-5 py-2 float-right rounded-lg sm:max-w-[30%] w-full self-center mt-4"
          >
            Send
          </button>
        </form>
    </div>

    <script>
      const success = document.getElementById('success');
      const form = document.getElementById('contactForm');

      form.addEventListener('submit', e => {

        success.classList.remove('hidden');
        setTimeout(() => {
          window.location.assign('./dash.php');
        }, 2000);
      })
      
    </script>
</body>
</html>