$(document).on("submit", "#porosit", function (e) {
    e.preventDefault();

    var emri = $("#emri").val();
    var email = $("#email").val();
    var prodID = $("#prodID").val();
    var prdID = $("#prdID").val();
    var sasia = $("#sasia").val();
    var total = $("#total").val();
    var qyteti = $("#qyteti").val();
    var adresa = $("#adresa").val();
    var zipCode = $("#zipCode").val();
    var phone = $("#phone").val();
    var pagesa = $("#pagesa").val();
    var mesazhi = $("#mesazhi").val();

    if (emri != "" && email != "" && qyteti != "" && adresa != "" && zipCode != "" && phone != "" && prodID != "" && prdID != "" && sasia != "" && total != "" && pagesa != "") {
        $.ajax({
            url: "managePorosit.php",
            type: "post",
            data: {
                emri: emri,
                email: email,
                qyteti: qyteti,
                adresa: adresa,
                zipCode: zipCode,
                phone: phone,
                prodID: prodID,
                prdID: prdID,
                sasia: sasia,
                total: total,
                pagesa: pagesa,
                mesazhi: mesazhi,
                action: "bejPorosi"
            },
            success: function (data) {
                var json = JSON.parse(data);
                var status = json.status;

                if (status == "true") {
                    $("#loading").show();
                    window.setTimeout(function () {

                        window.location.href = 'porosit.php';
                    }, 3000);


                } else if (status == "false") {
                    dangerAlert("Gabim gjatë ruajtjes së ndryshimit në databazë!");

                }

            },
        });
    } else {
        warningAlert("Ju lutem plotësoni të gjitha fushat!");

    }
});