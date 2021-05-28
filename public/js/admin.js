$(document).ready(function () {
    $('#labeltext').html('chooseLabelText()');
    $('#usertype').change(function () {
        $('#labeltext').html(chooseLabelText());
        //$('#pencil_item').toggle();
    });
});
      
function chooseLabelText(){
    if ($('#usertype').value === 'client') return 'Inserisci il nome utente';
    else return 'Inserisci il nome dell\'organizzazione';
}