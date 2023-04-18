<?php 
include_once('../server/db_connection.php');
session_start();

$user_table = $_SESSION['username'];

if(isset($_GET['id'])) {
    $card_id = $_GET['id'];
    $get_current_card = mysqli_query($connection, "SELECT * FROM `{$user_table}_{$_SESSION['card_title']}` WHERE id=$card_id");
    if(!$get_current_card) die("Error in fetching table ".mysqli_error($connection));

    while($row = mysqli_fetch_assoc($get_current_card)) {
        $id_card = $row['id'];
        $termValue = $row['term'];
        $defintionValue = $row['definition'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviewer - MARS Web App</title>
    <?php include('../components/head.php') ?>
</head>
<body>
    <?php include('../components/navigation.php') ?>
    <div class="max-w-[800px] w-full h-screen mx-auto flex flex-col gap-4 px-4 justify-center items-center">
        <form action="../server/editCard_server.php" method="post" class="w-full flex flex-col bg-[#ddd] p-7 text-[#333] shadow-lg shadow-black">
            <input type="hidden" name="card_id" value="<?php echo $id_card?>">
            <label for="editTerm">Term</label>
            <input type="text" name="editTerm" class="mb-4 p-3" value="<?php echo $termValue ?>">
            <label for="editContent">Definition</label>
            <textarea name="editContent" id="editContent"><?php echo $defintionValue ?></textarea>
            </button>
            <button
            class="bg-green-500 text-white sm:px-8 px-5 py-2 float-right rounded-lg sm:max-w-[30%] w-full self-center mt-4"
          >
            Save
          </button>
        </form>
    </div>
</body>
</html>
