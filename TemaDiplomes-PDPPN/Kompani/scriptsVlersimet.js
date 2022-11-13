$(document).ready(function () {
    //singleProduktData();
    load_rating_data();
    detailProdukt();

    function load_rating_data() {
        var prodID = $('#prodID').val();
        $.ajax({
            url: "manageVlersimet.php",
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
                        html += '<h4 style="padding-right:30px;"> - Produkti: <a href="produkti.php?produktID='+data.review_data[count].produktID+'">' + data.review_data[count].produkti + '</a></h4>';
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



    function detailProdukt() {
        var prodID = $('#prodID').val();
        $.ajax({
            url: "manageVlersimet.php",
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
                        html += '<h4 style="padding-right:30px;"><a style="cursor: default;">' + data.review_data[count].perdoruesi + '</a></h4>';
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
                    $('#reviews').html(html);
                }
            }
        })
    }
});