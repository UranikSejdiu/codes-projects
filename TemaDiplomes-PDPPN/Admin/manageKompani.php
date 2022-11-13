<?php
include('config.php');

switch ($_POST["action"]) {

    case "fetchalldata":

        $output = array();
        $sql = "SELECT * FROM kompanite";

        $totalQuery = mysqli_query($con, $sql);
        $total_all_rows = mysqli_num_rows($totalQuery);

        if (isset($_POST['search']['value'])) {
            $search_value = $_POST['search']['value'];
            $sql .= " WHERE name like '" . $search_value . "%'";
            $sql .= " OR nrfiskal like '" . $search_value . "%'";
            $sql .= " OR email like '" . $search_value . "%'";
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
            $sub_array[] = '<img width="50" height="50" src="' . $row['logo'] . '" alt="#" style="object-fit: cover; object-position:center;">';
            $sub_array[] = $row['name'];
            $sub_array[] = $row['nrfiskal'];
            $sub_array[] = $row['lokacioni'];
            $sub_array[] = $row['telefoni'];
            $sub_array[] = $row['email'];
            $sub_array[] = '<textarea disabled style="overflow-y: auto;resize: none;border: none;">' . $row['password'] . '</textarea>';
            $sub_array[] = $row['code'];
            $sub_array[] = $row['status'];
            $sub_array[] = '<a href="javascript:void(0)" data-id="' . $row['id'] . '"  class="btn btn-success btn-sm editBtnKomp" >Ndrysho</a>';
            $sub_array[] =  '<a href="javascript:void(0)" data-id="' . $row['id'] . '"  class="btn btn-danger btn-sm deleteBtnKomp" >Fshi</a>';
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

    case "addKompani":

        $name = mysqli_real_escape_string($con, $_POST['name']);
        $fiskal = mysqli_real_escape_string($con, $_POST['fiskal']);
        $lokacioni = mysqli_real_escape_string($con, $_POST['lokacioni']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);

        $query = "SELECT * FROM kompanite WHERE email='$email' LIMIT 1";
        $result = mysqli_query($con, $query);
        $fetch = mysqli_fetch_assoc($result);

        if (isset($_FILES['logo'])) {
            $file_name = $_FILES['logo']['name'];
            $uniquename = time() . '-' . uniqid();
            $file_size = $_FILES['logo']['size'];
            $file_tmp = $_FILES['logo']['tmp_name'];
            $file_type = $_FILES['logo']['type'];
            $ext = pathinfo($file_name, PATHINFO_EXTENSION);
            $extensions = array("jpeg", "jpg", "png");
            $filedestionation = "../images/kompani/" . $uniquename . '.' . $ext;
        }

        if (strlen($password) < '8') {
            $data = array(
                'status' => 'passwordError'
            );
            echo json_encode($data);
            return;
        } elseif (!preg_match("#[0-9]+#", $password)) {
            $data = array(
                'status' => 'passwordError'
            );
            echo json_encode($data);
            return;
        } elseif (!preg_match("#[A-Z]+#", $password)) {
            $data = array(
                'status' => 'passwordError'
            );
            echo json_encode($data);
            return;
        } elseif (!preg_match("#[a-z]+#", $password)) {
            $data = array(
                'status' => 'passwordError'
            );
            echo json_encode($data);
            return;
        } elseif ($fetch !== null) {
            $data = array(
                'status' => 'emailError'
            );
            echo json_encode($data);
            return;
        } elseif (strlen($fiskal) < '8') {
            $data = array(
                'status' => 'nrFError'
            );
            echo json_encode($data);
            return;
        } elseif ($file_name && in_array($ext, $extensions) === false) {
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
            $hashPassword = password_hash($password, PASSWORD_BCRYPT);
            $status = "notverified";
            $code = rand(999999, 111111);
            $sql = "INSERT INTO kompanite (logo, name, nrfiskal, lokacioni, telefoni, email, password, code, status) values ('$filedestionation', '$name','$fiskal', '$lokacioni','$phone','$email','$hashPassword','$code','$status')";
            $insertData = mysqli_query($con, $sql);
            if ($insertData) {
                $subject = "Kodi i verifikimit të Email-it";
                $message = ' <body style="margin: 0;">
                    <div style="box-sizing: inherit; border-width: 0; border-style: solid; border-color: #dae1e7; background-color: #f1f5f8; font-family: system-ui,BlinkMacSystemFont,-apple-system,Segoe UI,Roboto,Oxygen,Ubuntu,Cantarell,Fira Sans,Droid Sans,Helvetica Neue,sans-serif; min-height: 100vh; padding-left: 1rem; padding-right: 1rem; padding-top: 2rem; padding-bottom: 2rem;">
                      <div style="box-sizing: inherit; border-width: 0; border-style: solid; border-color: #dae1e7; margin-left: auto; margin-right: auto; max-width: 40rem;">
                        <div style="box-sizing: inherit; border-width: 0; border-style: solid; border-color: #dae1e7; background-color: #fff; padding: 2rem; box-shadow: 0 4px 8px 0 rgba(0,0,0,.12),0 2px 4px 0 rgba(0,0,0,.08);">
                          <div style="box-sizing: inherit; border-width: 0; border-style: solid; border-color: #dae1e7; border-bottom-width: 1px; text-align: center; letter-spacing: .05em;">
                            <div style="box-sizing: inherit; border-width: 0; border-style: solid; border-color: #dae1e7; font-weight: 700; color: #e3342f; font-size: .875rem;">PDPPN</div>
                            <h1 style="box-sizing: inherit; border-width: 0; border-style: solid; border-color: #dae1e7; align-items: center; justify-content: center; font-size: 1.875rem;">Konfirmimi i email adresës</h1>
                          </div>
                          <div style="box-sizing: inherit; border-width: 0; border-style: solid; border-color: #dae1e7; border-bottom-width: 1px; padding-top: 2rem; padding-bottom: 2rem;">
                            <p style="box-sizing: inherit; border-width: 0; border-style: solid; border-color: #dae1e7; margin: 0;">
                              Përshendetje ' . $name . ', <br style="box-sizing: inherit; border-width: 0; border-style: solid; border-color: #dae1e7;"><br style="box-sizing: inherit; border-width: 0; border-style: solid; border-color: #dae1e7;">Përdor kodin më posht për të konfirmuar email adresën dhe pastaj mund të kyçeni në
                              platformën tonë.
                            </p>
                            <h3 style="box-sizing: inherit; border-width: 0; border-style: solid; border-color: #dae1e7; margin: 0; background-color: #e3342f; border-radius: .25rem; margin-top: 2rem; margin-bottom: 2rem; padding: 1rem; color: #fff; letter-spacing: .05em; text-align: center;" class="text-white tracking-wide bg-red rounded w-full my-8 p-4 ">' . $code . '</h3>
                            <p style="box-sizing: inherit; border-width: 0; border-style: solid; border-color: #dae1e7; margin: 0; font-size: .875rem;">
                              Shpresojmë që jeni mirë!<br style="box-sizing: inherit; border-width: 0; border-style: solid; border-color: #dae1e7;"> Nga stafi i PDPPN
                            </p>
                          </div>
                          <div style="box-sizing: inherit; border-width: 0; border-style: solid; border-color: #dae1e7; margin-top: 2rem; text-align: center; color: #606f7b;">
                            <h3 style="box-sizing: inherit; border-width: 0; border-style: solid; border-color: #dae1e7; margin: 0; margin-bottom: 1rem; font-size: 1rem;">Ju Faleminderit që përdorni shërbimet tona!</h3>
                            <p style="box-sizing: inherit; border-width: 0; border-style: solid; border-color: #dae1e7; margin: 0;">Ekipi PDPPN</p>
                          </div>
                        </div>
                      </div>
                    </div>
                   </body>';
                $sender = 'From: PDPPN <noreplay@pdppn.com>' . PHP_EOL .
                    'Reply-To: PDPPN <noreplay@pdppn.com>' . PHP_EOL .
                    'X-Mailer: PHP/' . PHP_EOL . 'Content-type: text/html; charset=UTF-8' . phpversion();
                if (mail($email, $subject, $message, $sender)) {
                    move_uploaded_file($file_tmp, $filedestionation);
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
        }
        break;

    case "updateKompani":
        $updateName = mysqli_real_escape_string($con,  $_POST['updateName']);
        $updateFiskal = mysqli_real_escape_string($con,  $_POST['updateFiskal']);
        $updateLokacioni = mysqli_real_escape_string($con,  $_POST['updateLokacioni']);
        $updatePhone = mysqli_real_escape_string($con,  $_POST['updatePhone']);
        $updateEmail = mysqli_real_escape_string($con,  $_POST['updateEmail']);
        $updatePassword = mysqli_real_escape_string($con,  $_POST['updatePassword']);
        $updateIdKomp = mysqli_real_escape_string($con,  $_POST['updateIdKomp']);

        if (isset($_FILES['updateLogo'])) {
            $file_name = $_FILES['updateLogo']['name'];
            $uniquename = time() . '-' . uniqid();
            $file_size = $_FILES['updateLogo']['size'];
            $file_tmp = $_FILES['updateLogo']['tmp_name'];
            $file_type = $_FILES['updateLogo']['type'];
            $ext = pathinfo($file_name, PATHINFO_EXTENSION);
            $extensions = array("jpeg", "jpg", "png");
            $filedestionation = "../images/kompani/" . $uniquename . '.' . $ext;
        }


        $query1 = "SELECT * FROM kompanite WHERE id=$updateIdKomp LIMIT 1";
        $sql = mysqli_query($con, $query1);
        while ($row = $sql->fetch_assoc()) {
            $fjalekalimibackup = $row['password'];
            $emailbackup = $row['email'];
            $photoBackup = $row['logo'];
        }
        if ($updatePassword) {
            if ($updatePassword != $fjalekalimibackup) {
                if (strlen($updatePassword) <= '8') {
                    $data = array(
                        'status' => 'passwordError'
                    );
                    echo json_encode($data);
                    return;
                } elseif (!preg_match("#[0-9]+#", $updatePassword)) {
                    $data = array(
                        'status' => 'passwordError'
                    );
                    echo json_encode($data);
                    return;
                } elseif (!preg_match("#[A-Z]+#", $updatePassword)) {
                    $data = array(
                        'status' => 'passwordError'
                    );
                    echo json_encode($data);
                    return;
                } elseif (!preg_match("#[a-z]+#", $updatePassword)) {
                    $data = array(
                        'status' => 'passwordError'
                    );
                    echo json_encode($data);
                    return;
                }
                $newPassword = password_hash($updatePassword, PASSWORD_BCRYPT);
            } else {
                $newPassword = $updatePassword;
            }
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

        $sql = "UPDATE kompanite SET  name='$updateName' , nrfiskal= '$updateFiskal', lokacioni='$updateLokacioni', telefoni='$updatePhone', email='$updateEmail', password='$newPassword' WHERE id=$updateIdKomp";
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


    case "deleteKompani":
        $id = $_POST['id'];

        $sql1 = "SELECT logo FROM kompanite WHERE id='$id' LIMIT 1";
        $query = mysqli_query($con, $sql1);
        while ($row = mysqli_fetch_assoc($query)) {
            $nameoffile = $row['logo'];
        }
        $sql = "DELETE FROM kompanite WHERE id=$id";
        $delQuery = mysqli_query($con, $sql);
        if ($delQuery == true) {
            unlink($nameoffile);
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
