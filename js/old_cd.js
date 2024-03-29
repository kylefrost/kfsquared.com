function getCountdown(target) {
    var m = moment().countdown(target, countdown.YEARS|countdown.MONTHS|countdown.WEEKS|countdown.DAYS|countdown.HOURS|countdown.MINUTES|countdown.SECONDS, NaN);
    var t = {
        'years'   :  m.years,
        'months'  :  m.months,
        'weeks'   :  m.weeks,
        'days'    :  m.days,
        'hours'   :  m.hours,
        'minutes' :  m.minutes,
        'seconds' :  m.seconds
    };
    return t;
}

var end = "2017-10-14 17:30:00";

function updateCountdown() {
    // Get current countdown
    var countdown = getCountdown(end);

    // Get countdown elements
    // var years = document.getElementsByTagName("years")[0];
    var months = document.getElementsByTagName("months")[0];
    var weeks = document.getElementsByTagName("weeks")[0];
    var days = document.getElementsByTagName("days")[0];
    var hours = document.getElementsByTagName("hours")[0];
    var minutes = document.getElementsByTagName("minutes")[0];
    var seconds = document.getElementsByTagName("seconds")[0];

    // Get countdown labels
    // var yearLabel = document.getElementById("yearLabel");
    var monthLabel = document.getElementById("monthLabel");
    var weekLabel = document.getElementById("weekLabel");
    var dayLabel = document.getElementById("dayLabel");
    var hourLabel = document.getElementById("hourLabel");
    var minuteLabel = document.getElementById("minuteLabel");
    var secondLabel = document.getElementById("secondLabel");

    // Set countdown times
    // years.innerHTML = countdown.years;
    months.innerHTML = countdown.months;
    weeks.innerHTML = countdown.weeks;
    days.innerHTML = countdown.days;
    hours.innerHTML = countdown.hours;
    minutes.innerHTML = countdown.minutes;
    seconds.innerHTML = countdown.seconds;

    // Set countdown labels
    // yearLabel.innerHTML = (countdown.years == 1) ? "YEAR" : "YEARS";
    monthLabel.innerHTML = (countdown.months == 1) ? "MONTH" : "MONTHS";
    weekLabel.innerHTML = (countdown.weeks == 1) ? "WEEK" : "WEEKS";
    dayLabel.innerHTML = (countdown.days == 1) ? "DAY" : "DAYS";
    hourLabel.innerHTML = (countdown.hours == 1) ? "HOUR" : "HOURS";
    minuteLabel.innerHTML = (countdown.minutes == 1) ? "MINUTE" : "MINUTES";
    secondLabel.innerHTML = (countdown.seconds == 1) ? "SECOND" : "SECONDS";
};

updateCountdown();

setInterval(updateCountdown, 1000);
