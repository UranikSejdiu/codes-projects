$(document).on("submit", "#contact-form", function (e) {
    e.preventDefault();
    var subjekti = $("#subjekti").val();
    var mesazhi = $("#mesazhi").val();
    var moduli = $("#moduli").val();
  
    if (subjekti != "" && mesazhi != "" && moduli != "") {
      $.ajax({
        url: "manageKontakt.php",
        type: "post",
        data: {
          subjekti: subjekti,
          mesazhi: mesazhi,
          moduli: moduli,
          action: "addKontakt",
        },
        success: function (data) {
          var json = JSON.parse(data);
          var status = json.status;
          if (status == "true") {
            var message = json.message;
            $("#contact-form")[0].reset();
            successAlert("Mesazhi juaj u dërgua me sukses!");
  
          } else if (status == "false") {
            $("#contact-form")[0].reset();
            dangerAlert("Gabim gjate dërgimit të mesazhit!");
  
          }
        },
      });
    } else {
      warningAlert("Ju lutem plotësoni të gjitha fushat!");
    }
  });