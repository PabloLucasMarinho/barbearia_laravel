const passwordInput = document.getElementsByClassName("input-password");
const toggle = document.querySelector(".password .show");

if (passwordInput.length !== 0) {
  toggle.addEventListener("click", () => {
    for (let i = 0; i < passwordInput.length; i++) {
      const input = passwordInput[i];
      const isPassword = input.type === "password";

      input.type = isPassword ? "text" : "password";
      toggle.textContent = isPassword ? "visibility_off" : "visibility";
    }
  });
}

const menuBtn = document.getElementById("menu-btn");
const sideBar = document.querySelector(".side-bar");
let toggleMenu = sideBar.classList.contains("closed");


menuBtn.addEventListener("click", (event) => {
  event.stopPropagation();

  if (toggleMenu) {
    sideBar.classList.replace("closed", "open");
    menuBtn.classList.add("hidden");
  } else {
    sideBar.classList.replace("open", "closed");
    menuBtn.classList.remove("hidden");
  }
});

document.addEventListener("click", (event) => {
  if (toggleMenu && !sideBar.contains(event.target)) {
    sideBar.classList.replace("open", "closed");
    menuBtn.classList.remove('hidden');
  }
});

const dialog = document.getElementById("delete-dialog");
const title = document.getElementById("dialog-title");
const form = document.getElementById("delete-form");

function openDeleteModal(button) {
  const name = button.dataset.name;

  title.textContent = `Deseja excluir os dados de ${name}?`;
  form.action = button.dataset.action;

  dialog.showModal();
}

function closeDeleteModal() {
  dialog.close();
}

function paddingAdjust() {
  const wrappers = document.querySelectorAll('.input-container');

  wrappers.forEach(wrapper => {
    const label = wrapper.querySelector('.dynamic-label');
    const input = wrapper.querySelector('.dynamic-input');

    if (label && input) {
      const labelWidth = label.offsetWidth;
      input.style.paddingLeft = `calc(${labelWidth}px + 0.5rem)`;
    }
  })
}

window.addEventListener('load', paddingAdjust);

window.addEventListener('resize', paddingAdjust);

const zipInput = document.getElementById('zip_code');

zipInput.addEventListener('blur', function () {
  let cep = this.value.replace(/\D/g, '');

  if (cep.length !== 8) {
    return;
  }

  fetch(`https://viacep.com.br/ws/${cep}/json/`)
    .then(res => res.json()).then(data => {
      if (data.erro) {
        return;
      }

      document.getElementById('address').value = data.logradouro;
      document.getElementById('neighborhood').value = data.bairro;
      document.getElementById('city').value = data.localidade;
  }).catch(error => {
    console.error('Erro ao buscar CEP');
  });
});

const salaryInput = document.getElementById('salary');

salaryInput.addEventListener('input', function (e) {
  let value = e.target.value.replace(/\D/g, '');

  if (!value) {
    e.target.value = '';
    return;
  }

  value = (parseInt(value) / 100).toFixed(2);

  e.target.value = new Intl.NumberFormat('pt-BR', {
    minimumFractionDigits: 2,
    maximumFractionDigits: 2
  }).format(value);
});
