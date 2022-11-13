<?php
include('config.php');

switch ($_POST["action"]) {

    case "fetchAllKategori":

        $output = array();
        $sql = "SELECT * FROM kategoria";

        $totalQuery = mysqli_query($con, $sql);
        $total_all_rows = mysqli_num_rows($totalQuery);

        if (isset($_POST['search']['value'])) {
            $search_value = $_POST['search']['value'];
            $sql .= " WHERE kategoria like '" . $search_value . "%'";
        }

        if (isset($_POST['order'])) {
            $column_name = $_POST['order'][0]['column'];
            $order = $_POST['order'][0]['dir'];
            $sql .= " ORDER BY " . $column_name . " " . $order . "";
        } else {
            $sql .= " ORDER BY kategoriaID desc";
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
            $sub_array[] = $row['kategoriaID'];
            $sub_array[] = $row['kategoria'];
            $sub_array[] = '<a href="javascript:void(0);" data-id="' . $row['kategoriaID'] . '"  class="btn button-success btn-sm editBtnKat" >Ndrysho</a>';
            $sub_array[] =  '<a href="javascript:void(0);" data-id="' . $row['kategoriaID'] . '"  class="btn button-danger btn-sm deleteBtn" >Fshi</a>';
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

    case "addKategori":
        $name = mysqli_real_escape_string($con, $_POST['name']);

            $sql = "INSERT INTO kategoria (kategoria) values ('$name')";
            $query = mysqli_query($con, $sql);
            if ($query) {
                    $data = array(
                        'status' => 'true'
                    );
                    echo json_encode($data); 
            }else {
                $data = array(
                    'status' => 'false'
                );
                echo json_encode($data);
            }
            
            
        
    break;

    case "updateKategorit":
        $updateName = mysqli_real_escape_string($con,  $_POST['updateName']);
        $updateIdKat = mysqli_real_escape_string($con, $_POST['updateIdKat']);

        $sql = "UPDATE kategoria SET  kategoria='$updateName' WHERE kategoriaID=$updateIdKat";
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
    
    case "singleKatData":
        $id = $_POST['id'];
        $sql = "SELECT * FROM kategoria WHERE kategoriaID='$id' LIMIT 1";
        $query = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($query);
        echo json_encode($row);
        break;


    case "deleteKategoria":
        $id = $_POST['id'];
        $sql = "DELETE FROM kategoria WHERE kategoriaID=$id";
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
