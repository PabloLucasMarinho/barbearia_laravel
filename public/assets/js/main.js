const passwordInput = document.getElementById("password");
const toggle = document.querySelector(".password .show");

if (passwordInput) {
  toggle.addEventListener("click", () => {
    const isPassword = passwordInput.type === "password";

    passwordInput.type = isPassword ? "text" : "password";
    toggle.textContent = isPassword ? "visibility_off" : "visibility";
  });
}
