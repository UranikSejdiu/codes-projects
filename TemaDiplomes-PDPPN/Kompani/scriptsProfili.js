$(document).ready(function () {
    singleKompaniData();
});

function singleKompaniData() {
    var id = $('#updateIdKomp').val();
    $.ajax({
        url: "manageProfili.php",
        data: {
            id: id,
            action: "singleKompaniData",
        },
        type: "post",
        success: function (data) {
            var json = JSON.parse(data);
            $("#updateLogo").attr("src", json.logo);
            $("#logoUp").attr("src", json.logo);
            $("#updateName").val(json.name);
            $("#updateFiskal").val(json.nrfiskal);
            $("#updateLokacioni").val(json.lokacioni);
            $("#updatePhone").val(json.telefoni);
            $("#updateEmail").val(json.email);
            $("#updateIdKomp").val(id);
        },
    });
  }

$(document).on("submit", "#updateProfili", function (e) {
    e.preventDefault();

    var updateName = $("#updateName").val();
    var updateFiskal = $("#updateFiskal").val();
    var updateLokacioni = $("#updateLokacioni").val();
    var updatePhone = $("#updatePhone").val();
    var updateEmail = $("#updateEmail").val();
    var updateIdKomp = $("#updateIdKomp").val();
    var form = document.getElementById("updateProfili");
    var file_data = $("#updateLogo").prop("file");
    var formData = new FormData(form);
    formData.append("#updateLogo", file_data);
    formData.append("#updateIdKomp", updateIdKomp);
    formData.append("action", "updateKompani");

    if (updateName != "" && updateFiskal != "" && updateLokacioni != "" && updatePhone != "" && updateEmail != "") {
        $.ajax({
            url: "manageProfili.php",
            type: "post",
            processData: false,
            contentType: false,
            data: formData,
            success: function (data) {

                var json = JSON.parse(data);
                var status = json.status;

                if (status == "true") {
                    successAlert("Ndryshimet u ruajtën me sukses!");
                    singleKompaniData();
                } else if (status == "false") {
                    dangerAlert("Gabim gjatë ruajtjes së ndryshimit në databazë!");
                    singleKompaniData();

                } else if (status == "emailError") {
                    warningAlert("Ekziston përdorues me këtë email!");
                    singleKompaniData();

                } else if (status == "logoFormat") {
                    warningAlert("Ju lutem zgjedhni një imazh me format të lejuar!");
                    singleKompaniData();

                } else if (status == "logoMB") {
                    warningAlert("Imazhi kalon hapsirën e lejuar për ngarkim!");
                    singleKompaniData();
                }
            },
        });
    } else {
        warningAlert("Ju lutem plotësoni të gjitha fushat!");
        singleKompaniData();
    }
});


