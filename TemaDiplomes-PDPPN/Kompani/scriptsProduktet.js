$(document).ready(function () {
  $("select#kat").on('change', function () {
    var ID = $("#kat").val();
    selMadhesit(ID);
    selNgjyra(ID);
  });

  $("select#uKat").on('change', function () {
    var uID = $("#uKat").val();
    uSelMadhesit(uID);
    uSelNgjyra(uID);
    var madhesia = $('#oldMadhesia').val();
    var ngjyra = $('#oldNgjyra').val();

    $('#uMadhesia').val(madhesia);
    $('#uNgjyra').val(ngjyra);
    console.log($('#uMadhesia').val());
    console.log($('#uNgjyra').val());
  });
  $('#updateProdukt').on('shown.bs.modal', function () {
    var uID = $("#uKat").val();
    uSelMadhesit(uID);
    uSelNgjyra(uID);

  });
  $("#dtProduktet").DataTable({
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
      url: "manageProduktet.php",
      type: "post",
      data: {
        action: "fetchalldata",
      },
    },
    columnDefs: [
      {
        target: [14],
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
  mytable = $("#dtProduktet").DataTable();
  $(".searchProdukt").keyup(function () {
    mytable.search($(this).val()).draw();
  });

  $(document).on("submit", "#insert_produkt", function (e) {
    e.preventDefault();
    var name = $("#name").val();
    var kat = $("#kat").val();
    var pershkrimi = $("#pershkrimi").val();
    var qmimi = $("#qmimi").val();
    var stok = $("#stok").val();

    var ngjyra = $("#ngjyra").val();
    var madhesia = $("#madhesia").val();

    if (ngjyra == null) {
      ngjyra = 0;
    }

    if (madhesia == null) {
      madhesia = 0;
    }

    var kompania = $("#kompania").val();

    var form = document.getElementById("insert_produkt");
    var image1 = $("#image1").val();
    var image2 = $("#image2").val();
    var image3 = $("#image3").val();
    var image4 = $("#image4").val();
    var formData = new FormData(form);
    var file_data1 = $("#image1").prop("file");
    formData.append("image1", file_data1);

    var file_data2 = $("#image2").prop("file");
    formData.append("image2", file_data2);

    var file_data3 = $("#image3").prop("file");
    formData.append("image3", file_data3);

    var file_data4 = $("#image4").prop("file");
    formData.append("image4", file_data4);

    formData.append("action", "addProdukt");
    formData.append("ngjyra", ngjyra);
    formData.append("madhesia", madhesia);
    if (name != "" && kat != "" && pershkrimi != "" && qmimi != "" && stok != "" && kompania != "" && image1 != "" && image2 != "" && image3 != "" && image4 != "") {
      $.ajax({
        url: "manageProduktet.php",
        type: "post",
        processData: false,
        contentType: false,
        data: formData,
        success: function (data) {
          var json = JSON.parse(data);
          var status = json.status;
          if (status == "true") {
            mytable = $("#dtProduktet").DataTable();
            mytable.draw();
            $("#addProdukt").modal('hide');
            successAlert("E dhena u shtua me sukses!");
            $(this).find('form').trigger('reset');

          } else if (status == "false") {
            $("#addProdukt").modal('hide');
            $(this).find('form').trigger('reset');
            dangerAlert("Gabim gjate shtimit te dhenave ne databaze!");

          } else if (status == "logoFormat") {
            $("#addProdukt").modal('hide');
            $(this).find('form').trigger('reset');
            warningAlert("Lejohen vetëm formatet png,jpg,jpeg!");

          } else if (status == "logoMB") {
            $("#addProdukt").modal('hide');
            $(this).find('form').trigger('reset');
            warningAlert("Madhësia maksimale duhet të jetë 5MB!");

          }
        },
      });
    } else {
      $("#addProdukt").modal('hide');
      $(this).find('form').trigger('reset');
      warningAlert("Ju lutem plotësoni të gjitha fushat!");
    }
  });

});


$(document).on("submit", "#update_produkt", function (e) {
  e.preventDefault();
  var uName = $("#uName").val();
  var uKat = $("#uKat").val();
  var uPershkrimi = $("#uPershkrimi").val();
  var uQmimi = $("#uQmimi").val();
  var uStok = $("#uStok").val();
  var uMadhesia = $("#uMadhesia").val();
  var oldMadhesia = $("#oldMadhesia").val();
  var uNgjyra = $("#uNgjyra").val();
  var oldNgjyra = $("#oldNgjyra").val();

  var uImage1 = $("#uImage1").val();
  var uImage2 = $("#uImage2").val();
  var uImage3 = $("#uImage3").val();
  var uImage4 = $("#uImage4").val();
  if (uMadhesia == null) {
    uMadhesia = 0;
  }

  if (uNgjyra == null) {
    uNgjyra = 0;
  }
  var trid = $("#trid").val();
  var updateIdProd = $("#updateIdProd").val();
  var form = document.getElementById("update_produkt");

  
  var file_data1 = $("#uImage1").prop("file");
  var file_data2 = $("#uImage2").prop("file");
  var file_data3 = $("#uImage3").prop("file");
  var file_data4 = $("#uImage4").prop("file");
  var formData = new FormData(form);
  formData.append("uImage1", file_data1);
  formData.append("uImage2", file_data2);
  formData.append("uImage3", file_data3);
  formData.append("uImage4", file_data4);
  formData.append("uNgjyra", uNgjyra);
  formData.append("uMadhesia", uMadhesia);
  formData.append("oldNgjyra", oldNgjyra);
  formData.append("oldMadhesia", oldMadhesia);
  formData.append("#updateIdProd", updateIdProd);
  formData.append("action", "updateProdukt");

  if (uName != "" && uKat != "" && uPershkrimi != "" && uStok != "") {
    $.ajax({
      url: "manageProduktet.php",
      type: "post",
      processData: false,
      contentType: false,
      data: formData,
      success: function (data) {

        var json = JSON.parse(data);
        var status = json.status;

        if (status == "true") {
          table = $("#dtProduktet").DataTable();
          table.draw();
          $("#updateProdukt").modal('hide');
          $(this).find('form').trigger('reset');
          successAlert("Ndryshimet u ruajtën me sukses!");

        } else if (status == "false") {
          $("#updateProdukt").modal('hide');
          $(this).find('form').trigger('reset');
          dangerAlert("Gabim gjatë ruajtjes së ndryshimit në databazë!");

        } else if (status == "passwordError") {
          $("#updateProdukt").modal('hide');
          $(this).find('form').trigger('reset');
          warningAlert("Ju lutem plotësoni kërkesat e fjalekalimit!");

        } else if (status == "emailError") {
          $("#updateProdukt").modal('hide');
          $(this).find('form').trigger('reset');
          warningAlert("Ekziston përdorues me këtë email!");
        }
      },
    });
  } else {
    $("#updateProdukt").modal('hide');
    $(this).find('form').trigger('reset');
    warningAlert("Ju lutem plotësoni të gjitha fushat!");
  }
});




$("#dtProduktet").on("click", ".editbtnProd ", function (event) {
  var trid = $(this).closest("tr").attr("id");
  var id = $(this).data("id");
  $("#updateProdukt").modal("toggle");
  uSelMadhesit(id);
  uSelNgjyra(id);
  $.ajax({
    url: "manageProduktet.php",
    data: {
      id: id,
      action: "singleProduktData",
    },
    type: "post",
    success: function (data) {
      var json = JSON.parse(data);
      $("#uName").val(json.produkti);
      $("#uKat").val(json.kategoriaID);
      $("#uPershkrimi").val(json.pershkrimi);
      $("#uQmimi").val(json.qmimi);
      $("#uStok").val(json.stoku);
      $("#uMadhesia").val(json.madhesiaID);
      $("#uNgjyra").val(json.ngjyraID);
      $("#oldMadhesia").val(json.madhesiaID);
      $("#oldNgjyra").val(json.ngjyraID);
      $("#uImage1").attr("src", json.imazhi1);
      $("#uImage2").attr("src", json.imazhi2);
      $("#uImage3").attr("src", json.imazhi3);
      $("#uImage4").attr("src", json.imazhi4);

      $("#updateIdProd").val(id);
      $("#trid").val(trid);
    },
  });
});






function selMadhesit(id) {
  var id = id;
  $.ajax({
    url: "manageProduktet.php",
    data: {
      id: id,
      action: "selMadhesia",
    },
    type: "post",
    dataType: 'json',
    success: function (data) {
      var len = data.length;
      if (len === 0) {
        $('#size').hide();
      } else {
        $('#size').show();
        $("#madhesia").empty();
        $("#madhesia").append("<option  value='" + 0 + "' hidden>" + 'Zgjedh madhësinë' + "</option>");
        for (var i = 0; i < len; i++) {
          var id = data[i]['madhesiaID'];
          var name = data[i]['madhesia'];
          $("#madhesia").append("<option value='" + id + "'>" + name + "</option>");
        }
      }
    }
  });
}

function selNgjyra(id) {
  var id = id;
  $.ajax({
    url: "manageProduktet.php",
    data: {
      id: id,
      action: "selNgjyra",
    },
    type: "post",
    dataType: 'json',
    success: function (data) {
      var len = data.length;
      if (len === 0) {
        $('#color').hide();
      } else {
        $('#color').show();
        $("#ngjyra").empty();
        $("#ngjyra").append("<option value='" + 0 + "' hidden>" + 'Zgjedh ngjyrën' + "</option>");
        for (var i = 0; i < len; i++) {
          var id = data[i]['ngjyraID'];
          var name = data[i]['ngjyra'];
          $("#ngjyra").append("<option value='" + id + "'>" + name + "</option>");
        }
      }
    }
  });
}


function uSelMadhesit(id) {
  var id = id;
  $.ajax({
    url: "manageProduktet.php",
    data: {
      id: id,
      action: "uSelMadhesia",
    },
    type: "post",
    dataType: 'json',
    success: function (data) {
      var len = data.length;
      if (len === 0) {
        $('#uSize').hide();
      } else {
        $('#uSize').show();
        $("#uMadhesia").empty();
        $("#uMadhesia").append("<option  value='" + 0 + "' hidden>" + 'Zgjedh madhësinë' + "</option>");
        for (var i = 0; i < len; i++) {
          var id = data[i]['uMadhesiaID'];
          var name = data[i]['uMadhesia'];
          $("#uMadhesia").append("<option value='" + id + "'>" + name + "</option>");
        }
      }
    }
  });
}

function uSelNgjyra(id) {
  var id = id;
  $.ajax({
    url: "manageProduktet.php",
    data: {
      id: id,
      action: "uSelNgjyra",
    },
    type: "post",
    dataType: 'json',
    success: function (data) {
      var len = data.length;
      if (len === 0) {
        $('#uColor').hide();
      } else {
        $('#uColor').show();
        $("#uNgjyra").empty();
        $("#uNgjyra").append("<option value='" + 0 + "' hidden>" + 'Zgjedh ngjyrën' + "</option>");
        for (var i = 0; i < len; i++) {
          var id = data[i]['uNgjyraID'];
          var name = data[i]['uNgjyra'];
          $("#uNgjyra").append("<option value='" + id + "'>" + name + "</option>");
        }
      }
    }
  });
}

$(document).on("click", ".deleteBtn", function (event) {
  //var table = $("#tabelaKompani").DataTable();
  event.preventDefault();
  thisfordelete = $(this);
  var id = $(this).data("id");
  if (confirm("A jeni i sigurt që dëshironi të fshini produktin? ")) {
    $.ajax({
      url: "manageProduktet.php",
      data: {
        id: id,
        action: "deleteProdukt",
      },
      type: "post",
      success: function (data) {
        var json = JSON.parse(data);
        var status = json.status;
        if (status == "success") {
          $(thisfordelete).closest("tr").remove();
          successAlert("Produkti u fshi me sukses!");
          
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