const cards = document.querySelectorAll('#card');
const modal = document.getElementById('setModal');
const editModal = document.getElementById('editModal');
const closeModal = document.getElementById('closeModal');
const overlay = document.getElementById('overlay');
const modalTitle = document.getElementById('modalTitle');
const modalContent = document.getElementById('modalContent');
const practiceBtn = document.getElementById('practiceBtn');
const editBtn = document.getElementById('editBtn');
const delBtn = document.getElementById('delBtn');

const openModalWindow = function () {
  modal.classList.remove('hidden');
  overlay.classList.remove('hidden');
  document.body.style.overflowY = 'hidden';
};

const closeModalWindow = function (e) {
  e.preventDefault();
  modal.classList.add('hidden');
  overlay.classList.add('hidden');
  document.body.style.overflowY = 'scroll';
};

cards.forEach(card => {
  card.addEventListener('click', e => {
    const parent = e.target.closest('#card');
    const titleElement = parent.firstElementChild;
    if (e.target === card || e.target === titleElement) {
      openModalWindow();
      const title = parent.firstElementChild.textContent.trim();
      const content =
        parent.firstElementChild.nextElementSibling.textContent.trim();

      modalTitle.textContent = title;
      modalContent.textContent = content;
    }
  });
});

closeModal.addEventListener('click', closeModalWindow);
overlay.addEventListener('click', closeModalWindow);

// practiceBtn.addEventListener('click', e => {
//   e.preventDefault();
//   window.location.assign('../pages/practice.php');
// });
