$(document).ready(function () {
    $("#dtNgjyrat").DataTable({
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
            url: "manageNgjyrat.php",
            type: "post",
            data: {
                action: "fetchAllNgjyrat",
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
    mytable = $("#dtNgjyrat").DataTable();
    $(".searchNgjyra").keyup(function () {
        mytable.search($(this).val()).draw();
    });
});

$(document).on("submit", "#insert_ngjyr", function (e) {
    e.preventDefault();
    var ngjyra = $("#ngjyra").val();
    var kat = $("#kat").val();

    if (ngjyra != "" || kat != "") {
        $.ajax({
            url: "manageNgjyrat.php",
            type: "post",
            data: {
                ngjyra: ngjyra,
                kat: kat,
                action: "addNgjyren",
            },
            success: function (data) {
                var json = JSON.parse(data);
                var status = json.status;
                if (status == "true") {
                    mytable = $("#dtNgjyrat").DataTable();
                    mytable.draw();
                    $("#addNgjyr").modal('hide');
                    $("#insert_ngjyr")[0].reset();
                    successAlert("E dhëna u shtua me sukses!");

                } else if (status == "false") {
                    $("#addNgjyr").modal('hide');
                    $("#insert_ngjyr")[0].reset();
                    dangerAlert("Gabim gjate shtimit te dhenave ne databaze!");

                }
            },
        });
    } else {
        $("#addNgjyr").modal('hide');
        warningAlert("Ju lutem plotësoni të gjitha fushat!");
    }
});

$(document).on("submit", "#update_ngjyrat", function (e) {
    e.preventDefault();
    //var tr = $(this).closest('tr');
    var uNgjyra = $("#uNgjyra").val();
    var uKat = $("#uKat").val();
    var trid = $("#trid").val();
    var updateIdNgjyr = $("#updateIdNgjyr").val();
    if (uNgjyra != "" || uKat != "") {
        $.ajax({
            url: "manageNgjyrat.php",
            type: "post",
            data: {
                uNgjyra: uNgjyra,
                updateIdNgjyr: updateIdNgjyr,
                uKat:uKat,
                action: "updateNgjyren",
            },
            success: function (data) {
                var json = JSON.parse(data);
                var status = json.status;
                if (status == "true") {
                    table = $("#dtNgjyrat").DataTable();
                    table.draw();
                    $("#editNgjyra").modal("hide");
                    $("#update_ngjyrat")[0].reset();
                    successAlert("Ndryshimet u ruajtën me sukses!");

                } else if (status == "false") {
                    $("#editNgjyra").modal("hide");
                    $("#update_ngjyrat")[0].reset();
                    dangerAlert("Gabim gjatë ruajtjes së ndryshimit në databazë!");

                }
            },
        });
    } else {
        $("#editNgjyra").modal("toggle");
        $("#update_ngjyrat")[0].reset();
        warningAlert("Ju lutem plotësoni të gjitha fushat!");
    }
});

$("#dtNgjyrat").on("click", ".editBtnKat ", function (event) {
    var trid = $(this).closest("tr").attr("id");
    var id = $(this).data("id");
    $("#editNgjyra").modal("toggle");
    $.ajax({
        url: "manageNgjyrat.php",
        data: {
            id: id,
            action: "singleNgjyrData",
        },
        type: "post",
        success: function (data) {
            var json = JSON.parse(data);
            $("#uNgjyra").val(json.ngjyra);
            $("#uKat").val(json.kategoriaID);
            $("#updateIdNgjyr").val(json.ngjyraID);
        },
    });
});

$(document).on("click", ".deleteBtn", function (event) {
    event.preventDefault();
    thisfordelete = $(this);
    var id = $(this).data("id");
    if (confirm("A jeni i sigurt që dëshironi të fshini të dhënën? ")) {
        $.ajax({
            url: "manageNgjyrat.php",
            data: {
                id: id,
                action: "deleteNgjyren",
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