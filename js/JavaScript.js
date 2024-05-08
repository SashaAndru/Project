const sports = document.querySelectorAll('.sport');
sports.forEach(sport => {
  sport.addEventListener('click', () => {
    sport.style.backgroundColor = '#ccc';
  });
});

//пошук
const searchInput = document.getElementById('searchInput');
    const sportsList = document.getElementById('sportsList');

    searchInput.addEventListener('input', () => {
      const searchTerm = searchInput.value.toLowerCase();
      const sports = Array.from(sportsList.children);

      sports.forEach(sport => {
        const sportText = sport.textContent.toLowerCase();
        sport.style.display = sportText.includes(searchTerm) ? 'block' : 'none';
      });
    });


//form

const showFormButton = document.getElementById('showFormButton');
const hideFormButton = document.getElementById('hideFormButton');
const formContainer = document.getElementById('formContainer');

showFormButton.addEventListener('click', () => {
  formContainer.classList.remove('hidden');
});

hideFormButton.addEventListener('click', () => {
  formContainer.classList.add('hidden');
});

//Реєстрація
function openRegistration() {
  window.location.href = "log/register.php";
}
//вхід
function openLogin(){
  window.location.hreh = "log/login.php"
}

const showRegisterButton = document.getElementById('regis');
const hideRegisterButton = document.getElementById('closeRegister');
const formRegisterContainer = document.getElementById('register');

showRegisterButton.addEventListener('click', () => {
  formRegisterContainer.classList.remove('regi');
});

hideRegisterButton.addEventListener('click', () => {
  formRegisterContainer.classList.add('regi');
});

//Каса
const tab2 = document.getElementById('tab2');

toggleTabBtn.addEventListener('click', () => {
  tab2.classList.toggle('hidden');
});

document.addEventListener('click', (event) => {
  if (!event.target.matches('hideFormButton')) {
    tab2.classList.remove('hidden');
  }
});












/*
document.getElementById('showFormButton').addEventListener('click', function() {
  const formContainer = document.createElement('div');
  formContainer.innerHTML = `
    <form>
      <!-- Balance section -->
      <h2>Мій баланс: 100 UAH</h2>
      <button>Kaca</button>

      <!-- Buttons section -->
      <div class="button-group">
        <button>Баланс</button>
        <button>Мої дані</button>
      </div>

      <!-- Bonuses section -->
      <h3>Бонуси</h3>
      <p>Мої бонуси казино: 2</p>
      <p>Мої спортивні бонуси: 3</p>

      <!-- History section -->
      <h3>Історія</h3>
      <button>Історія транзакцій</button>
      <button>Історія ставок</button>
      <button>Ігрові транзакції</button>
      <button>Верифікація</button>
      <button>Історія бонусів</button>

      <!-- Status section -->
      <h3>Статус</h3>
      <p>Відкриті</p>
      <p>Розраховані</p>

      <!-- Hide form button -->
      <button id="hideFormButton">Hide Form</button>
    </form>
  `;
  formContainer.id = 'formContainer';
  formContainer.classList.remove('hidden');
  formContainer.style.zIndex = '1000';
  document.body.appendChild(formContainer);
  document.getElementById('showFormButton').classList.add('hidden');
  document.getElementById('hideFormButton').classList.remove('hidden');
});

document.getElementById('hideFormButton').addEventListener('click', function() {
  document.getElementById('formContainer').remove();
  document.getElementById('showFormButton').classList.remove('hidden');
  document.getElementById('hideFormButton').classList.add('hidden');
});*/