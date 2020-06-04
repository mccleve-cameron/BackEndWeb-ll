let currentDate = new Date();
let previousDay = new Date();
const style = {weekday:'long', month:'short', day:'numeric'};

displayDate();

function displayDate() {
    document.querySelector('#date').innerHTML = currentDate.toLocaleDateString("en-US", style);

}
