const timeCounter = document.getElementById('time-counter');
const months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
function getCurrentDateTime(){
    var date = new Date();
    var month = months[date.getMonth()];
    var day = date.getDate();
    var year = date.getFullYear();
    var hour = date.getHours();
    var minute = date.getMinutes();
    var second =String(date.getSeconds()).padStart(2,'0');
    var hourFormat = 'AM';
    if(hour >= 12){
        hour = hour - 12;
        hourFormat = 'PM';
    }
    timeCounter.innerText= `${month} ${day}, ${year} | ${hour}:${minute}:${second} ${hourFormat}`;
}
setInterval(getCurrentDateTime, 1000);