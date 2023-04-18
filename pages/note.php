<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Note - M.A.R.S</title>
    <?php include('../components/head.php'); ?>
    <script defer src="./script/notes.js"></script>
</head>
<body>
    <?php include('../components/navigation.php'); ?>
    <div class="max-w-[900px] h-full mx-auto flex flex-col gap-5 px-4">
        <div class="py-5 inline-flex gap-4 w-full justify-end mb-3 bg-transparent mt-4" id="btn-float-container">
            
            <button type="button"
            class="bg-green-500 text-white sm:px-8 px-5 py-2 float-right rounded-lg"
            id="saveBtn"
          >
            Save
          </button>
            <button type="button"
            class="bg-red-500 text-white sm:px-8 px-5 py-2 float-right rounded-lg"
            id="clearBtn"
          >
            Clear All
          </button>
        </div>
        <section class="mt-2" id="noteContainer">
            <div class="text-center">
              <h1 class="text-4xl text-gray-500">Add New Note</h1>
              <span class="text-gray-500">just say "note" followed by your speech that you want to take note</span>
            </div>
        </section>
    </div>
</body>
</html>