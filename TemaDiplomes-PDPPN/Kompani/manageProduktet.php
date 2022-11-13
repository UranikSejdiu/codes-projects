<?php
include('checkSession.php');
switch ($_POST["action"]) {

    case "fetchalldata":


        $output = array();
        $sql = "SELECT produktet.produktID, produktet.produkti, produktet.imazhi1, produktet.imazhi2, produktet.imazhi3, produktet.imazhi4, kategoria.kategoria, produktet.pershkrimi, produktet.qmimi, produktet.stoku, madhesit.madhesia, ngjyrat.ngjyra, produktet.kompaniaID
        FROM produktet
        LEFT OUTER JOIN kategoria ON produktet.kategoriaID=kategoria.kategoriaID 
        LEFT OUTER JOIN madhesit ON produktet.madhesiaID=madhesit.madhesiaID 
        LEFT OUTER JOIN ngjyrat ON produktet.ngjyraID=ngjyrat.ngjyraID
        WHERE  produktet.kompaniaID=$id";

        $totalQuery = mysqli_query($con, $sql);
        $total_all_rows = mysqli_num_rows($totalQuery);


        if (isset($_POST['search']['value'])) {
            $search_value = $_POST['search']['value'];
            $sql .= " AND produktet.produkti like '" . $search_value . "%'";
        }

        if (isset($_POST['order'])) {
            $column_name = $_POST['order'][0]['column'];
            $order = $_POST['order'][0]['dir'];
            $sql .= " ORDER BY " . $column_name . " " . $order . "";
        } else {
            $sql .= " ORDER BY produktet.produktID desc";
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
            if ($row['madhesia'] == '0') {
                $madhesia = '&#10005;';
            } else {
                $madhesia = $row['madhesia'];
            }
            if ($row['ngjyra'] == '0') {
                $ngjyra = '&#10005;';
            } else {
                $ngjyra = $row['ngjyra'];
            }
            $sub_array[] = $row['produktID'];
            $sub_array[] = '<a href="produkti.php?produktID='.$row['produktID'].'">'.$row['produkti'].'</a>';
            $sub_array[] = '<img width="120" height="85" style="padding:2px;" src="' . $row['imazhi1'] . '">';
            $sub_array[] = '<img width="120" height="85" style="padding:2px;" src="' . $row['imazhi2'] . '">';
            $sub_array[] = '<img width="120" height="85" style="padding:2px;" src="' . $row['imazhi3'] . '">';
            $sub_array[] = '<img width="120" height="85" style="padding:2px;" src="' . $row['imazhi4'] . '">';
            $sub_array[] = $row['kategoria'];
            $sub_array[] = '<textarea disabled style="overflow-y: auto;resize: none;border: none;width:fit-content;">' . $row['pershkrimi'] . '</textarea>';
            $sub_array[] = $row['qmimi'] . '€';
            $sub_array[] = $row['stoku'];
            $sub_array[] = $madhesia;
            $sub_array[] = $ngjyra;
            $sub_array[] = '<a href="javascript:void(0);" data-id="' . $row['produktID'] . '"  class="btn button-success btn-sm editbtnProd" >Ndrysho</a>';
            $sub_array[] =  '<a href="javascript:void(0);" data-id="' . $row['produktID'] . '"  class="btn button-danger btn-sm deleteBtn" >Fshi</a>';
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

    case "addProdukt":

        $name = mysqli_real_escape_string($con, $_POST['name']);
        $kat = mysqli_real_escape_string($con, $_POST['kat']);
        $pershkrimi = mysqli_real_escape_string($con, $_POST['pershkrimi']);
        $qmimi = mysqli_real_escape_string($con, $_POST['qmimi']);
        $stok = mysqli_real_escape_string($con, $_POST['stok']);
        $madhesia = mysqli_real_escape_string($con, $_POST['madhesia']);
        $ngjyra = mysqli_real_escape_string($con, $_POST['ngjyra']);
        $kompania = mysqli_real_escape_string($con, $_POST['kompania']);

        if (isset($_FILES['image1'])) {
            $file_name1 = $_FILES['image1']['name'];
            $uniquename1 = time() . '-' . uniqid();
            $file_size1 = $_FILES['image1']['size'];
            $file_tmp1 = $_FILES['image1']['tmp_name'];
            $file_type1 = $_FILES['image1']['type'];
            $ext1 = pathinfo($file_name1, PATHINFO_EXTENSION);
            $extensions1 = array("jpeg", "jpg", "png");
            $filedestionation1 = "../images/produktet/" . $uniquename1 . '.' . $ext1;
        }
        if (isset($_FILES['image2'])) {
            $file_name2 = $_FILES['image2']['name'];
            $uniquename2 = time() . '-' . uniqid();
            $file_size2 = $_FILES['image2']['size'];
            $file_tmp2 = $_FILES['image2']['tmp_name'];
            $file_type2 = $_FILES['image2']['type'];
            $ext2 = pathinfo($file_name2, PATHINFO_EXTENSION);
            $extensions2 = array("jpeg", "jpg", "png");
            $filedestionation2 = "../images/produktet/" . $uniquename2 . '.' . $ext2;
        }

        if (isset($_FILES['image3'])) {
            $file_name3 = $_FILES['image3']['name'];
            $uniquename3 = time() . '-' . uniqid();
            $file_size3 = $_FILES['image3']['size'];
            $file_tmp3 = $_FILES['image3']['tmp_name'];
            $file_type3 = $_FILES['image3']['type'];
            $ext3 = pathinfo($file_name3, PATHINFO_EXTENSION);
            $extensions3 = array("jpeg", "jpg", "png");
            $filedestionation3 = "../images/produktet/" . $uniquename3 . '.' . $ext3;
        }

        if (isset($_FILES['image4'])) {
            $file_name4 = $_FILES['image4']['name'];
            $uniquename4 = time() . '-' . uniqid();
            $file_size4 = $_FILES['image4']['size'];
            $file_tmp4 = $_FILES['image4']['tmp_name'];
            $file_type4 = $_FILES['image4']['type'];
            $ext4 = pathinfo($file_name4, PATHINFO_EXTENSION);
            $extensions4 = array("jpeg", "jpg", "png");
            $filedestionation4 = "../images/produktet/" . $uniquename4 . '.' . $ext4;
        }

        if ($file_name1 && in_array($ext1, $extensions1) === false && $file_name2 && in_array($ext2, $extensions2) === false && $file_name3 && in_array($ext3, $extensions3) === false && $file_name4 && in_array($ext4, $extensions4) === false) {
            $data = array(
                'status' => 'logoFormat'
            );
            echo json_encode($data);
            return;
        } elseif ($file_size1 > 5097152 && $file_size2 > 5097152 && $file_size3 > 5097152 && $file_size4 > 5097152) {
            $data = array(
                'status' => 'logoMB'
            );
            echo json_encode($data);
            return;
        } else {

            $sql = "INSERT INTO produktet (produkti, imazhi1, imazhi2, imazhi3, imazhi4, kategoriaID, pershkrimi, qmimi, stoku, madhesiaID, ngjyraID, kompaniaID) values ('$name', '$filedestionation1', '$filedestionation2','$filedestionation3', '$filedestionation4', '$kat', '$pershkrimi', '$qmimi', '$stok', '$madhesia', '$ngjyra', '$kompania')";
            $query = mysqli_query($con, $sql);
            if ($query) {
                move_uploaded_file($file_tmp1, $filedestionation1);
                move_uploaded_file($file_tmp2, $filedestionation2);
                move_uploaded_file($file_tmp3, $filedestionation3);
                move_uploaded_file($file_tmp4, $filedestionation4);
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
        }
        break;

    case "singleProduktData":
        $produktID = $_POST['id'];
        $sql = "SELECT * FROM  produktet WHERE produktID='$produktID' AND kompaniaID='$id' LIMIT 1";
        $query = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($query);
        echo json_encode($row);
        break;



    case "updateProdukt":
        $uName = mysqli_real_escape_string($con,  $_POST['uName']);
        $uKat = mysqli_real_escape_string($con,  $_POST['uKat']);
        $uPershkrim = mysqli_real_escape_string($con,  $_POST['uPershkrimi']);
        $uQmimi = mysqli_real_escape_string($con,  $_POST['uQmimi']);
        $uStok = mysqli_real_escape_string($con,  $_POST['uStok']);
        $uMadhesia = mysqli_real_escape_string($con,  $_POST['uMadhesia']);
        $uNgjyra = mysqli_real_escape_string($con,  $_POST['uNgjyra']);
        $updateIdProd = mysqli_real_escape_string($con,  $_POST['updateIdProd']);
        $oldMadhesia = mysqli_real_escape_string($con,  $_POST['oldMadhesia']);
        $oldNgjyra = mysqli_real_escape_string($con,  $_POST['oldNgjyra']);

        if (isset($_FILES['uImage1'])) {
            $file_name1 = $_FILES['uImage1']['name'];
            $uniquename1 = time() . '-' . uniqid();
            $file_size1 = $_FILES['uImage1']['size'];
            $file_tmp1 = $_FILES['uImage1']['tmp_name'];
            $file_type1 = $_FILES['uImage1']['type'];
            $ext1 = pathinfo($file_name1, PATHINFO_EXTENSION);
            $extensions1 = array("jpeg", "jpg", "png");
            $filedestionation1 = "../images/produktet/" . $uniquename1 . '.' . $ext1;
        }

        if (isset($_FILES['uImage2'])) {
            $file_name2 = $_FILES['uImage2']['name'];
            $uniquename2 = time() . '-' . uniqid();
            $file_size2 = $_FILES['uImage2']['size'];
            $file_tmp2 = $_FILES['uImage2']['tmp_name'];
            $file_type2 = $_FILES['uImage2']['type'];
            $ext2 = pathinfo($file_name2, PATHINFO_EXTENSION);
            $extensions2 = array("jpeg", "jpg", "png");
            $filedestionation2 = "../images/produktet/" . $uniquename2 . '.' . $ext2;
        }

        if (isset($_FILES['uImage3'])) {
            $file_name3 = $_FILES['uImage3']['name'];
            $uniquename3 = time() . '-' . uniqid();
            $file_size3 = $_FILES['uImage3']['size'];
            $file_tmp3 = $_FILES['uImage3']['tmp_name'];
            $file_type3 = $_FILES['uImage3']['type'];
            $ext3 = pathinfo($file_name3, PATHINFO_EXTENSION);
            $extensions3 = array("jpeg", "jpg", "png");
            $filedestionation3 = "../images/produktet/" . $uniquename3 . '.' . $ext3;
        }

        if (isset($_FILES['uImage4'])) {
            $file_name4 = $_FILES['uImage4']['name'];
            $uniquename4 = time() . '-' . uniqid();
            $file_size4 = $_FILES['uImage4']['size'];
            $file_tmp4 = $_FILES['uImage4']['tmp_name'];
            $file_type4 = $_FILES['uImage4']['type'];
            $ext4 = pathinfo($file_name4, PATHINFO_EXTENSION);
            $extension4 = array("jpeg", "jpg", "png");
            $filedestionation4 = "../images/produktet/" . $uniquename4 . '.' . $ext4;
        }


        $query1 = "SELECT * FROM produktet WHERE produktID=$updateIdProd LIMIT 1";
        $sql = mysqli_query($con, $query1);
        while ($row = $sql->fetch_assoc()) {
            $img1 = $row['imazhi1'];
            $img2 = $row['imazhi2'];
            $img3 = $row['imazhi3'];
            $img4 = $row['imazhi4'];
            $backupMadhesia = $row['madhesiaID'];
            $backupNgjyra = $row['ngjyraID'];
        }
        if ($file_name1 && in_array($ext1, $extensions1) === false && $file_name2 && in_array($ext2, $extensions2) === false && $file_name3 && in_array($ext3, $extensions3) === false && $file_name4 && in_array($ext4, $extensions4) === false) {
            $data = array(
                'status' => 'logoFormat'
            );
            echo json_encode($data);
            return;
        } elseif ($file_size1 > 5097152 && $file_size2 > 5097152 && $file_size3 > 5097152 && $file_size4 > 5097152) {
            $data = array(
                'status' => 'logoMB'
            );
            echo json_encode($data);
            return;
        }
        if (!empty($file_name1)) {
            $sql1 = "UPDATE produktet SET imazhi1 = '$filedestionation1' WHERE produktID = $updateIdProd";
            if ($query1 = mysqli_query($con, $sql1)) {
                move_uploaded_file($file_tmp1, $filedestionation1);
                unlink($img1);
            } else {
                $data = array(
                    'status' => 'imgFail'
                );
                echo json_encode($data);
                return;
            }
        }
        if (!empty($file_name2)) {
            $sql2 = "UPDATE produktet SET imazhi2 = '$filedestionation2' WHERE produktID = $updateIdProd";
            if ($query2 = mysqli_query($con, $sql2)) {
                move_uploaded_file($file_tmp2, $filedestionation2);
                unlink($img2);
            } else {
                $data = array(
                    'status' => 'imgFail'
                );
                echo json_encode($data);
                return;
            }
        }
        if (!empty($file_name3)) {
            $sql3 = "UPDATE produktet SET imazhi3 = '$filedestionation3' WHERE produktID = $updateIdProd";
            if ($query3 = mysqli_query($con, $sql3)) {
                move_uploaded_file($file_tmp3, $filedestionation3);
                unlink($img3);
            } else {
                $data = array(
                    'status' => 'imgFail'
                );
                echo json_encode($data);
                return;
            }
        }
        if (!empty($file_name4)) {
            $sql4 = "UPDATE produktet SET imazhi4 = '$filedestionation4' WHERE produktID = $updateIdProd";
            if ($query4 = mysqli_query($con, $sql4)) {
                move_uploaded_file($file_tmp4, $filedestionation4);
                unlink($img4);
            } else {
                $data = array(
                    'status' => 'imgFail'
                );
                echo json_encode($data);
                return;
            }
        }
        if ($uMadhesia == '0') {
            $madhesia = $oldMadhesia;
        } else {
            $madhesia = $uMadhesia;
        }

        if ($uNgjyra == '0') {
            $ngjyra = $oldNgjyra;
        } else {
            $ngjyra = $uNgjyra;
        }
        if ($uKat == '0') {
            $madhesia = 0;
            $ngjyra = 0;
        }
        $sql = "UPDATE produktet SET  produkti='$uName' , kategoriaID= '$uKat', pershkrimi='$uPershkrim', qmimi='$uQmimi', stoku='$uStok', madhesiaID='$madhesia', ngjyraID='$ngjyra' WHERE produktID=$updateIdProd";
        $insert = mysqli_query($con, $sql);
        if ($insert == true) {

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


    case "selMadhesia":
        $id = $_POST['id'];
        $madhesit = array();
        $sql = "SELECT * FROM  madhesit WHERE kategoriaID ='$id'";

        $result = mysqli_query($con, $sql);

        while ($row = mysqli_fetch_array($result)) {
            $madhesiaID = $row['madhesiaID'];
            $madhesia = $row['madhesia'];

            $madhesit[] = array("madhesiaID" => $madhesiaID, "madhesia" => $madhesia);
        }
        // encoding array to json format
        echo json_encode($madhesit);
        break;

    case "selNgjyra":
        $id = $_POST['id'];
        $ngjyrat = array();
        $sql = "SELECT * FROM  ngjyrat WHERE kategoriaID ='$id'";

        $result = mysqli_query($con, $sql);

        while ($row = mysqli_fetch_array($result)) {
            $ngjyraID = $row['ngjyraID'];
            $ngjyra = $row['ngjyra'];

            $ngjyrat[] = array("ngjyraID" => $ngjyraID, "ngjyra" => $ngjyra);
        }
        // encoding array to json format
        echo json_encode($ngjyrat);
        break;

    case "uSelMadhesia":
        $id = $_POST['id'];
        $uMadhesit = array();
        $sql = "SELECT * FROM  madhesit WHERE kategoriaID ='$id'";

        $result = mysqli_query($con, $sql);

        while ($row = mysqli_fetch_array($result)) {
            $uMadhesiaID = $row['madhesiaID'];
            $uMadhesia = $row['madhesia'];

            $uMadhesit[] = array("uMadhesiaID" => $uMadhesiaID, "uMadhesia" => $uMadhesia);
        }
        // encoding array to json format
        echo json_encode($uMadhesit);
        break;

    case "uSelNgjyra":
        $id = $_POST['id'];
        $uNgjyrat = array();
        $sql = "SELECT * FROM  ngjyrat WHERE kategoriaID ='$id'";

        $result = mysqli_query($con, $sql);

        while ($row = mysqli_fetch_array($result)) {
            $uNgjyraID = $row['ngjyraID'];
            $uNgjyra = $row['ngjyra'];

            $uNgjyrat[] = array("uNgjyraID" => $uNgjyraID, "uNgjyra" => $uNgjyra);
        }
        // encoding array to json format
        echo json_encode($uNgjyrat);
        break;


    case "deleteProdukt":
        $prodID = $_POST['id'];
        $kompani = $id;

        $sql1 = "SELECT imazhi1, imazhi2, imazhi3, imazhi4, kompaniaID FROM produktet WHERE produktID='$prodID' LIMIT 1";
        $query = mysqli_query($con, $sql1);

        while ($row = mysqli_fetch_assoc($query)) {
            $img1 = $row['imazhi1'];
            $img2 = $row['imazhi2'];
            $img3 = $row['imazhi3'];
            $img4 = $row['imazhi4'];
            $kompaniaID = $row['kompaniaID'];
        }
        if ($kompani == $kompaniaID) {
            $sql = "DELETE FROM produktet WHERE produktID=$prodID";
            $delQuery = mysqli_query($con, $sql);
            if ($delQuery == true) {
                unlink($img1);
                unlink($img2);
                unlink($img3);
                unlink($img4);
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
        }

        break;
}
