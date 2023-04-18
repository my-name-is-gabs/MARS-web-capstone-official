<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create Set - M.A.R.S</title>
    <?php include('../components/head.php'); ?>
    <script defer src="./script/createSet.js"></script>
  </head>
  <body>
    <?php include_once('../components/navigation.php') ?>

    <form class="max-w-[800px] h-full mx-auto block px-4 mt-6">
      <div class="bg-slate-600 listening_class hidden" id="listening">
          <img src="../assets/bars.svg" alt="loading" width="70">
          <span class="text-white">Say something</span>
        </div>
      <div class="flex flex-col mt-5 gap-3">
        <div
          class="py-4 top-0 mx-auto max-w-[800px] px-4 w-full z-20"
          id="btn-float-container"
        >
          <button
            class="bg-Active text-white px-10 py-3 float-right rounded-lg z-10"
            id="createBtn"
          >
            Create
          </button>
          <button
            class="bg-Active text-white px-10 py-3 float-right rounded-lg z-10 mr-6"
            id="speakBtn"
          >
            <i class="fas fa-microphone text-white"></i>
          </button>
        </div>

        <input
          type="text"
          class="w-[60%] border-b-4 border-b-Active p-3 mt-4 text-2xl bg-transparent"
          placeholder="Title"
          id="title"
        />
      </div>

      <div class="flex-flex-col mt-11" id="cardContainer">
 
        <div
          class="bg-Primary h-[33%] p-6 flex-flex-col rounded-lg relative mb-5"
          setId="1"
          id="card"
        >
          
          <input
            type="text"
            id="term"
            class="bg-transparent border-b-4 border-b-white p-3 text-white w-full text-lg"
            placeholder="Term"
            required
          />
          <textarea
            name="definition"
            id="definition"
            class="create-card-textarea"
            placeholder="Definition..."
            spellcheck="false"
            required
          ></textarea>
        </div>
      </div>
      <button
        class="p-4 text-white bg-Primary w-full rounded-lg text-xl mb-10"
        id="addBtn"
      >
        <i class="fas fa-plus"></i> Add Card
      </button>
    </form>
  </body>
</html>
