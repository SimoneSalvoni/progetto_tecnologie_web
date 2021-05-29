$(document).ready(function () {
    $('#labeltext').html(chooseLabelText());
    $('#usertype').change(function () {
        $('#labeltext').html(chooseLabelText());
    });
});
      
function chooseLabelText(){
    if ($('#usertype').val() === 'client') return 'Inserisci il nome utente';
    else return 'Inserisci il nome dell\'organizzazione';
}