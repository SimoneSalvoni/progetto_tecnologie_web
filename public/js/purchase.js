$(document).ready(function () {
    
    $('#tot').html($('#costo').html());
    $('#costototale').val(+$('#costo').html());
    
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
    
    $("#img1").click(function () {
        $(this).css('border', 'solid 4px orange');
        $("#img2").css('border', '');
        $("#img3").css('border', '');
        $('#pay1').prop('checked', true);
    });
    $("#img2").click(function () {
        $(this).css('border', 'solid 4px orange');
        $("#img1").css('border', '');
        $("#img3").css('border', '');
        $('#pay2').prop('checked', true);
    });
    $("#img3").click(function () {
        $(this).css('border', 'solid 4px orange');
        $("#img1").css('border', '');
        $("#img2").css('border', '');
        $('#pay3').prop('checked', true);
    });
});


