<?php
include('config.php');

switch ($_POST["action"]) {

    case "updateKompani":
        $updateName = mysqli_real_escape_string($con,  $_POST['updateName']);
        $updateFiskal = mysqli_real_escape_string($con,  $_POST['updateFiskal']);
        $updateLokacioni = mysqli_real_escape_string($con,  $_POST['updateLokacioni']);
        $updatePhone = mysqli_real_escape_string($con,  $_POST['updatePhone']);
        $updateEmail = mysqli_real_escape_string($con,  $_POST['updateEmail']);
        $updateIdKomp = mysqli_real_escape_string($con,  $_POST['updateIdKomp']);

        if (isset($_FILES['updateLogo'])) {
            $file_name = $_FILES['updateLogo']['name'];
            $uniquename = time() . '-' . uniqid();
            $file_size = $_FILES['updateLogo']['size'];
            $file_tmp = $_FILES['updateLogo']['tmp_name'];
            $file_type = $_FILES['updateLogo']['type'];
            $ext = pathinfo($file_name, PATHINFO_EXTENSION);
            $extensions = array("jpeg", "jpg", "png");
            $filedestionation = "../images/kompani/". $uniquename . '.' . $ext;
        }


        $query1 = "SELECT * FROM kompanite WHERE id=$updateIdKomp LIMIT 1";
        $sql = mysqli_query($con, $query1);
        while ($row = $sql->fetch_assoc()) {
            $emailbackup = $row['email'];
            $photoBackup = $row['logo'];
        }
        if ($updateEmail == $emailbackup) {
            $updateEmail = $emailbackup;
        } else {
            $user_check_query = "SELECT * FROM kompanite WHERE email='$updateEmail' LIMIT 1";
            $result = mysqli_query($con, $user_check_query);
            $user = mysqli_fetch_assoc($result);
            if ($user['email'] === $updateEmail) {
                $data = array('status' => 'emailError');
                echo json_encode($data);
                return;
            }
        }
        if (!empty($file_name)) {
            if ($file_name && in_array($ext, $extensions) === false) {
                $data = array(
                    'status' => 'logoFormat'
                );
                echo json_encode($data);
                return;
            } elseif ($file_size > 5097152) {
                $data = array(
                    'status' => 'logoMB'
                );
                echo json_encode($data);
                return;
            } else {
                $sql = "UPDATE kompanite SET logo = '$filedestionation' WHERE id = $updateIdKomp";
                unlink($photoBackup);
                move_uploaded_file($file_tmp, $filedestionation);
                mysqli_query($con, $sql);
            }
        }

        $sql = "UPDATE kompanite SET  name='$updateName' , nrfiskal= '$updateFiskal', lokacioni='$updateLokacioni', telefoni='$updatePhone', email='$updateEmail' WHERE id=$updateIdKomp";
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



    case "singleKompaniData":
        $id = $_POST['id'];
        $sql = "SELECT * FROM  kompanite WHERE id='$id' LIMIT 1";
        $query = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($query);
        echo json_encode($row);
        break;


    
}
