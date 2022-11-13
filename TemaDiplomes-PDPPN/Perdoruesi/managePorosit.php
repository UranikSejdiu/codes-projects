<?php
include('config.php');

switch ($_POST["action"]) {

    case "bejPorosi":
        $emri = mysqli_real_escape_string($con,  $_POST['emri']);
        $email = mysqli_real_escape_string($con,  $_POST['email']);
        $qyteti = mysqli_real_escape_string($con,  $_POST['qyteti']);
        $adresa = mysqli_real_escape_string($con,  $_POST['adresa']);
        $zipCode = mysqli_real_escape_string($con,  $_POST['zipCode']);
        $phone = mysqli_real_escape_string($con,  $_POST['phone']);
        $prodID = mysqli_real_escape_string($con,  $_POST['prodID']);
        $prdID = mysqli_real_escape_string($con,  $_POST['prdID']);
        $sasia = mysqli_real_escape_string($con,  $_POST['sasia']);
        $total = mysqli_real_escape_string($con,  $_POST['total']);
        $pagesa = mysqli_real_escape_string($con,  $_POST['pagesa']);
        $mesazhi = mysqli_real_escape_string($con,  $_POST['mesazhi']);
        $statusi = '1';

        $sql = "INSERT INTO porosit (produktID, perdoruesID, emri, email, qyteti, adresa, zipCode, phone, mesazhi, menyraPageses, sasia, pagesa, statusi)VALUES('$prodID', '$prdID', '$emri', '$email', '$qyteti', '$adresa',' $zipCode', '$phone', '$mesazhi', '$pagesa', '$sasia', '$total', '$statusi')";
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

        if ($query == true) {
            $stokSql = "SELECT stoku FROM produktet WHERE produktID=$prodID";
            $queryStok = mysqli_query($con, $stokSql);
            while ($row = $queryStok->fetch_assoc()) {
                $stoku = $row['stoku'];
            }

            $newStok = $stoku - $sasia;

            $insertStok = "UPDATE produktet SET stoku=$newStok WHERE produktID=$prodID";
            $queryInsert = mysqli_query($con, $insertStok);
        }



        break;

}
