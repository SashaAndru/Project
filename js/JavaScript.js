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

function toggleForms() {
    const form1 = document.getElementById("formContainer");
    const form2 = document.getElementById("formContainer1");
    
    form1.addEventListener('click', () => {
      formContainer.classList.remove('hidden');
    });
    form2.addEventListener('click', () => {
      formContainer.classList.add('hidden1');
    });

    // if (form1.style.display === "none") {
    //     form1.style.display = "block";
    //     form2.style.display = "none";
    // }else {
    //     form1.style.display = "none";
    //     form2.style.display = "block";
    // }
     }
//form

function toggleForms() {
  const args = Array.from(arguments);
  args.forEach(formId => {
    const form = document.getElementById(formId);
    if (form.classList.contains('hidden')) {
      form.classList.remove('hidden');
    } else {
      form.classList.add('hidden');
    }
  });
}


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
  window.location.href = "log/login.php"
}

//вихiд
function logOut(){
  var xhr = new XMLHttpRequest();
    xhr.open("POST", "log/mainFunctions.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log("Logout successful");
        }
    };
    xhr.send("logout=true"); 
    location.reload(true);
}

//Аккаунт
function openAccount(){
  window.location.href = "log/account.php"
}

//До головної
function BackToMain(){
  window.location.href="../index.php";
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


const openFormButton = document.getElementById('open-form-button');
const newForm = document.getElementById('new-form');

openFormButton.addEventListener('click', () => {
  newForm.style.display = 'block';
});


document.addEventListener('click', (event) => {
  if (!event.target.matches('hideFormButton')) {
    tab2.classList.remove('hidden');
  }
});

//Donate
function openDonate() {
  window.location.href = 'log/account.php?click=true';
}