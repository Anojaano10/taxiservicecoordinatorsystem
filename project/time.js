let output = document.querySelector('h1');

function updateTime() {
  let today = new Date();
  
  let hours = addZero(today.getHours());
  let minutes = addZero(today.getMinutes());
  let seconds = addZero(today.getSeconds());
  
  let currentTime = `${hours}:${minutes}:${seconds}`;
  
  output.innerText = currentTime;
}

function addZero(num) {
  return num < 10 ? `0${num}` : num;
}

// Call updateTime function initially to display the current time
updateTime();

// Update the time every second
setInterval(updateTime, 1000);
