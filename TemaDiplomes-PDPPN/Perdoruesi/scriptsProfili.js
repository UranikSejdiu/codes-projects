$(document).ready(function () {
    singlePerdoruesData();
});

function singlePerdoruesData() {
    var id = $('#updateIdPrd').val();
    $.ajax({
        url: "manageProfili.php",
        data: {
            id: id,
            action: "singlePrdData",
        },
        type: "post",
        success: function (data) {
            var json = JSON.parse(data);
            $('#emri').val(json.fullName);
            $('#email').val(json.email);
            $('#qyteti').val(json.id_city);
            $('#adresa').val(json.adress);
            $('#zipCode').val(json.zipCode);
            $('#phone').val(json.phone);
        },
    });
}

$(document).on("submit", "#updateProfili", function (e) {
    e.preventDefault();

    var emri = $("#emri").val();
    var email = $("#email").val();
    var qyteti = $("#qyteti").val();
    var adresa = $("#adresa").val();
    var zipCode = $("#zipCode").val();
    var phone = $("#phone").val();
    var updateIdPrd = $("#updateIdPrd").val();

    if (emri != "" && email != "" && qyteti != "" && adresa != "" && zipCode != "" && phone != "" && updateIdPrd != "") {
        $.ajax({
            url: "manageProfili.php",
            type: "post",
            data: {
                emri: emri,
                email: email,
                qyteti: qyteti,
                adresa: adresa,
                zipCode: zipCode,
                phone: phone,
                updateIdPrd: updateIdPrd,
                action: "updatePrd"
            },
            success: function (data) {
                var json = JSON.parse(data);
                var status = json.status;

                if (status == "true") {
                    successAlert("Ndryshimet u ruajtën me sukses!");
                    singlePerdoruesData();

                } else if (status == "false") {
                    dangerAlert("Gabim gjatë ruajtjes së ndryshimit në databazë!");
                    singlePerdoruesData();

                } else if (status == "emailError") {
                    warningAlert("Ekziston përdorues me këtë email!");
                    singlePerdoruesData();

                }

            },
        });
    } else {
        warningAlert("Ju lutem plotësoni të gjitha fushat!");
        singlePerdoruesData();
    }
});
