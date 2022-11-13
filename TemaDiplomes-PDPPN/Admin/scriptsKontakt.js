$(document).ready(function () {
    $("#dtKontakt").DataTable({
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
        url: "manageKontakt.php",
        type: "post",
        data: {
          action: "fetchallKondata",
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
    mytable = $("#dtKontakt").DataTable();
    $(".searchKontakt").keyup(function () {
      mytable.search($(this).val()).draw();
    });
  });

  $(document).on("submit", "#insert_kontakt", function (e) {
    e.preventDefault();
    var subjekti = $("#subjekti").val();
    var mesazhi = $("#mesazhi").val();
    var moduli = 'Admin';
  
    if (subjekti != "" && mesazhi != "") {
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
            mytable = $("#dtKontakt").DataTable();
            mytable.draw();
            $("#addKontakt").modal('hide');
            $("#insert_kontakt")[0].reset();
            successAlert("E dhëna u shtua me sukses!");
  
          } else if (status == "false") {
            $("#addKontakt").modal('hide');
            $("#insert_kontakt")[0].reset();
            dangerAlert("Gabim gjate shtimit te dhenave ne databaze!");
  
          }
        },
      });
    } else {
      $("#addKontakt").modal('hide');
      warningAlert("Ju lutem plotësoni të gjitha fushat!");
    }
  });

  $(document).on("submit", "#update_kontakt", function (e) {
    e.preventDefault();
    //var tr = $(this).closest('tr');
    var uSubjekti = $("#uSubjekti").val();
    var uMesazhi = $("#uMesazhi").val();
    var uModul = 'Admin';
    var updateIdKon = $("#updateIdKon").val();
    if (uSubjekti != "" && uMesazhi != "") {
      $.ajax({
        url: "manageKontakt.php",
        type: "post",
        data: {
          uSubjekti: uSubjekti,
          uMesazhi: uMesazhi,
          uModul: uModul,
          updateIdKon:updateIdKon,
          action: "updateKontakt",
        },
        success: function (data) {
          var json = JSON.parse(data);
          var status = json.status;
          if (status == "true") {
            table = $("#dtKontakt").DataTable();
            table.draw();
            $("#updateKontakt").modal("toggle");
            $("#update_kontakt")[0].reset();
            successAlert("Ndryshimet u ruajtën me sukses!");
  
          } else if (status == "false") {
            $("#update_kontakt")[0].reset();
            dangerAlert("Gabim gjatë ruajtjes së ndryshimit në databazë!");
  
          }
        },
      });
    } else {
      $("#updateKontakt").modal("toggle");
      $("#update_kontakt")[0].reset();
      warningAlert("Ju lutem plotësoni të gjitha fushat!");
    }
  });

  $("#dtKontakt").on("click", ".editbtnKon", function (event) {
    var table = $("#dtKontakt").DataTable();
    var trid = $(this).closest("tr").attr("id");
    var id = $(this).data("id");
    $("#updateKontakt").modal("toggle");
    $.ajax({
      url: "manageKontakt.php",
      data: {
        id: id,
        action: "singleKontaktData",
      },
      type: "post",
      success: function (data) {
        var json = JSON.parse(data);
        $("#uSubjekti").val(json.subjekti);
        $("#uMesazhi").val(json.mesazhi);
        $("#updateIdKon").val(id);
        $("#trid").val(trid);
      },
    });
  });
  
  $(document).on("click", ".deleteBtn", function (event) {
    var table = $("#dtKontakt").DataTable();
    event.preventDefault();
    thisfordelete = $(this);
    var id = $(this).data("id");
    if (confirm("A jeni i sigurt që dëshironi të fshini të dhënën? ")) {
      $.ajax({
        url: "manageKontakt.php",
        data: {
          id: id,
          action: "deleteKontakt",
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

