$(document).ready(function () {
    $("#dtPerdorues").DataTable({
      fnCreatedRow: function (nRow, aData, iDataIndex) {
        $(nRow).attr("id", aData[0]);
      },
      serverSide: "true",
      processing: "true",
      paging: true,
      pagingType: "simple_numbers",
      info: false,
      "bSort": true,
      dom: "tip",
      order: [],
      language: {
        emptyTable: "Nuk ka të dhëna në databazë.",
      },
      ajax: {
        url: "managePerdorues.php",
        type: "post",
        data: {
          action: "fetchallprddata",
        },
      },
      columnDefs: [
        {
          target: [5],
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
            '<span class=""></span><span><i class="ti-arrow-right" ></i></span>',
          sPrevious:
            '<span class=""></span><span><i class="ti-arrow-left" ></i></span>',
        },
      },
    });
    mytable = $("#dtPerdorues").DataTable();
    $(".searchPerdorues").keyup(function () {
      mytable.search($(this).val()).draw();
    });
  });

  $(document).on("submit", "#insert_perdorues", function (e) {
    e.preventDefault();
    var name = $("#name").val();
    var city = $("#city").val();
    var adress = $("#adress").val();
    var zipCode = $("#zipCode").val();
    var phone = $("#phone").val();
    var email = $("#email").val();
    var password = $("#password").val();
  
    if (name != "" && city != "" && adress != "" && zipCode != "" && phone != "" && email != "" && password != "") {
      $.ajax({
        url: "managePerdorues.php",
        type: "post",
        data: {
          name: name,
          city: city,
          adress: adress,
          zipCode:zipCode,
          phone: phone,
          email: email,
          password: password,
          action: "addPerdorues",
        },
        success: function (data) {
          var json = JSON.parse(data);
          var status = json.status;
          if (status == "true") {
            var message = json.message;
            mytable = $("#dtPerdorues").DataTable();
            mytable.draw();
            $("#addPerdorues").modal('hide');
            $("#insert_perdorues")[0].reset();
            successAlert("E dhëna u shtua me sukses!");
  
          } else if (status == "false") {
            $("#addPerdorues").modal('hide');
            $("#insert_perdorues")[0].reset();
            dangerAlert("Gabim gjate shtimit te dhenave ne databaze!");
  
          } else if (status == "passwordError") {
            $("#addPerdorues").modal('hide');
            $("#password").val("");
            warningAlert("Ju lutem plotësoni kërkesat e fjalekalimit!");
  
          }else if (status == 'emailError') {
            $('#addPerdorues').modal('hide');
            warningAlert("Ekziston administrator me këtë email!");
          }
        },
      });
    } else {
      $("#addPerdorues").modal('hide');
      warningAlert("Ju lutem plotësoni të gjitha fushat!");
    }
  });

  $(document).on("submit", "#update_perdorues", function (e) {
    e.preventDefault();
    //var tr = $(this).closest('tr');
    var uName = $("#uName").val();
    var uCity = $("#uCity").val();
    var uAdress = $("#uAdress").val();
    var uZipCode = $("#uZipCode").val();
    var uPhone = $("#uPhone").val();
    var uEmail = $("#uEmail").val();
    var uPassword = $("#uPassword").val();
    var trid = $("#trid").val();
    var updateIdPrd = $("#updateIdPrd").val();
    if (uName != "" && uCity != "" && uAdress != "" && uZipCode!= "" && uPhone != "" && uEmail != "" && uPassword != "") {
      $.ajax({
        url: "managePerdorues.php",
        type: "post",
        data: {
          uName: uName,
          uCity: uCity,
          uAdress: uAdress,
          uZipCode:uZipCode,
          uPhone:uPhone,
          uEmail:uEmail,
          uPassword:uPassword,
          updateIdPrd: updateIdPrd,
          action: "updatePerdorues",
        },
        success: function (data) {
          var json = JSON.parse(data);
          var status = json.status;
          if (status == "true") {
            table = $("#dtPerdorues").DataTable();
            table.draw();
            $("#updatePerdorues").modal("toggle");
            $("#update_perdorues")[0].reset();
            successAlert("Ndryshimet u ruajtën me sukses!");
  
          } else if (status == "false") {
            $("#update_perdorues")[0].reset();
            dangerAlert("Gabim gjatë ruajtjes së ndryshimit në databazë!");
  
          } else if (status == "passwordError") {
            $("#updatePerdorues").modal("toggle");
            $("#update_perdorues")[0].reset();
            warningAlert("Ju lutem plotësoni kërkesat e fjalekalimit!");
  
          }else if(status == "passwordVerify"){
            $("#updatePerdorues").modal('toggle');
            $("#uPassword").val("");
            warningAlert("Ju lutem plotësoni fjalëkalimin e njejtë!");

          }else if (status == 'emailError') {
            $('#updatePerdorues').modal('toggle');
            $("#update_perdorues")[0].reset();
            warningAlert("Ekziston përdorues me këtë email!");
          }
        },
      });
    } else {
      $("#updatePerdorues").modal("toggle");
      $("#update_perdorues")[0].reset();
      warningAlert("Ju lutem plotësoni të gjitha fushat!");
    }
  });

  $("#dtPerdorues").on("click", ".editbtnprd ", function (event) {
    var table = $("#dtPerdorues").DataTable();
    var trid = $(this).closest("tr").attr("id");
    var id = $(this).data("id");
    $("#updatePerdorues").modal("toggle");
    $.ajax({
      url: "managePerdorues.php",
      data: {
        id: id,
        action: "singlePerdoruesData",
      },
      type: "post",
      success: function (data) {
        var json = JSON.parse(data);
        $("#uName").val(json.fullName);
        $("#uCity").val(json.id_city);
        $("#uAdress").val(json.adress);
        $("#uZipCode").val(json.zipCode);
        $("#uPhone").val(json.phone);
        $("#uEmail").val(json.email);
        $("#updateIdPrd").val(id);
        $("#trid").val(trid);
      },
    });
  });
  
  $(document).on("click", ".deleteBtn", function (event) {
    var table = $("#dtPerdoruesit").DataTable();
    event.preventDefault();
    thisfordelete = $(this);
    var id = $(this).data("id");
    if (confirm("A jeni i sigurt që dëshironi të fshini të dhënën? ")) {
      $.ajax({
        url: "managePerdorues.php",
        data: {
          id: id,
          action: "deletePerdorues",
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

