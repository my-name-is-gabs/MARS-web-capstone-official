<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Info - M.A.R.S</title>
    <?php include('../components/head.php') ?>
  </head>
  <body>
    <?php include('../components/navigation.php') ?> 

    <div class="max-w-[1300px] w-full mx-auto bg-white">
      <main class="px-6">
        <h1 class="text-5xl py-10 font-extrabold">Get Started</h1>

        <section class="my-10">
          <p>
            Mini Application for Recognizing Speech (M.A.R.S) is a web
            application that recognizes the speech of the user through the
            microphone. The web application provides the user to help them in
            their studying/reviewing by saying the answer out loud rather than
            just typing them. That it can also help the user to practice its
            pronunciation. It also has the mini-note section where the web app
            can record the note provided by the user through speaking rather
            than typing it, which can assist the user if ever they are focusing
            on something. It is advisable to use this web application in a less
            noisy background for the app to be able to clearly understand the
            word that the user is saying. The inputted speech data from the
            microphone may vary depending on how the user pronounces the word,
            therefore, it can display a different word from the expected word
            output. The web application can only work in Google Chrome browser
            <br /><br />
            <b>Reminder: DO NOT FORGET to "Allow microphone access" to allow the
            application to recognize your speech.</b>
          </p>
        </section>

        <section class="p-4 mt-6">
          <h2 class="font-bold text-2xl">Reviewer Section</h2>
          <br />
          <img src="../assets/info/reviewer.png" alt="reviewer section" />
        </section>

        <section class="p-4 mt-6">
          <h2 class="font-bold text-2xl">Created Set</h2>
          <br />
          <img src="../assets/info/set.PNG" alt="Set" />
          <br />
          <br />
          <div class="flex flex-col justify-center items-center">
            <p>
              Inside the creted set, you can click on one of the terms and it
              will open a modal window that displays the term and definition.
            </p>
            <br />
            <img src="../assets/info/modal.PNG" alt="modal" width="800" />
          </div>
          <br />
          <br />
          <div class="flex flex-col justify-center items-center">
            <p>There is a two buttons displayed at the top: Ask and Practice</p>
            <br />
            <img
              src="../assets/info/ask_prac_btn.PNG"
              alt="button"
              width="500"
            />
            <br />
            <ol class="list-decimal">
              <li class="mb-12 text-lg">
                Ask Button <br />
                <br />
                <p>
                  As you click the button you can ask the following: latest news
                  update and a definition of a word.
                  <br /><br />
                  When asking for news just say <b>"anong balita"</b> or
                  <b>"news for today"</b> <br />
                  When asking for the meaning of a word just say
                  <b>"meaning ng ________"</b> or <b>"what is _______"</b> or
                  <b>"ano yung __________"</b>
                </p>
              </li>

              <li class="text-lg">
                Practice Button
                <p>
                  If you click the practice button it will redirect you to
                  practice page
                </p>
                <img
                  src="../assets/info/practice_page.PNG"
                  alt="practice page"
                  width="500"
                />
              </li>
            </ol>
          </div>
        </section>

        <section class="p-4 mt-6">
          <h2 class="font-bold text-2xl">Practice Page</h2>
          <br />
          <img
            src="../assets/info/practice_page.PNG"
            alt="reviewer section"
          />
          <br /><br />
          <div class="flex flex-col justify-center items-center">
            <p>
              For the application to receive your voice, you need to click the
              speak button. After you click the speak button, say the correct
              answer.
            </p>
            <br />
            <img
              src="../assets/info/speak_btn.PNG"
              alt="speak button"
              width="400"
            />
          </div>
          <br /><br />
          <div class="flex flex-col justify-center items-center">
            <p>
              There is a speaker icon on the displayed definition. Click it if
              you want the application to read the definition for you
            </p>
            <br />
            <img
              src="../assets/info/speaker_btn.PNG"
              alt="speaker button"
              width="400"
            />
          </div>
        </section>

        <section class="p-4 mt-6">
          <h2 class="font-bold text-2xl">Note Page</h2>
          <br />
          <img src="../assets/info/note_page.PNG" alt="Note Page" />
          <br /><br />
          <div class="flex flex-col justify-center items-center">
            <p>
              On the note page you can create a note just by saying in to the
              application. For that to happen you need to mention
              <b>"mars"</b> first then followed by the speech that you want the
              application to take note for you. <br /><br />
              You need to make sure to click the save button to save the create
              note before closing the tab or the browser or else all the created
              note/s will be lost.
              <br /><br />
              The saved notes will be stored on your local computer
              <br /><br />
            </p>
          </div>
          <img src="../assets/info/created_note.PNG" alt="created note" />
        </section>
      </main>
    </div>
  </body>
</html>
