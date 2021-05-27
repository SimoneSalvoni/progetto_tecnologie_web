$(document).ready(function () {
    var biglietti = parseInt(($('#biglietti').text()));
    if(biglietti<=0) 
        $('#buy').attr("disabled", true);
});