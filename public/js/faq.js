$.fn.extend({
    toggleText: function (a, b) {
        return this.text(this.text() === b ? a : b);
    }
});

$(document).ready(function () {
    $('.risposta').hide();
    $('.domanda').click(function () {
        $('.risposta').hide(200);
        if(!$(this).closest('.domanda').hasClass("open")){
            $('.domanda').removeClass("open");
            $('.più').toggleText('-', '+');
            $(this).next('.risposta').slideToggle('fast');
            $(this).children('.più').toggleText('+', '-');
            $(this).closest('.domanda').addClass("open");
        }
        else{
            $('.domanda').removeClass("open");
            $('.più').toggleText('-', '+');
        }
    });
});

