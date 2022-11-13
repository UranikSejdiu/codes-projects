$(document).ready(function () {
  $("#dtKompani").DataTable({
    fnCreatedRow: function (nRow, aData, iDataIndex) {
      $(nRow).attr("id", aData[0]);
    },
    serverSide: "true",
    processing: "true",
    paging: true,
    pagingType: "simple_numbers",
    info: false,
    dom: "tip",
    order: [],
    language: {
      emptyTable: "Nuk ka të dhëna në databazë.",
    },
    ajax: {
      url: "manageKompani.php",
      type: "post",
      data: {
        action: "fetchalldata",
      },
    },
    columnDefs: [
      {
        target: [12],
        orderable: false,
      },
    ],
    rowCallback: function (nRow, aData, iDisplayIndex) {
      var oSettings = this.fnSettings();
      $("td:first", nRow).html(oSettings._iDisplayStart + iDisplayIndex + 1);
      return nRow;
    },
    oLanguage: {
      oPaginate: {
        sNext:
          '<span class=""></span><span><i class="fa fa-chevron-right" ></i></span>',
        sPrevious:
          '<span class=""></span><span><i class="fa fa-chevron-left" ></i></span>',
      },
    },
  });
  mytable = $("#dtKompani").DataTable();
  $(".searchKompani").keyup(function () {
    mytable.search($(this).val()).draw();
  });
});

$(document).on("submit", "#insert_kompani", function (e) {
  e.preventDefault();
  var name = $("#name").val();
  var email = $("#email").val();
  var password = $("#password").val();
  var fiskal = $("#fiskal").val();
  var phone = $("#phone").val();
  var lokacioni = $("#lokacioni").val();

  var form = document.getElementById("insert_kompani");
  var logo = $("#logo").val();
  var file_data = $("#logo").prop("file");
  var formData = new FormData(form);
  formData.append("logo", file_data);
  formData.append("action", "addKompani");

  if (
    name != "" &&
    email != "" &&
    password != "" &&
    fiskal != "" &&
    phone != "" &&
    lokacioni != "" &&
    logo != ""
  ) {
    $.ajax({
      url: "manageKompani.php",
      type: "post",
      processData: false,
      contentType: false,
      data: formData,
      success: function (data) {
        var json = JSON.parse(data);
        var status = json.status;
        if (status == "true") {
          mytable = $("#dtKompani").DataTable();
          mytable.draw();
          $("#addKompani").modal('hide');
          $("#image-holder").html("");
          successAlert("E dhena u shtua me sukses!");

        } else if (status == "false") {
          $("#addKompani").modal('hide');
          $("#insert_kompani")[0].reset();
          dangerAlert("Gabim gjate shtimit te dhenave ne databaze!");

        } else if (status == "passwordError") {
          $("#addKompani").modal('hide');
          $("#insert_kompani")[0].reset();
          warningAlert("Ju lutem plotësoni kërkesat e fjalekalimit!");

        } else if (status == "emailError") {
          $("#addKompani").modal('hide');
          $("#insert_kompani")[0].reset();
          warningAlert("Ekziston kompani me këtë email!");

        } else if (status == "logoFormat") {
          $("#addKompani").modal('hide');
          $("#insert_kompani")[0].reset();
          warningAlert("Lejohen vetëm formatet png,jpg,jpeg!");

        } else if (status == "logoMB") {
          $("#addKompani").modal('hide');
          $("#insert_kompani")[0].reset();
          warningAlert("Madhësia maksimale duhet të jetë 5MB!");

        } else if (status == "nrFError") {
          $("#addKompani").modal('hide');
          $("#insert_kompani")[0].reset();
          warningAlert("Numri fiskal duhet të ketë max 9 numra");
        }
      },
    });
  } else {
    $("#addKompani").modal('hide');
    $("#insert_kompani")[0].reset();
    warningAlert("Ju lutem plotësoni të gjitha fushat!");
  }
});

$(document).on("submit", "#update_kompani", function (e) {
  e.preventDefault();

  var updateName = $("#updateName").val();
  var updateFiskal = $("#updateFiskal").val();
  var updateLokacioni = $("#updateLokacioni").val();
  var updatePhone = $("#updatePhone").val();
  var updateEmail = $("#updateEmail").val();
  var updatePassword = $("#updatePassword").val();
  var trid = $("#trid").val();
  var updateIdKomp = $("#updateIdKomp").val();
  var form = document.getElementById("update_kompani");
  var file_data = $("#updateLogo").prop("file");
  var formData = new FormData(form);
  formData.append("#updateLogo", file_data);
  formData.append("#updateIdKomp", updateIdKomp);
  formData.append("action", "updateKompani");

  if (updateName != "" && updateFiskal != "" && updateLokacioni != "" && updatePhone != "" && updateEmail != "" && updatePassword != "") {
    $.ajax({
      url: "manageKompani.php",
      type: "post",
      processData: false,
      contentType: false,
      data: formData,
      success: function (data) {

        var json = JSON.parse(data);
        var status = json.status;

        if (status == "true") {
          table = $("#dtKompani").DataTable();
          table.draw();
          $("#updateKompani").modal('hide');
          $("#updateKompani")[0].reset();
          successAlert("Ndryshimet u ruajtën me sukses!");

        } else if (status == "false") {
          $("#updateKompani").modal('hide');
          $("#updateKompani")[0].reset();
          dangerAlert("Gabim gjatë ruajtjes së ndryshimit në databazë!");

        } else if (status == "passwordError") {
          $("#updateKompani").modal('hide');
          $("#updateKompani")[0].reset();
          warningAlert("Ju lutem plotësoni kërkesat e fjalekalimit!");

        } else if (status == "emailError") {
          $("#updateKompani").modal('hide');
          $("#updateKompani")[0].reset();
          warningAlert("Ekziston përdorues me këtë email!");
        }
      },
    });
  } else {
    $("#updateKompani").modal('hide');
          $("#updateKompani")[0].reset();
    warningAlert("Ju lutem plotësoni të gjitha fushat!");
  }
});
$("#dtKompani").on("click", ".editBtnKomp ", function (event) {
  //var table = $("#tabelaKompani").DataTable();
  var trid = $(this).closest("tr").attr("id");

  var id = $(this).data("id");
  $("#updateKompani").modal("toggle");
  $.ajax({
    url: "manageKompani.php",
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
      $("#trid").val(trid);
    },
  });
});

$(document).on("click", ".deleteBtnKomp", function (event) {
  //var table = $("#tabelaKompani").DataTable();
  event.preventDefault();
  thisfordelete = $(this);
  var id = $(this).data("id");
  if (confirm("A jeni i sigurt që dëshironi të fshini të dhënën? ")) {
    $.ajax({
      url: "manageKompani.php",
      data: {
        id: id,
        action: "deleteKompani",
      },
      type: "post",
      success: function (data) {
        var json = JSON.parse(data);
        var status = json.status;
        if (status == "success") {
          $(thisfordelete).closest("tr").remove();
          successAlert("E dhëna u fshi me sukses!");
          
        } else {
          dangerAlert("Gabim gjatë fshirjes në databazë!");
          return;
        }
      },
    });
  } else {
    return null;
  }
});