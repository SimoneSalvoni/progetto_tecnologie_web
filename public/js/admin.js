$(document).ready(function () {


    $('#labeltext').html(chooseLabelText());
    $('#usertype').change(function () {
        $('#labeltext').html(chooseLabelText());
    });

    $("img[name='pencil']").click(function () {
        $(this).toggle();
        $(this).closest("form").find('#cross').toggle();
        $(this).closest("form").find('#salva').toggle();
        $(this).closest("form").find('#annulla').toggle();
        $(this).closest("form").find('#pencil_text').toggle();
        $(this).closest("form").find('#cross_text').toggle();
        $(this).closest("form").find('#domanda').prop('disabled', false);
        $(this).closest("form").find('#risposta').prop('disabled', false);
    });

    $("input[id='annulla']").click(function () {
        $(this).closest("form").find('#pencil').toggle();
        $(this).closest("form").find('#cross').toggle();
        $(this).closest("form").find('#salva').toggle();
        $(this).toggle();
        $(this).closest("form").find('#domanda').prop('disabled', true);
        $(this).closest("form").find('#risposta').prop('disabled', true);
        $(this).closest("form").find('#pencil_text').toggle();
        $(this).closest("form").find('#cross_text').toggle();
    });
  
    $(".plus_item").click(function(){
        $(this).toggle();
        $('#salvanuova').toggle();
        $('#annullanuova').toggle();
        $('#nuovadomanda').toggle();
        $('#nuovarisposta').toggle();
    });
    
    $('#annullanuova').click(function(){
        $(this).toggle();
        $('#salvanuova').toggle();
        $('#nuovadomanda').toggle();
        $('#nuovarisposta').toggle();
        $(".plus_item").toggle();
    });
});

function chooseLabelText() {
    if ($('#usertype').val() === 'client')
        return 'Inserisci il nome utente';
    else
        return 'Inserisci il nome dell\'organizzazione';
}