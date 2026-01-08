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
const sideBar = document.querySelector(".side-bar.closed");

sideBarMenuBtn.addEventListener("click", () => {
  const isClosed = sideBar.classList.contains("closed");

  isClosed
    ? sideBar.classList.replace("closed", "open")
    : sideBar.classList.replace("open", "closed");
});
