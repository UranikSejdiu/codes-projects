<?php
include('config.php');

switch ($_POST["action"]) {

    case "fetchAllMadhesit":

        $output = array();
        $sql = "SELECT madhesit.madhesiaID, madhesit.madhesia, kategoria.kategoria FROM madhesit
        LEFT JOIN kategoria ON madhesit.kategoriaID = kategoria.kategoriaID";

        $totalQuery = mysqli_query($con, $sql);
        $total_all_rows = mysqli_num_rows($totalQuery);

        if (isset($_POST['search']['value'])) {
            $search_value = $_POST['search']['value'];
            $sql .= " WHERE  madhesit.madhesia like '" . $search_value . "%'";
            $sql .= " OR  kategoria.kategoria like '" . $search_value . "%'";
        }

        if (isset($_POST['order'])) {
            $column_name = $_POST['order'][0]['column'];
            $order = $_POST['order'][0]['dir'];
            $sql .= " ORDER BY " . $column_name . " " . $order . "";
        } else {
            $sql .= " ORDER BY madhesit.madhesiaID desc";
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
            $sub_array[] = $row['madhesiaID'];
            $sub_array[] = $row['kategoria'];
            $sub_array[] = $row['madhesia'];
            $sub_array[] = '<a href="javascript:void(0);" data-id="' . $row['madhesiaID'] . '"  class="btn button-success btn-sm editBtnKat" >Ndrysho</a>';
            $sub_array[] =  '<a href="javascript:void(0);" data-id="' . $row['madhesiaID'] . '"  class="btn button-danger btn-sm deleteBtn" >Fshi</a>';
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

    case "addMadhesi":
        $madhesia = mysqli_real_escape_string($con, $_POST['madhesia']);
        $kat = mysqli_real_escape_string($con, $_POST['kat']);

        $sql = "INSERT INTO madhesit (madhesia, kategoriaID) values ('$madhesia','$kat')";
        $query = mysqli_query($con, $sql);
        if ($query) {
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

    case "updateMadhesin":
        $uMadhesia = mysqli_real_escape_string($con,  $_POST['uMadhesia']);
        $updateIdMadh = mysqli_real_escape_string($con, $_POST['updateIdMadh']);
        $uKat = mysqli_real_escape_string($con, $_POST['uKat']);

        $sql = "UPDATE madhesit SET  madhesia='$uMadhesia', kategoriaID = '$uKat' WHERE madhesiaID=$updateIdMadh";
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

    case "singleMadhData":
        $id = $_POST['id'];
        $sql = "SELECT * FROM madhesit WHERE madhesiaID = $id LIMIT 1";
        $query = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($query);
        echo json_encode($row);
        break;


    case "deleteMadhesia":
        $id = $_POST['id'];
        $sql = "DELETE FROM madhesit WHERE madhesiaID=$id";
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
