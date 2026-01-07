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
