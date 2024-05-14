//поповнити
const giveMoneyButton = document.getElementById('giveMoneyButton');
const closeGiveMoneyForm = document.getElementById('closeGiveMoneyForm');
const formGiveMoney = document.getElementById('formGiveMoney');

giveMoneyButton.addEventListener('click', () => {
  formGiveMoney.classList.remove('hidden');
  giveMoneyButton.classList.add('hidden');
});

closeGiveMoneyForm.addEventListener('click', () => {
  giveMoneyButton.classList.remove('hidden');
  formGiveMoney.classList.add('hidden');
});

//карта
const card = document.querySelector('.card');
const flipButton = document.getElementById('flipButton');

flipButton.addEventListener('click', function(event) {
  event.preventDefault();
  card.classList.toggle('is-flipped');
});

//на головну
function BackToMain(){
  window.location.href="../index.php";
}

//зняти
const takeMoneyButton = document.getElementById('takeMoneyButton');
const closeTakeMoneyForm = document.getElementById('closeTakeMoneyForm');
const formTakeMoney = document.getElementById('formTakeMoney');

takeMoneyButton.addEventListener('click', () => {
  formTakeMoney.classList.remove('hidden');
  takeMoneyButton.classList.add('hidden');
});

closeTakeMoneyForm.addEventListener('click', () => {
  takeMoneyButton.classList.remove('hidden');
  formTakeMoney.classList.add('hidden');
});


//Зберiгти змiни
function SaveData(inputId, dbName) {
  var textInput = document.getElementById(inputId).value;
  if (textInput !== "") {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "mainFunctions.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4) {
        if (xhr.status === 200) {
          console.log("Дані успішно збережені в базі даних!");
        } else {
          console.error("Сталася помилка при збереженні даних в базі даних:", xhr.status, xhr.statusText);
        }
      }
    };
    xhr.send("field=" + dbName + "&data=" + encodeURIComponent(textInput));
  } else {
    alert("Заповніть будь ласка поле");
  }
  location.reload();
}