let account = document.querySelector("#Account");
let password = document.querySelector("#Password");

let acForm = document.querySelector(".account-form");
let psForm = document.querySelector(".password-form");

account.addEventListener("click", () => {
  acForm.classList.remove("toggle");
  psForm.classList.add("toggle");
  account.classList.add("active");
  password.classList.remove("active");
});

password.addEventListener("click", () => {
  acForm.classList.add("toggle");
  psForm.classList.remove("toggle");
  password.classList.add("active");
  account.classList.remove("active");
});
