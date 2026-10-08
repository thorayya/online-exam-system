var second = 60;
var minute = 0;
var finalTime = 39;
var myTime;

var display = document.getElementById("minute");

function startTime()
{

    second--;

    if((second % 60) == 0)
    {
        minute++;
        second = 60;
        display.innerText = finalTime - minute + " : " + "00";
    }
    else
    {
        display.innerText = finalTime - minute + " : " + second;
    }

    if(second < 10)
    {
       display.innerText = finalTime - minute + " : " + "0" + second; 
    }

    if((finalTime - minute) < 10)
    {
       display.innerText = "0" + (finalTime - minute) + " : " + second; 
    }

    if((finalTime - minute) <= 0)
    {
        /*تابع فراخوانی شود که مدال بالا بیاورد و تایمر را پاک کند */
    }
    
}

myTime = setInterval(startTime,1000);


function stopTime(){
    clearInterval(myTime);
}
