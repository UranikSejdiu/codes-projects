<?php
include('checkSession.php');

switch ($_POST["action"]) {

    case "fetchReview":
        $sql = "SELECT produktreview.starRating, produktet.kompaniaID, produktreview.perdoruesi, produktreview.reviewText, produktet.produkti ,produktreview.produktID, produktreview.date FROM produktreview 
        LEFT JOIN produktet ON produktet.produktID = produktreview.produktID WHERE produktet.kompaniaID = $id";
       $result = $con->query($sql);
        $review_content = array();

        foreach ($result as $row) {
            $review_content[] = array(
                'perdoruesi' => $row['perdoruesi'],
                'starRating' => $row['starRating'],
                'reviewText' => $row['reviewText'],
                'produkti' => $row['produkti'],
                'produktID' => $row['produktID'],
                'date' => $row['date']
            );
        }

        $output = array(
            'review_data' => $review_content
        );

        echo json_encode($output);
        break;
}
