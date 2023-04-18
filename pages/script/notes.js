const btnFloatContainer = document.getElementById('btn-float-container');
const saveBtn = document.getElementById('saveBtn');
const noteContainer = document.getElementById('noteContainer');
const clearBtn = document.getElementById('clearBtn');

const notesArray = [];

const NotesClass = class {
  constructor(date, value) {
    this.date = date;
    this.value = value;
  }
};

// ================ WEB SPEECH API ====================
let SpeechRecognition =
  window.SpeechRecogntion || window.webkitSpeechRecognition;

const synth = window.speechSynthesis;
const recongition = new SpeechRecognition();
recongition.interimResults = true;

const utter = new SpeechSynthesisUtterance();
utter.pitch = 1;
utter.rate = 0.8;
utter.volume = 1;

synth.onvoiceschanged = function () {
  const updateVoice = synth.getVoices();
  updateVoice.forEach(voice => {
    if (voice.voiceURI.search('Zira') != -1) {
      utter.voice = voice;
    }
  });
};

recongition.addEventListener('result', function (event) {
  const { transcript } = event.results[0][0];

  console.log(transcript);

  if (event.results[0].isFinal) {
    if (transcript.includes('note')) {
      const userNote = transcript.replace('note ', '');
      const date = dateFormat();
      const newNotes = new NotesClass(date, userNote);
      notesArray.push(newNotes);
      renderNote(notesArray);
    }
  }

  if (event.results[0].isFinal) {
    if (transcript.includes('mars')) {
      const userNote = transcript.replace('mars ', '');
      const date = dateFormat();
      const newNotes = new NotesClass(date, userNote);
      notesArray.push(newNotes);
      renderNote(notesArray);
    }
  }
});

recongition.start();

recongition.addEventListener('end', function () {
  recongition.interimResults = true;
  recongition.start();
});

//===============================================================

// ================================ functions ================================

const dateFormat = function () {
  return Intl.DateTimeFormat('en-PH', {
    year: 'numeric',
    month: '2-digit',
    day: '2-digit',
    hour: '2-digit',
    minute: '2-digit',
  }).format();
};

const renderNote = function (states) {
  noteContainer.innerHTML = '';

  states.forEach(state => {
    const markup = `
    <div class="flex flex-col flex-wrap gap-2 p-4 mb-4 border-l-8 border-l-lightPrimary bg-[#f2f2f2]">
      <span class="self-end">${state.date}</span>
      <p>${state.value}</p>
    </div>
  `;

    noteContainer.insertAdjacentHTML('beforeend', markup);
  });
};

// =========================================================================

// ========================== Event Listener ================================

saveBtn.addEventListener('click', function () {
  alert('Notes saved');
  localStorage.setItem('savedNotes', JSON.stringify(notesArray));
});

clearBtn.addEventListener('click', function () {
  const confirmClear = confirm('Clear all notes?');
  if (!confirmClear) return;
  localStorage.clear();
  location.reload();
});

const noteItems = JSON.parse(localStorage.getItem('savedNotes'));
if (noteItems !== null) {
  renderNote(noteItems);
}
// =================================================================
