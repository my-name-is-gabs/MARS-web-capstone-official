'use strict';

// prettier-ignore
let SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
const recog = new SpeechRecognition();
recog.interimResults = true;
recog.maxAlternatives = 1;

const utter = new SpeechSynthesisUtterance();
utter.volume = 1;
utter.pitch = 1;
utter.rate = 1;

window.speechSynthesis.onvoiceschanged = function () {
  const updateVoice = window.speechSynthesis.getVoices();
  updateVoice.forEach(voice => {
    if (voice.voiceURI.search('Zira') != -1) {
      utter.voice = voice;
    }
  });
};

const speakBtn = document.querySelector('#speakButton');
const sayContent = document.querySelector('#sayContent');
const answerBox = document.getElementById('answerBox');
const content = document.getElementById('content');
const progressText = document.getElementById('progressText');
const listening = document.getElementById('listening');

// const cards = [
//   {
//     definition: `
//         is a process that assures that all software engineering processes,
//           methods, activities, and work items are monitored and comply with the
//           defined standards. These defined standards could be one or a
//           combination of any like ISO 9000, CMMI model, ISO15504, etc.
//         `,
//     answer: 'software quality assurance',
//   },
//   {
//     definition: `
//         is system software that manages computer hardware, software resources, and provides common services for computer programs.
//       `,
//     answer: 'operating system',
//   },
//   {
//     definition:
//       ' is the branch of computer science that deals with the design, development, testing, and maintenance of software applications. Software engineers apply engineering principles and knowledge of programming languages to build software solutions for end users.',
//     answer: 'Software Engineer',
//   },
// ];

// let cards = [];
let availableCards = [];
// let sampCard = [];
let progress;
// const MAX_PROGRESS = cards.length;
let MAX_PROGRESS = 0;
let currentQuestion = {};
const wrongAnswers = [];
let correctAnswer;

let ScoreObj = {};

(async function () {
  const json = await fetch('../../server/practice_server.php');
  const data = await json.json();
  console.log(data);
  availableCards = data;
  progress = 0;
  MAX_PROGRESS += data.length;
  ScoreObj = {
    totalPoints: MAX_PROGRESS,
  };
  startPractice();
})();

recog.addEventListener('result', event => {
  const { transcript } = event.results[0][0];
  answerBox.value = transcript;
  if (event.results[0].isFinal) {
    checkAnswer();
  }
});

recog.addEventListener('end', () => {
  listening.classList.add('hidden');
});

// const init = function () {
//   availableCards = [...cards];
//   progress = 0;
//   startPractice();
// };

const startPractice = function () {
  if (availableCards.length === 0 || progress > MAX_PROGRESS) {
    ScoreObj.points = wrongAnswers.length;
    ScoreObj.wrongAnswers = wrongAnswers;

    sendJsonData(ScoreObj);
    return window.location.assign('../pages/finalScore.php');
  }
  progress++;
  progressText.textContent = `Question: ${progress}/${MAX_PROGRESS}`;

  const questionIndex = Math.floor(Math.random() * availableCards.length);

  currentQuestion = availableCards[questionIndex];

  content.textContent = currentQuestion.definition;

  utter.text = content.textContent;

  correctAnswer = currentQuestion.term.toLowerCase();

  availableCards.splice(questionIndex, 1);
};

speakBtn.addEventListener('click', function () {
  recog.start();
  listening.classList.remove('hidden');
});

sayContent.addEventListener('click', function () {
  window.speechSynthesis.speak(utter);
});

const checkAnswer = function () {
  const getAnswer = answerBox.value === correctAnswer ? 'correct' : 'incorrect';
  answerBox.classList.add(getAnswer);

  if (getAnswer === 'incorrect') {
    wrongAnswers.push({ answer: answerBox.value, correctAnswer });
  }

  setTimeout(() => {
    answerBox.classList.remove(getAnswer);
    answerBox.value = '';
    startPractice();
  }, 1200);
};

// init();

const sendJsonData = function (dataValue) {
  fetch('../../../server/finalScore_server.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify(dataValue),
  })
    .then(res => res.text())
    .then(data => console.log(data))
    .catch(err => console.error(err));
};
