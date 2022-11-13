$("#dtPorosit").DataTable({
    fnCreatedRow: function (nRow, aData, iDataIndex) {
      $(nRow).attr("ID", aData[0]);
    },
    serverSide: "true",
    processing: "true",
    paging: true,
    pagingType: "simple_numbers",
    info: false,
    dom: "tip",
    order: [],
    language: {
      emptyTable: "Nuk keni bërë asnjë porosi.",
    },
    ajax: {
      url: "manageAllPorosit.php",
      type: "post",
      data: {
        action: "fetchalldata",
      },
    },
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

  $("#dtPorosit").on("click", ".editbtnPorosi ", function (event) {
    var trid = $(this).closest("tr").attr("id");
    var id = $(this).data("id");
    $("#updateProdukt").modal("toggle");
    $.ajax({
      url: "manageAllPorosit.php",
      data: {
        id: id,
        action: "statusiData",
      },
      type: "post",
      success: function (data) {
        var json = JSON.parse(data);
        $("#status").val(json.statusi);
  
        $("#updateIdPorosi").val(id);
      },
    });
  });

  $(document).on("submit", "#update_produkt", function (e) {
    e.preventDefault();
    var status = $("#status").val();
    var id = $("#updateIdPorosi").val();
  
    if (status != "" ) {
      $.ajax({
        url: "manageAllPorosit.php",
        data: {
          id: id,
          status:status,
          action: "statusUpdate",
      },
      type: "post",
        success: function (data) {
  
          var json = JSON.parse(data);
          var status = json.status;
  
          if (status == "true") {
            table = $("#dtPorosit").DataTable();
            table.draw();
            $("#updateProdukt").modal('hide');
            $(this).find('form').trigger('reset');
            successAlert("Ndryshimet u ruajtën me sukses!");
  
          } else if (status == "false") {
            $("#updateProdukt").modal('hide');
            $(this).find('form').trigger('reset');
            dangerAlert("Gabim gjatë ruajtjes së ndryshimit në databazë!");
  
          }
        },
      });
    } else {
      $("#updateProdukt").modal('hide');
      $(this).find('form').trigger('reset');
      warningAlert("Ju lutem plotësoni të gjitha fushat!");
    }
  });