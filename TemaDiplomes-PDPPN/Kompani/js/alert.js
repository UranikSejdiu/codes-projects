function successAlert(message) {
  $("#alerts").html(
    ' <br><br>'+
      ' <div class="error-success">'+
        ' <div class="oaerror success">'+
          ' <strong><i style="font-size:25px;" class="fa-solid fa-thumbs-up"></i></strong> &nbsp '+ message +
        ' </div>'+
      ' </div>'+
   '</div>'+
' </div>'
);
    window.scrollTo({
      top: 100,
      behavior: "smooth"
    });
    $("#alerts")
      .fadeTo(2000, 500)
      .slideUp(500, function () {
        $("#alerts").slideUp(500);
      });
  }
  
  function dangerAlert(message) {
    $("#alerts").html(
      ' <br><br>'+
        ' <div class="error-danger">'+
          ' <div class="oaerror danger">'+
            ' <strong><i style="font-size:25px;" class="fa-solid fa-circle-exclamation"></i></strong> &nbsp '+ message +
          ' </div>'+
        ' </div>'+
     '</div>'+
  ' </div>'
 );
    window.scrollTo({
      top: 100,
      behavior: "smooth",
    });
    $("#alerts")
      .fadeTo(2000, 500)
      .slideUp(500, function () {
        $("#alerts").slideUp(500);
      });
  }
  
  function warningAlert(message) {
    $("#alerts").html(
         ' <br><br>'+
		       ' <div class="error-notice">'+
             ' <div class="oaerror warning">'+
               ' <strong><i style="font-size: 25px;" class="fa-solid fa-triangle-exclamation"></i> </strong> &nbsp '+ message +
             ' </div>'+
           ' </div>'+
	      '</div>'+
     ' </div>'
    );
    window.scrollTo({
      top: 100,
      behavior: "smooth"
    });
    $("#alerts")
      .fadeTo(2000, 500)
      .slideUp(500, function () {
        $("#alerts").slideUp(500);
      });
  }