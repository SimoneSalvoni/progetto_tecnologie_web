function getErrorHtml(elemErrors) {
    if (typeof elemErrors === "undefined" || elemErrors.length < 1) return;
    var out = '<ul class="errors">';
    for (var i = 0; i < elemErrors.length; i++) {
        out += "<li>" + elemErrors[i] + "</li>";
    }
    out += "</ul>";
    return out;
}

function doElemValidation(id, actionUrl, formId) {
    var formElems;

    function addFormToken() {
        //Si estrae il token dalla form
        var tokenVal = $("#" + formId + " input[name=_token]").val();
        //SI aggiunge il token all'oggetto FormData
        formElems.append("_token", tokenVal);
    }

    function sendAjaxReq() {
        $.ajax({
            type: "POST",
            url: actionUrl,
            data: formElems,
            dataType: "json",
            //error in una richiesta ajax è il campo che indica la funzione di call back da attivare quando dal server arriva
            //un messaggio di errore
            error: function (data) {
                if (data.status === 422) {
                    var errMsgs = JSON.parse(data.responseText);
                    //Il server valida tutti i campi della form non solo quelli soggetti alla nostra validazione allore bisogna
                    //prendere solo gli errori che arrivano dal server relativi ai campi che stiamo analizzando e tralasciare gli altri
                    //La prima riga sotto ha lo scopo di togliere eventuali messaggi d'errore dall'elemento che abbiamo appena validato
                    $("#" + id)
                        .parent()
                        .find(".errors")
                        .html(" ");
                    $("#" + id).after(getErrorHtml(errMsgs[id]));
                }
            },
            //IL content type è gia definito da noi
            contentType: false,
            //Con questo parametro indichiamo che ajax non deve formattare in modo diverso dal nostro la struttura del messaggio
            //L'imput è formattato con formData
            processData: false,
        });
    }

    var elem = $("#" + formId + " :input[name=" + id + "]");
    if (elem.attr("type") === "file") {
        // elemento di input type=file valorizzato
        if (elem.val() !== "") {
            inputVal = elem.get(0).files[0];
        } else {
            inputVal = new File([""], "");
        }
    } else {
        // elemento di input type != file
        inputVal = elem.val();
    }
    //Crea un elemento di tipo formData che si usa quando nella form è presente un file
    formElems = new FormData();
    //L'elemento sopra modificato viene aggiunto all'oggetto formData
    formElems.append(id, inputVal);
    //Si aggiunge alla form il token csrf
    addFormToken();
    //Interazione ajax per inviare l'elemento al server
    sendAjaxReq();
}

function doFormValidation(actionUrl, formId) {
    var form = new FormData(document.getElementById(formId));
    $.ajax({
        type: "POST",
        url: actionUrl,
        data: form,
        dataType: "json",
        error: function (data) {
            if (data.status === 422) {
                var errMsgs = JSON.parse(data.responseText);
                $.each(errMsgs, function (id) {
                    $("#" + id)
                        .parent()
                        .find(".errors")
                        .html(" ");
                    $("#" + id).after(getErrorHtml(errMsgs[id]));
                });
            }
        },
        //success indica cosa fare nel caso la validazione lato server dia un esito positivo
        success: function (data) {
            window.location.replace(data.redirect); // serve per dire al browser di ricaricare un'altra pagina
        },
        contentType: false,
        processData: false,
    });
}
