$(document).ready(function () {
    $("#dtMadhesit").DataTable({
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
            url: "manageMadhesit.php",
            type: "post",
            data: {
                action: "fetchAllMadhesit",
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
    mytable = $("#dtMadhesit").DataTable();
    $(".searchMadhesi").keyup(function () {
        mytable.search($(this).val()).draw();
    });
});

$(document).on("submit", "#insert_madhesi", function (e) {
    e.preventDefault();
    var madhesia = $("#madhesia").val();
    var kat = $("#kat").val();

    if (madhesia != "" || kat != "") {
        $.ajax({
            url: "manageMadhesit.php",
            type: "post",
            data: {
                madhesia: madhesia,
                kat: kat,
                action: "addMadhesi",
            },
            success: function (data) {
                var json = JSON.parse(data);
                var status = json.status;
                if (status == "true") {
                    mytable = $("#dtMadhesit").DataTable();
                    mytable.draw();
                    $("#addMadhesi").modal('hide');
                    $("#insert_madhesi")[0].reset();
                    successAlert("E dhëna u shtua me sukses!");

                } else if (status == "false") {
                    $("#addMadhesi").modal('hide');
                    $("#insert_madhesi")[0].reset();
                    dangerAlert("Gabim gjate shtimit te dhenave ne databaze!");

                }
            },
        });
    } else {
        $("#addMadhesi").modal('hide');
        warningAlert("Ju lutem plotësoni të gjitha fushat!");
    }
});

$(document).on("submit", "#update_madhesi", function (e) {
    e.preventDefault();
    //var tr = $(this).closest('tr');
    var uMadhesia = $("#uMadhesia").val();
    var uKat = $("#uKat").val();
    var trid = $("#trid").val();
    var updateIdMadh = $("#updateIdMadh").val();
    if (uMadhesia != "" || uKat != "") {
        $.ajax({
            url: "manageMadhesit.php",
            type: "post",
            data: {
                uMadhesia: uMadhesia,
                updateIdMadh: updateIdMadh,
                uKat:uKat,
                action: "updateMadhesin",
            },
            success: function (data) {
                var json = JSON.parse(data);
                var status = json.status;
                if (status == "true") {
                    table = $("#dtMadhesit").DataTable();
                    table.draw();
                    $("#editMadhesi").modal("hide");
                    $("#update_madhesi")[0].reset();
                    successAlert("Ndryshimet u ruajtën me sukses!");

                } else if (status == "false") {
                    $("#editMadhesi").modal("hide");
                    $("#update_madhesi")[0].reset();
                    dangerAlert("Gabim gjatë ruajtjes së ndryshimit në databazë!");

                }
            },
        });
    } else {
        $("#editMadhesi").modal("toggle");
        $("#update_madhesi")[0].reset();
        warningAlert("Ju lutem plotësoni të gjitha fushat!");
    }
});

$("#dtMadhesit").on("click", ".editBtnKat ", function (event) {
    var trid = $(this).closest("tr").attr("id");
    var id = $(this).data("id");
    $("#editMadhesi").modal("toggle");
    $.ajax({
        url: "manageMadhesit.php",
        data: {
            id: id,
            action: "singleMadhData",
        },
        type: "post",
        success: function (data) {
            var json = JSON.parse(data);
            $("#uMadhesia").val(json.madhesia);
            $("#uKat").val(json.kategoriaID);
            $("#updateIdMadh").val(json.madhesiaID);
        },
    });
});

$(document).on("click", ".deleteBtn", function (event) {
    event.preventDefault();
    thisfordelete = $(this);
    var id = $(this).data("id");
    if (confirm("A jeni i sigurt që dëshironi të fshini të dhënën? ")) {
        $.ajax({
            url: "manageMadhesit.php",
            data: {
                id: id,
                action: "deleteMadhesia",
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