// pagination
const pageLinks = document.querySelectorAll(".page-link");

// disable pag.
function disablePag() {
  const currentPage = document.querySelector(".page-link.active");
  const prevBtn = pageLinks[0];
  const nextBtn = pageLinks[pageLinks.length - 1];

  if (currentPage.innerText == "1") {
    prevBtn.classList.add("disabled");
  } else {
    prevBtn.classList.remove("disabled");
  }

  if (currentPage.innerText == pageLinks.length - 2) {
    nextBtn.classList.add("disabled");
  } else {
    nextBtn.classList.remove("disabled");
  }
} disablePag();