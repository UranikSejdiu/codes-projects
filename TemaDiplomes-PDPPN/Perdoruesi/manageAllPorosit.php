<?php
include('checkSession.php');
switch ($_POST["action"]) {

    case "fetchalldata":

        $output = array();
        $sql = "SELECT porosit.porosiaID, produktet.produkti, produktet.imazhi1, porosit.qyteti, porosit.adresa, porosit.zipCode, porosit.phone, porosit.mesazhi, porosit.menyraPageses, porosit.sasia, porosit.pagesa, porosit.statusi, produktet.qmimi 
        FROM porosit
        LEFT OUTER JOIN produktet ON produktet.produktID = porosit.produktID
        WHERE porosit.perdoruesID=$id";

        $totalQuery = mysqli_query($con, $sql);
        $total_all_rows = mysqli_num_rows($totalQuery);

        if (isset($_POST['order'])) {
            $column_name = $_POST['order'][0]['column'];
            $order = $_POST['order'][0]['dir'];
            $sql .= " ORDER BY " . $column_name . " " . $order . "";
        } else {
            $sql .= " ORDER BY porosit.porosiaID desc";
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
            if ($row['statusi']=='0') {
                $status = "E Anuluar";
            }elseif ($row['statusi']=='1') {
                $status = "E Hapur";
            }elseif ($row['statusi']=='2') {
                $status = "E Verefikuar";
            }elseif ($row['statusi']=='3') {
                $status = "Në Postë";
            }elseif ($row['statusi']=='4') {
                $status = "E Nisur";
            }elseif ($row['statusi']=='5') {
                $status = "E Realizuar";
            }
            $sub_array = array();
            $sub_array[] = $row['porosiaID'];
            $sub_array[] = '<a href="porosia-details.php?porosiID='.$row['porosiaID'].'">'.$row['produkti'].'</a>' ;
            $sub_array[] = '<img width="100" height="100" src="' . $row['imazhi1'] . '" style="object-fit: contain;object-position:center;">';
            $sub_array[] = $row['qmimi'].'€';
            $sub_array[] = $row['sasia'];
            $sub_array[] = $row['pagesa'].'€';
            $sub_array[] = $row['menyraPageses'];
            $sub_array[] = '<textarea disabled style="border: none;">' . $row['mesazhi'] . '</textarea>';
            $sub_array[] = $row['qyteti'];
            $sub_array[] = $row['adresa'];
            $sub_array[] = $row['zipCode'];
            $sub_array[] = $row['phone'];
            $sub_array[] = $status;
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

    case 'fetchPorosiData':

        $id = $_POST['id'];


        $sql = "SELECT porosit.porosiaID, produktet.produkti, produktet.imazhi1, produktet.imazhi2, produktet.imazhi3, produktet.imazhi4, porosit.email, porosit.qyteti, porosit.adresa, porosit.zipCode, porosit.phone, porosit.mesazhi, porosit.menyraPageses, porosit.sasia, porosit.pagesa, porosit.statusi, produktet.qmimi, porosit.statusi, porosit.dataBlerjes
        FROM porosit
        LEFT OUTER JOIN produktet ON produktet.produktID = porosit.produktID
        WHERE porosit.porosiaID=$id LIMIT 1";
        $query = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($query);
        echo json_encode($row);
        break;

    }
