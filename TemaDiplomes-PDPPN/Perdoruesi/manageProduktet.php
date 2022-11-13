<?php
include('config.php');

switch ($_POST["action"]) {

    case "singleProduktData":
        $ID = $_POST['id'];
        $sql = "SELECT * FROM produktet WHERE produktID=$ID LIMIT 1";
        $query = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($query);
        echo json_encode($row);
        break;

    case "addReview":
        if (isset($_POST["rating_data"])) {
            $userName = $_POST['userName'];
            $user_ratig = $_POST['rating_data'];
            $user_review = $_POST['userReview'];
            $prodID  = $_POST['prodID'];


            $sql = "INSERT INTO produktreview (perdoruesi,starRating,reviewText,produktID) VALUES ('$userName','$user_ratig', '$user_review', '$prodID')";

            $query = mysqli_query($con, $sql);
            if ($query == true) {

                $data = array(
                    'status' => 'true'
                );
                echo json_encode($data);
            } else {
                $data = array(
                    'status' => 'false'
                );
                echo json_encode($data);
            }
        } else {
            $data = array(
                'status' => 'false'
            );
            echo json_encode($data);
        }
        break;

    case "fetchReview":
        if (isset($_POST['action'])) {

            $prodID = $_POST['prodID'];
            $review_content = array();

            $sql = "SELECT * FROM produktreview WHERE produktID=$prodID ORDER BY reviewID DESC";
            $result = $con->query($sql);

            foreach ($result as $row) {
                $review_content[] = array(
                    'perdoruesi' => $row['perdoruesi'],
                    'starRating' => $row['starRating'],
                    'reviewText' => $row['reviewText'],
                    'date' => $row['date']
                );
            }

            $output = array(
                'review_data' => $review_content
            );

            echo json_encode($output);

            break;
        }
}
