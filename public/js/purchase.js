$(document).ready(function () {
    $('#numBiglietti').keydown(function (e) {
        if (e.keyCode === 13) {
            e.preventDefault();
            return false;
        }
    });

    $('#numBiglietti').change(function () {
        var costo = +$('#costo').html();
        var numBiglietti = +$('#numBiglietti').val();
        var totCosto = costo * numBiglietti;
        $('#tot').html(totCosto.toString());
        $('#costototale').val(totCosto);
    });
});

