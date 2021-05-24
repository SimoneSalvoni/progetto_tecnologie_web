$('#numBiglietti').keydown(function (e) {
    if (e.keyCode === 13) {
        e.preventDefault();
        return false;
    }
});

$(document).ready(function () {
    $('#numBiglietti').change(function () {
        var costo = +$('#costo').html();
        var numBiglietti = +$('#numBiglietti').attr('value');
        var totCosto = costo * numBiglietti;
        $('#tot').html(totCosto);
        $('#costototale').attr("value", totCosto);
    });
});