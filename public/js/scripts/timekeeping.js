$(document).ready(function (){
    const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
        "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
    ];

    setInterval(function() {
    const dt = new Date();
    let hours = dt.getHours();
    let minutes = dt.getMinutes();
    let seconds = dt.getUTCSeconds();
    let ampm = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12;
    hours = hours ? hours : 12
    minutes = minutes < 10 ? '0'+minutes : minutes;
    var strTime = ('0' + hours).slice(-2) + ':' +
    ('0' + minutes).slice(-2) + ':' + ( '0' +seconds).slice(-2) + ' ' + ampm;

    $('.timeDiv').text(strTime);
    $('.dateDiv').text(monthNames[dt.getMonth()] + " " + ('0' + dt.getDate()).slice(-2));
    }, 1000);

    $('.modal').modal('show');
});