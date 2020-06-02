let currentDate = new Date();
let previousDay = new Date();
const style = {weekday:'long', month:'short', day:'numeric'};

displayDate();

function displayDate() {
    document.querySelector('#date').innerHTML = currentDate.toLocaleDateString("en-US", style);

}


document.querySelector('#leftArrow').addEventListener('click', getPreviousDay);
document.querySelector('#rightArrow').addEventListener('click', getFutureDay);

function getPreviousDay() {
    console.log("get previous called");
    currentDate.setDate(currentDate.getDate() - 1);
    today = currentDate;

    displayDate();
}

function getFutureDay() {
    console.log("get future called");
    currentDate.setDate(currentDate.getDate() + 1);
    today = currentDate;

    displayDate();
}