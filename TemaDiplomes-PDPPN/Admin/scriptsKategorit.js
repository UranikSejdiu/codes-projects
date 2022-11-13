$(document).ready(function () {
    $("#dtKategoria").DataTable({
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
        url: "manageKategorit.php",
        type: "post",
        data: {
          action: "fetchAllKategori",
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
    mytable = $("#dtKategoria").DataTable();
    $(".searchKategori").keyup(function () {
      mytable.search($(this).val()).draw();
    });
  });

  $(document).on("submit", "#insert_kategori", function (e) {
    e.preventDefault();
    var name = $("#name").val();
  
    if (name != "") {
      $.ajax({
        url: "manageKategorit.php",
        type: "post",
        data: {
          name: name,
          action: "addKategori",
        },
        success: function (data) {
          var json = JSON.parse(data);
          var status = json.status;
          if (status == "true") {
            mytable = $("#dtKategoria").DataTable();
            mytable.draw();
            $("#addKategori").modal('hide');
            $("#insert_kategori")[0].reset();
            successAlert("E dhëna u shtua me sukses!");
  
          } else if (status == "false") {
            $("#addKategori").modal('hide');
            $("#insert_kategori")[0].reset();
            dangerAlert("Gabim gjate shtimit te dhenave ne databaze!");
  
          }
        },
      });
    } else {
      $("#addKategori").modal('hide');
      warningAlert("Ju lutem plotësoni të gjitha fushat!");
    }
  });

  $(document).on("submit", "#update_kategori", function (e) {
    e.preventDefault();
    //var tr = $(this).closest('tr');
    var updateName = $("#updateName").val();
    var trid = $("#trid").val();
    var updateIdKat = $("#updateIdKat").val();
    if (updateName != "") {
      $.ajax({
        url: "manageKategorit.php",
        type: "post",
        data: {
          updateName: updateName,
          updateIdKat:updateIdKat,
          action: "updateKategorit",
        },
        success: function (data) {
          var json = JSON.parse(data);
          var status = json.status;
          if (status == "true") {
            table = $("#dtKategoria").DataTable();
            table.draw();
            $("#editKategori").modal("hide");
            $("#update_kategori")[0].reset();
            successAlert("Ndryshimet u ruajtën me sukses!");
  
          } else if (status == "false") {
            $("#update_kategori")[0].reset();
            dangerAlert("Gabim gjatë ruajtjes së ndryshimit në databazë!");
  
          }
        },
      });
    } else {
      $("#editKategori").modal("toggle");
      $("#update_kategori")[0].reset();
      warningAlert("Ju lutem plotësoni të gjitha fushat!");
    }
  });

  $("#dtKategoria").on("click", ".editBtnKat ", function (event) {
    var table = $("#dtKategoria").DataTable();
    var trid = $(this).closest("tr").attr("id");
    var id = $(this).data("id");
    $("#editKategori").modal("toggle");
    $.ajax({
      url: "manageKategorit.php",
      data: {
        id: id,
        action: "singleKatData",
      },
      type: "post",
      success: function (data) {
        var json = JSON.parse(data);
        $("#updateName").val(json.kategoria);
        $("#updateIdKat").val(json.kategoriaID);
      },
    });
  });
  
  $(document).on("click", ".deleteBtn", function (event) {
    var table = $("#dtKategoria").DataTable();
    event.preventDefault();
    thisfordelete = $(this);
    var id = $(this).data("id");
    if (confirm("A jeni i sigurt që dëshironi të fshini të dhënën? ")) {
      $.ajax({
        url: "manageKategorit.php",
        data: {
          id: id,
          action: "deleteKategoria",
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