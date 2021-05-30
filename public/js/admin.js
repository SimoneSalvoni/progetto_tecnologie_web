$(document).ready(function () {


    $('#labeltext').html(chooseLabelText());
    $('#usertype').change(function () {
        $('#labeltext').html(chooseLabelText());
    });

    $("img[name='pencil']").click(function () {
        $(this).toggle();
        $(this).closest("form[id^='form']").find('#cross').toggle();
        $(this).closest("form[id^='form']").find('#salva').toggle();
        $(this).closest("form[id^='form']").find('#annulla').toggle();
        $(this).closest("form[id^='form']").find('#pencil_text').toggle();
        $(this).closest("form[id^='form']").find('#cross_text').toggle();
        $(this).closest("form[id^='form']").find('#domanda').prop('disabled', false);
        $(this).closest("form[id^='form']").find('#risposta').prop('disabled', false);
    });

    $(":button").click(function () {
        $(this).closest("form[id^='form']").find('#pencil').toggle();
        $(this).closest("form[id^='form']").find('#cross').toggle();
        $(this).closest("form[id^='form']").find('#salva').toggle();
        $(this).toggle();
        $(this).closest("form[id^='form']").find('#domanda').prop('disabled', true);
        $(this).closest("form[id^='form']").find('#risposta').prop('disabled', true);
        $(this).closest("form[id^='form']").reset();
    });
});

function chooseLabelText() {
    if ($('#usertype').val() === 'client')
        return 'Inserisci il nome utente';
    else
        return 'Inserisci il nome dell\'organizzazione';
}