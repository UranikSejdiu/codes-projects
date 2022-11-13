$(document).ready(function () {
  //singleProduktData();
  load_rating_data();

  var rating_data = 0;
  $('#add_review').click(function () {
    $('#review-modal').modal('show');
  });

  $(document).on('mouseenter', '.submit_star', function () {
    var rating = $(this).data('rating');
    reset_background();
    for (var count = 1; count <= rating; count++) {
      $('#submit_star_' + count).addClass('text-warning');
    }
  });

  function reset_background() {
    for (var count = 1; count <= 5; count++) {
      $('#submit_star_' + count).addClass('star-light');
      $('#submit_star_' + count).removeClass('text-warning');
    }
  }

  $(document).on('mouseleave', 'submit_star', function () {
    reset_background();
  });

  $(document).on('click', '.submit_star', function () {
    rating_data = $(this).data('rating');
  });

  $('#save_review').click(function () {
    var userName = $('#userName').val();
    var userReview = $('#userReview').val();
    var prodID = $('#prodID').val();

    if (userName == '' || userReview == '') {
      $("#review-modal").modal('hide');
      $(this).find('form').trigger('reset');
      warningAlert("Ju lutem plotësoni të gjitha fushat!");
    } else {
      $.ajax({
        url: "manageProduktet.php",
        method: "POST",
        data: {
          rating_data: rating_data,
          userName: userName,
          userReview: userReview,
          prodID: prodID,
          action: "addReview"

        },
        success: function (data) {
          var json = JSON.parse(data);
          var status = json.status;
          if (status == "true") {
            $("#review-modal").modal('hide');
            $('#userName').html("");
            $('#userReview').html("");
            load_rating_data();
            successAlert("Vlerësimi u ruajt me sukses!");
          }
        }
      })
    }
  });

  function load_rating_data() {
    var prodID = $('#prodID').val();
    $.ajax({
      url: "manageProduktet.php",
      method: "POST",
      data: { action: "fetchReview", prodID: prodID },
      dataType: "JSON",
      success: function (data) {
        //$('#review_content').html(data);
        if (data.review_data.length > 0) {
          var html = '';
          for (var count = 0; count < data.review_data.length; count++) {
            html += '<div class="pro__review mb--30">';
            html += '<div class="review__thumb">';
            html += '<img width="75" height="75" src="../images/icons/user.png" alt="review images" class="img-circle">';
            html += '</div>';
            html += '<div class="review__details">';
            html += '<div class="review__info">';
            html += '<h4><a style="cursor: default;">' + data.review_data[count].perdoruesi + '</a></h4>';
            html += '<ul class="rating">';

            for (var star = 1; star <= 5; star++) {
              var class_name = '';

              if (data.review_data[count].starRating >= star) {
                class_name = 'review__info';
              } else {
                class_name = 'text-muted';
              }
              html += '<li><i class="fas fa-star ' + class_name + ' mr-1"></i></li>';
            }
            html += '</ul>';
            html += '</div>';
            html += '<div class="review__date">';
            html += '<span>' + data.review_data[count].date + '</span>';
            html += '</div>';
            html += '<p>' + data.review_data[count].reviewText + '</p>';
            html += '</div>';
            html += '</div>';
          }
          $('#review_content').html(html);
        }
      }
    })
  }
});