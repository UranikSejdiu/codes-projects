<?php
include('config.php');

switch ($_POST["action"]) {

    case "fetchallKondata":

        $output = array();
        $sql = "SELECT * FROM kontaktet";

        $totalQuery = mysqli_query($con, $sql);
        $total_all_rows = mysqli_num_rows($totalQuery);

        if (isset($_POST['search']['value'])) {
            $search_value = $_POST['search']['value'];
            $sql .= " WHERE subjekti like '" . $search_value . "%'";
            $sql .= " OR moduli like '" . $search_value . "%'";
        }

        if (isset($_POST['order'])) {
            $column_name = $_POST['order'][0]['column'];
            $order = $_POST['order'][0]['dir'];
            $sql .= " ORDER BY " . $column_name . " " . $order . "";
        } else {
            $sql .= " ORDER BY id desc";
        }

        if ($_POST['length'] != -1) {
            $start = $_POST['start'];
            $length = $_POST['length'];
            $sql .= " LIMIT  " . $start . ", " . $length;
        }
        $query = mysqli_query($con, $sql);
        $count_rows = mysqli_num_rows($query);
        $data = array();
        while ($row = mysqli_fetch_assoc($query)) {
            $sub_array = array();
            $sub_array[] = $row['id'];
            $sub_array[] = '<textarea disabled style="overflow-y: auto;resize: none; border: none; width:250px;">' . $row['subjekti'] . '</textarea>';
            $sub_array[] = '<textarea disabled style="overflow-y: auto;resize: none;border: none; width:250px;">' . $row['mesazhi'] . '</textarea>';
            $sub_array[] = $row['moduli'];
            $sub_array[] = $row['createdDate'];
            $sub_array[] = '<a href="javascript:void(0);" data-id="' . $row['id'] . '"  class="btn button-success btn-sm editbtnKon" >Ndrysho</a>';
            $sub_array[] =  '<a href="javascript:void(0);" data-id="' . $row['id'] . '"  class="btn button-danger btn-sm deleteBtn" >Fshi</a>';
            $data[] = $sub_array;
        }

        $output = array(
            'draw' => intval($_POST['draw']),
            'recordsTotal' => $count_rows,
            'recordsFiltered' =>   $total_all_rows,
            'data' => $data,
        );
        echo  json_encode($output);

        break;

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

    case "updateKontakt":
        $uSubjekti = mysqli_real_escape_string($con, $_POST['uSubjekti']);
        $uMesazhi = mysqli_real_escape_string($con, $_POST['uMesazhi']);
        $uModul = mysqli_real_escape_string($con, $_POST['uModul']);
        $updateIdKon = mysqli_real_escape_string($con, $_POST['updateIdKon']);

        $sql = "UPDATE kontaktet SET  subjekti='$uSubjekti' ,mesazhi='$uMesazhi' ,moduli='$uModul' ,createdDate=CURRENT_TIMESTAMP WHERE id=$updateIdKon";
        $query = mysqli_query($con, $sql);
        $lastId = mysqli_insert_id($con);
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

    case "singleKontaktData":
        $id = $_POST['id'];
        $sql = "SELECT * FROM kontaktet WHERE id='$id' LIMIT 1";
        $query = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($query);
        echo json_encode($row);
        break;


    case "deleteKontakt":
        $id = $_POST['id'];
        $sql = "DELETE FROM kontaktet WHERE id=$id";
        $delQuery = mysqli_query($con, $sql);
        if ($delQuery == true) {
            $data = array(
                'status' => 'success',

            );

            echo json_encode($data);
        } else {
            $data = array(
                'status' => 'failed',

            );

            echo json_encode($data);
        }
        break;
}
