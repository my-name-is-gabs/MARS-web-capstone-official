<?php include('../server/db_connection.php') ?>
<?php session_start() ?>
<?php 
if(isset($_POST['submit'])) {
    $imageData = mysqli_real_escape_string($connection, file_get_contents($_FILES['image']['tmp_name']));
    $imageType = $_FILES['image']['type'];

    if(substr($imageType, 0, 5) !== 'image') {
        echo "<script>alert('Image file only')</script>";
    }
    else {
        $get_profile_table = mysqli_query($connection, "SELECT * FROM `{$_SESSION['username']}_user_profile`");

        if(!$get_profile_table) die('Error in fetching profile tables');

        if(mysqli_num_rows($get_profile_table) === 0) {
            $upload_img_query = mysqli_query($connection, "INSERT INTO {$_SESSION['username']}_user_profile(image) VALUES('$imageData')");
            if(!$upload_img_query)
                die("Error in uploading Image " . mysqli_error($connection));
            
            header("Location: ../pages/dash.php");
        }
        else {
            $update_upload_img = mysqli_query($connection, "UPDATE `{$_SESSION['username']}_user_profile` SET image='$imageData' WHERE id=1");
            if(!$update_upload_img)
                die("Error in update the image " . mysqli_error($connection));

            header("Location: ../pages/dash.php");
        }
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
    <?php include('./head.php'); ?>
</head>
<body>
    <?php include('./navigation.php'); ?>
    
    <div class="absolute flex flex-col items-center w-full mt-16">
        <form action="uploadPic.php" method="POST" enctype="multipart/form-data" class="flex flex-col justify-center items-center w-full gap-5">
            <div class="upload-zone">
                <span class="upload__prompt text-4xl">Click to upload</span>
                <input type="file" name="image" class="upload__input">
            </div>
            <input type="submit" name="submit" value="Save" class="bg-green-500 text-white sm:px-8 px-5 py-2 float-right rounded-lg cursor-pointer">
        </form>
    </div>

    <script>
        document.querySelectorAll(".upload__input").forEach((inputElement) => {
        const uploadZoneElement = inputElement.closest(".upload-zone");

        uploadZoneElement.addEventListener("click", (e) => {
            inputElement.click();
        });

        inputElement.addEventListener("change", (e) => {
            if (inputElement.files.length) {
            updateThumbnail(uploadZoneElement, inputElement.files[0]);
            }
        });

        });

        
        function updateThumbnail(uploadZoneElement, file) {
        let thumbnailElement = uploadZoneElement.querySelector(".upload__thumb");

     
        if (uploadZoneElement.querySelector(".upload__prompt")) {
            uploadZoneElement.querySelector(".upload__prompt").remove();
        }

        if (!thumbnailElement) {
            thumbnailElement = document.createElement("div");
            thumbnailElement.classList.add("upload__thumb");
            uploadZoneElement.appendChild(thumbnailElement);
        }

        thumbnailElement.dataset.label = file.name;

        if (file.type.startsWith("image/")) {
            const reader = new FileReader();

            reader.readAsDataURL(file);
            reader.onload = () => {
            thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
            };
        } else {
            thumbnailElement.style.backgroundImage = null;
        }
        }
    </script>
</body>
</html>