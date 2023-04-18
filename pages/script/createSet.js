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

  if (event.results[0].isFinal) {
    wikiAPI(transcript);
  }
});

const wikiAPI = async function (search) {
  try {
    const json = await fetch(
      `https://en.wikipedia.org/api/rest_v1/page/summary/${search}`
    );
    const data = await json.json();

    if (!data.description) return;

    cardHTML(search, data.description);
  } catch (err) {
    console.error(err);
  }
};

const createBtn = document.getElementById('createBtn');
const title = document.getElementById('title');
const addBtn = document.getElementById('addBtn');
const setContainer = document.getElementById('cardContainer');
const btnFloatContainer = document.getElementById('btn-float-container');
const speakbtn = document.getElementById('speakBtn');
const listening = document.getElementById('listening');

speakbtn.addEventListener('click', e => {
  e.preventDefault();
  recongition.start();
  listening.classList.remove('hidden');
});

recongition.addEventListener('end', () => {
  listening.classList.add('hidden');
});

const cardHTML = function (term = '', definition = '') {
  const markup = `
        <div
          class="bg-Primary h-[33%] p-6 flex-flex-col rounded-lg relative mb-5"
          setId=${(setIDcount += 1)}
          id="card"
        >
          <button class="float-right" id="deleteBtn">
            <i class="fas fa-times text-xl text-white"></i>
          </button>
          <input
            type="text"
            id="term"
            class="bg-transparent border-b-4 border-b-white p-3 text-white w-full text-lg"
            placeholder="Term"
            value="${term}"
          />
          <textarea
            name="definition"
            id="definition"
            class="create-card-textarea"
            placeholder="Defintion..."
          >${definition}</textarea>
        </div>
    `;

  setContainer.insertAdjacentHTML('beforeend', markup);

  const deleteBtn = document.querySelectorAll('#deleteBtn');
  deleteBtn.forEach(del => {
    del.addEventListener('click', e => {
      e.preventDefault();
      try {
        setContainer.removeChild(e.target.closest('#card'));
      } catch (err) {}
    });
  });
};

let setIDcount = 1;
const cardsArr = [];

const addNewCard = function (e) {
  e.preventDefault();
  const markup = `
        <div
          class="bg-Primary h-[33%] p-6 flex-flex-col rounded-lg relative mb-5"
          setId=${(setIDcount += 1)}
          id="card"
        >
          <button class="float-right" id="deleteBtn">
            <i class="fas fa-times text-xl text-white"></i>
          </button>
          <input
            type="text"
            id="term"
            class="bg-transparent border-b-4 border-b-white p-3 text-white w-full text-lg"
            placeholder="Term"
          />
          <textarea
            name="definition"
            id="definition"
            class="create-card-textarea"
            placeholder="Defintion..."
          ></textarea>
        </div>
    `;

  setContainer.insertAdjacentHTML('beforeend', markup);

  const deleteBtn = document.querySelectorAll('#deleteBtn');
  deleteBtn.forEach(del => {
    del.addEventListener('click', e => {
      e.preventDefault();
      try {
        setContainer.removeChild(e.target.closest('#card'));
      } catch (err) {}
    });
  });
};
addBtn.addEventListener('click', addNewCard);

createBtn.addEventListener('click', function (e) {
  e.preventDefault();
  const cards = document.querySelectorAll('#card');

  if (title.value === '') return;

  cards.forEach(card => {
    const setId = card.getAttribute('setID');
    const term = card.querySelector('#term').value;
    const define = card.querySelector('#definition').value;

    cardsArr.push({ setId, title_cat: title.value, term, definition: define });
  });

  const cardObj = {
    set_table: title.value.split(' ').join('').toLowerCase(),
    title: title.value,
    cardsArr,
  };

  sendCardData(cardObj);
  window.location.assign('../pages/dash.php');
});

const sendCardData = function (value) {
  fetch('../../server/createset_server.php', {
    method: 'POST',
    body: JSON.stringify(value),
    headers: {
      'Content-Type': 'application/json',
    },
  })
    .then(response => response.text())
    .then(data => console.log(data))
    .catch(err => console.error(err));
};

window.addEventListener('scroll', e => {
  if (window.scrollY >= 450) {
    btnFloatContainer.style.position = `fixed`;
    btnFloatContainer.style.backgroundColor = 'white';
  } else {
    btnFloatContainer.style.position = 'static';
    btnFloatContainer.style.background = 'none';
  }
});
