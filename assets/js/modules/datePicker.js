const airDatepickerInput = document.getElementById('airdatepicker');

// Function to determine if the screen width is less than or equal to 576px
function isMobileScreen() {
    return window.innerWidth <= 576;
}


function checkInput() {
  if (airDatepickerInput.value.trim() !== '') {
    airDatepickerInput.classList.add('has-content');
  } else {
    airDatepickerInput.classList.remove('has-content');
  }
}

// Check the input initially and then at a specified interval
checkInput();
setInterval(checkInput, 1000); // Adjust the interval as needed

// Initialize AirDatepicker with dynamic properties
function initializeAirDatepicker() {
  const isMobile = isMobileScreen();
  const autoClose = isMobile;

  const airDatepickerInstance = new AirDatepicker('#airdatepicker', {
    onSelect: function (formattedDate, date, inst) {
        if (formattedDate) {
          airDatepickerInput.classList.add('has-content');
        } else {
          airDatepickerInput.classList.remove('has-content');
        }
    },
    isMobile: isMobile,
    autoClose: autoClose,
    buttons: ['today', 'clear'],
    locale: {
      days: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
      daysShort: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
      daysMin: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
      months: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
      monthsShort: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
      today: 'Today',
      clear: 'Clear',
      dateFormat: 'MM/dd/yyyy',
      timeFormat: 'hh:mm aa',
      firstDay: 0
    }
  });
}

// Initialize AirDatepicker on page load
initializeAirDatepicker();

// Update AirDatepicker when the window is resized
window.addEventListener('resize', initializeAirDatepicker);