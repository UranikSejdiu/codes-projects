<?php
include('config.php');

switch ($_POST["action"]) {

    case "addKontakt":
        $subjekti = mysqli_real_escape_string($con, $_POST['subjekti']);
        $mesazhi = mysqli_real_escape_string($con, $_POST['mesazhi']);
        $moduli = mysqli_real_escape_string($con, $_POST['moduli']);

        $sql = "INSERT INTO kontaktet (subjekti,mesazhi,moduli,createdDate) values ('$subjekti','$mesazhi','$moduli',CURRENT_TIMESTAMP)";
        $query = mysqli_query($con, $sql);
        $lastId = mysqli_insert_id($con);
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
        break;
    
}
