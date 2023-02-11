const prevBtns = document.querySelectorAll(".btn-prev");
const nextBtns = document.querySelectorAll(".btn-next");
const progress = document.getElementById("progress");
const formSteps = document.querySelectorAll(".form-step");
const progressSteps = document.querySelectorAll(".progress-step");

let formStepsNum = 0;

nextBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    formStepsNum++;
    updateFormSteps();
    updateProgressbar();
  });
});

prevBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    if (formStepsNum <= 0) return;
    formStepsNum--;
    updateFormSteps();

    updateProgressbar();
  });
});

function updateFormSteps() {
  formSteps.forEach((formStep) => {
    formStep.classList.contains("form-step-active") &&
      formStep.classList.remove("form-step-active");
  });

  formSteps[formStepsNum].classList.add("form-step-active");
}

function updateProgressbar() {
  progressSteps.forEach((progressStep, idx) => {
    if (idx < formStepsNum + 1) {
      progressStep.classList.add("progress-step-active");
    } else {
      progressStep.classList.remove("progress-step-active");
    }
  });

  const progressActive = document.querySelectorAll(".progress-step-active");

  progress.style.width =
    ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%";
}

// ************************************* faq ************

// ============== toggle faq =================//
let header = document.querySelectorAll(".accordion-header");

// ============= get all faq headers =============//
header.forEach((header) => {
  header.addEventListener("click", function (e) {
    let accordion = document.querySelectorAll(".accordion");
    let parentElm = header.parentElement;
    let siblings = this.nextElementSibling;

    // ============= remove faq body height ==========//
    accordion.forEach((element) => {
      element.children[1].style.maxHeight = null;
    });

    // =========== toggle active class ==============//
    parentElm.classList.toggle("active");
    if (parentElm.classList.contains("active")) {
      // ============== remove active class from all the accordions ===//
      accordion.forEach((element) => {
        element.classList.remove("active");
      });
      // ============== toggle active class where we clicked ========//

      parentElm.classList.toggle("active");
      // ============= set max height ============//
      if (siblings.style.maxHeight) {
        siblings.style.maxHeight = null;
      } else {
        siblings.style.maxHeight = siblings.scrollHeight + "px";
      }
    }
  });
});

window.onload = function () {
  header[0].click();
};
