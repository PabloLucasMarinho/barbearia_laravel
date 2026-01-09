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

const sideBarMenuBtn = document.getElementById("menu-button");
const sideBar = document.querySelector(".side-bar");

sideBarMenuBtn.addEventListener("click", (event) => {
  event.stopPropagation();
  const isClosed = sideBar.classList.contains("closed");

  isClosed
    ? sideBar.classList.replace("closed", "open")
    : sideBar.classList.replace("open", "closed");
});

document.addEventListener("click", (event) => {
  const isOpen = sideBar.classList.contains("open");

  if (
    isOpen &&
    !sideBar.contains(event.target) &&
    !sideBarMenuBtn.contains(event.target)
  ) {
    sideBar.classList.replace("open", "closed");
  }
});
