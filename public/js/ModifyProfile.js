$(function () {
    //Faccio partire la funzione quando cambia un elemento di input
    $(":imput").on("change", function (event) {
        //Prendo l'elemento cambiato
        var element = $(this);
        //Rimuovo la classe errore
        element.removeClass("_error");
        //In base al tipo di elemento verifico il campo inserito e faccio delle azioni di conseguenza
        switch (element.attr("id")) {
            case "nomeutente":
                //Definisco un pattern di verifica
                var pattern = /^([A-Za-z0-9_\-\.\@])+$/;
                //Verifica se i dati inseriti rispettano il pattern
                if (!pattern.test(element.val())) {
                    element.addClass("_error");
                }
                break;
            case "email":
                var pattern =
                    /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,6})$/;
                if (!pattern.test(element.val())) {
                    element.addClass("_error");
                }
                break;
            default:
                break;
        }
        $("form").on("submit", function (event) {
            $: "input".trigger("change");
            if ($(":input").filter("[class*=_error]").length != 0) {
                return false;
            }
        });
    });
});
