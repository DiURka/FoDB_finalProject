// modes
const themes = {
  light: {
    '--bg': '#f0f0f0',
    '--block': '#ffffff',
    '--color-text': '#010101',
    '--icon-color-light': '#deb887',
    '--icon-color-dark': '#010101'
  },
  dark: {
    '--bg': '#1a1a1a',
    '--block': '#333333',
    '--color-text': '#e5e5e5',
    '--icon-color-light': '#ffffff',
    '--icon-color-dark': '#010101'
  }
}
const closeBtns = document.querySelectorAll('.btn-close');
const rateIt = document.querySelectorAll('.rateIt');
const navbarBtn = document.querySelector('.navbar-btn');
navbarBtn.addEventListener('click', selectTheme);

// modes-change
function selectTheme(){
  if(navbarBtn.classList.contains('light')){
    navbarBtn.classList.remove('light')
    navbarBtn.classList.add('dark')
    navbarBtn.setAttribute('data-theme', 'dark')
    for (const rate of rateIt) {
      rate.setAttribute('src', 'assets/images/toppng.com-curved-arrow-pointing-down-211x323_dark-mode.png')
    }
    for(const closeBtn of closeBtns) {
    	closeBtn.classList.add("btn-close__dark-mode");
    }
  }else{
    navbarBtn.classList.remove('dark')
    navbarBtn.classList.add('light')
    navbarBtn.setAttribute('data-theme', 'light')
    for (const rate of rateIt) {
      rate.setAttribute('src', 'assets/images/toppng.com-curved-arrow-pointing-down-211x323.png')
    }
    for(const closeBtn of closeBtns) {
    	closeBtn.classList.remove("btn-close__dark-mode");
    }
  }
  const themeAttr = navbarBtn.getAttribute('data-theme')
  const myTheme = themes[themeAttr]
  let themeStr = ''
  for(const key in myTheme){
    themeStr += `${key}: ${myTheme[key]}; `
  }
  document.documentElement.style = themeStr
  
  let localTheme;
  if(localStorage.getItem('theme') == null){
    localTheme = 'light'
  }else{
    localTheme = JSON.parse(localStorage.getItem('theme'))
  }
  localTheme = themeAttr
  localStorage.setItem('theme', JSON.stringify(localTheme))
}

function outputTheme(){
  let localTheme;
  if(localStorage.getItem('theme') == null){
    localTheme = 'light'
  }else{
    localTheme = JSON.parse(localStorage.getItem('theme'))
  }
  
  const themeAttr = navbarBtn.getAttribute('data-theme')
  navbarBtn.setAttribute('data-theme', localTheme)
  navbarBtn.classList.remove(themeAttr)
  navbarBtn.classList.add(localTheme)
  
  const myTheme = themes[localTheme]
  let themeStr = ''
  for(const key in myTheme){
    themeStr += `${key}: ${myTheme[key]}; `
  }
  document.documentElement.style = themeStr
  
  if (localTheme == 'light') {
    for (const rate of rateIt) {
      rate.setAttribute('src', 'assets/images/toppng.com-curved-arrow-pointing-down-211x323.png')
    }
    for(const closeBtn of closeBtns) {
    	closeBtn.classList.remove("btn-close__dark-mode");
    }
  } else {
    for (const rate of rateIt) {
      rate.setAttribute('src', 'assets/images/toppng.com-curved-arrow-pointing-down-211x323_dark-mode.png')
    }
    for(const closeBtn of closeBtns) {
    	closeBtn.classList.add("btn-close__dark-mode");
    }
  }
} outputTheme()

// page 1
//function goToPosts() {
//  pageLinks.forEach((pageLink) => {
//   if ((pageLink.innerText == "« Previous" &&
//    pageLinks[1].classList.contains("active")) ) {
//      document.getElementById('posts').scrollIntoView();
//    }
//  })
//} goToPosts();


// login image
let loginImage = document.getElementById("signin");
const screenWidth = window.innerWidth;
if (window.location.href == 'http://uz-univers/?id=login') {
  if (screenWidth >= 480) {
    loginImage.src = 'assets/images/login.svg';
  } else {
    loginImage.src = 'assets/images/login_mob.svg';
  }
}

// display stars result on index
const ratings = document.querySelectorAll(".rating");

function ratingExecuted() {
  const starClassActive = "star fas fa-star";
  const starClassInactive = "star far fa-star";

  ratings.forEach((rating) => {
    let i = Math.round(parseFloat(rating.children[rating.children.length - 1].attributes.value.nodeValue));
    for (let k=0;k<=4;k++) {
      if (k + 1 <= i) {
        rating.children[k].className = starClassActive;
      } else {
        rating.children[k].className = starClassInactive;
      }
    }
  });
} ratingExecuted();


