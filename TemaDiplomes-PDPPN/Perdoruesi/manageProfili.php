<?php
include('config.php');

switch ($_POST["action"]) {

    case "updatePrd":
        $emri = mysqli_real_escape_string($con,  $_POST['emri']);
        $email = mysqli_real_escape_string($con,  $_POST['email']);
        $qyteti = mysqli_real_escape_string($con,  $_POST['qyteti']);
        $adresa = mysqli_real_escape_string($con,  $_POST['adresa']);
        $zipCode = mysqli_real_escape_string($con,  $_POST['zipCode']);
        $phone = mysqli_real_escape_string($con,  $_POST['phone']);
        $updateIdPrd = mysqli_real_escape_string($con,  $_POST['updateIdPrd']);


        $query1 = "SELECT * FROM perdoruesit WHERE id=$updateIdPrd LIMIT 1";
        $sql = mysqli_query($con, $query1);
        while ($row = $sql->fetch_assoc()) {
            $emailbackup = $row['email'];
        }
        if ($email == $emailbackup) {
            $email = $emailbackup;
        } else {
            $user_check_query = "SELECT * FROM perdoruesit WHERE email='$email' LIMIT 1";
            $result = mysqli_query($con, $user_check_query);
            $user = mysqli_fetch_assoc($result);
            if ($user['email'] === $email) {
                $data = array('status' => 'emailError');
                echo json_encode($data);
                return;
            }
        }

        $sql = "UPDATE perdoruesit SET  fullName='$emri' , email= '$email', id_city='$qyteti', adress='$adresa', zipCode='$zipCode', phone='$phone' WHERE id=$updateIdPrd";
        $query = mysqli_query($con, $sql);
        if ($query == true) {

            $data = array(
                'status' => 'true',

            );

            echo json_encode($data);
        } else {
            $data = array(
                'status' => 'false',

            );

            echo json_encode($data);
        }
        break;



    case "singlePrdData":
        $id = $_POST['id'];
        $sql = "SELECT * FROM  perdoruesit WHERE id='$id' LIMIT 1";
        $query = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($query);
        echo json_encode($row);
        break;


    
}
