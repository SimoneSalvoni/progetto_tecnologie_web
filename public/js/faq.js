$.fn.extend({
    toggleText: function (a, b) {
        return this.text(this.text() === b ? a : b);
    }
});

$(document).ready(function () {
    $('.risposta').hide();
    $('.domanda').click(function () {
        $('.risposta').hide();
        $('.più').toggleText('-', '+');
        $(this).next('.risposta').slideToggle('fast');
        $(this).children('.più').toggleText('+', '-');
    });
});