// review-stars
const reviews = document.getElementsByName("review-rating");
const rateValue =  document.getElementById("review-rating");

function rateReview() {
  const reviewStarClassActive = "star fas fa-star";
  const reviewStarClassInactive = "star far fa-star";

  reviews.forEach((review) => {
    let i = parseInt(rateValue.attributes.value.nodeValue);

    for (let j=0; j<=4; j++) {
      if (j + 1 <= i) {
        review.children[j].className = reviewStarClassActive;
      } else {
        review.children[j].className = reviewStarClassInactive;
      }
    }
  });
} rateReview();

// FOCUS
// function focus() {
//   const myModal = document.getElementById('modal');
//   const myInput = document.getElementById('comment');

//   myModal.addEventListener('shown.bs.modal', function () {
//     myInput.focus()
//   })
// } focus();


// password.eye
function show() {
  const x = document.querySelector('.password-field');
  const y = document.getElementById('hide1');
  const z = document.getElementById('hide2');
  if (x.type === "password") {
    x.type = "text";
    y.style.display = "block";
    z.style.display = "none";
  } else {
    x.type = "password";
    y.style.display = "none";
    z.style.display = "block";
  }
}

// JavaScript to add the 'has-content' class to input fields with content
const inputFields = document.querySelectorAll('.form-control');
                
inputFields.forEach((input) => {
  input.addEventListener('input', () => {
    if (input.value.trim() !== '') {
      input.classList.add('has-content');
    } else {
      input.classList.remove('has-content');
    }
  });
});

// const delBtns = document.querySelectorAll('.delete-button');
//   delBtns.forEach(delBtn => {
//   delBtn.addEventListener('click', function() {
//     const review = delBtn.closest(".comment");
//     if (review) {
//       console.log(review);
//       if (confirm("Are you sure you want to delete this post?")) {
//         const reviewId = delBtn.getAttribute("data-post-id");
//         console.log(reviewId);
//         // Send an AJAX request to delete the post
//         fetch("assets/pages/view.php", {
//           method: "POST"
//         })
//         .then(response => response.json())
//         .then(data => {
//             if (data.success) {
//                 // Remove the post from the UI
//                 review.remove();
//             } else {
//                 alert("Failed to delete the post.");
//             }
//         })
//         .catch(error => console.error(error));
//       }
//     }
//   })
// });

// Importing exchange-rates
document.addEventListener('DOMContentLoaded', () => {
  // Function to fetch the exchange rate using server-side proxy (PHP)
  async function getExchangeRate() {
    try {
      // Get the 'id' value from the URL query parameters
      const urlParams = new URLSearchParams(window.location.search);
      const id = urlParams.get('id');
      let url;

      const proxyUrl = 'assets/inc/proxy.php';
      const response = await fetch(proxyUrl);
      const html = await response.text();

      // Parse the HTML content to extract the exchange rates
      const parser = new DOMParser();
      const doc = parser.parseFromString(html, 'text/html');

      // Replace 'SELECTOR_FOR_EXCHANGE_RATES' with the appropriate CSS selector to target the exchange rate elements on the page
      const exchangeRateElements = doc.querySelectorAll('.exchange__item_value');
      

      // Define an array to store the exchange rates and their corresponding ids
      const exchangeRates = [];
      const currencyIds = [1, 2, 3, 4, 5, 6, 7]; // Corresponding ids for each currency, adjust as needed

      // Helper function to extract exchange rate value from HTML content
      function extractExchangeRateValue(htmlContent) {
        const regex = /= (\d+\.\d+)/; // Updated regex pattern
        const match = htmlContent.match(regex);
        return match ? parseFloat(match[1]) : null;
      }

      // Loop through the exchange rate elements and extract the rates for each currency
      exchangeRateElements.forEach((element, index) => {
        const exchangeRateText = element.textContent.trim();
        const exchangeRateValue = extractExchangeRateValue(exchangeRateText);
        const id = currencyIds[index];
        exchangeRates.push({ id, rate: exchangeRateValue });
      });
      
      // Call the function to update the exchange rates in the database
      updateExchangeRates(exchangeRates);

    } catch (error) {
      console.error('Failed to fetch exchange rate:', error);
    }
  }
  
  // Function to send the updated exchange rates to the server
  async function updateExchangeRates(exchangeRates) {
    try {
      const response = await fetch('assets/inc/updateExchangeRates.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(exchangeRates)
      });

      if (!response.ok) {
        throw new Error('No response from updateExchangeRates.php');
      }

      const data = await response.json();

    } catch (error) {
      console.error('Failed to update exchange rates:', error);
    }
  }

  // Call the function to get the exchange rate
  getExchangeRate();
});