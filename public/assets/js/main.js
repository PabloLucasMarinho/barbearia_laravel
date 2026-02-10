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
