<?php
include('config.php');

switch ($_POST["action"]) {

    case "fetchallprddata":

        $output = array();
        $sql = "SELECT perdoruesit.id,perdoruesit.fullName, cities.name, perdoruesit.adress, perdoruesit.zipCode, perdoruesit.phone, perdoruesit.email, perdoruesit.password, perdoruesit.code, perdoruesit.status
        FROM perdoruesit LEFT OUTER JOIN cities ON perdoruesit.id_city=cities.id_city";

        $totalQuery = mysqli_query($con, $sql);
        $total_all_rows = mysqli_num_rows($totalQuery);

        if (isset($_POST['search']['value'])) {
            $search_value = $_POST['search']['value'];
            $sql .= " WHERE perdoruesit.fullName like '" . $search_value . "%'";
            $sql .= " OR perdoruesit.email like '" . $search_value . "%'";
            $sql .= " OR cities.name like '" . $search_value . "%'";
        }

        if (isset($_POST['order'])) {
            $column_name = $_POST['order'][0]['column'];
            $order = $_POST['order'][0]['dir'];
            $sql .= " ORDER BY " . $column_name . " " . $order . "";
        } else {
            $sql .= " ORDER BY perdoruesit.id desc";
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
            $sub_array[] = $row['fullName'];
            $sub_array[] = $row['name'];
            $sub_array[] = $row['adress'];
            $sub_array[] = $row['zipCode'];
            $sub_array[] = $row['phone'];
            $sub_array[] = $row['email'];
            $sub_array[] = '<textarea disabled style="overflow-y: auto;resize: none;border: none;">' . $row['password'] . '</textarea>';
            $sub_array[] = $row['status'];
            $sub_array[] = '<a href="javascript:void(0);" data-id="' . $row['id'] . '"  class="btn button-success btn-sm editbtnprd" >Ndrysho</a>';
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

    case "addPerdorues":
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $city = mysqli_real_escape_string($con, $_POST['city']);
        $adress = mysqli_real_escape_string($con, $_POST['adress']);
        $zipCode = mysqli_real_escape_string($con,$_POST['zipCode']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);

        $query = "SELECT * FROM perdoruesit WHERE email='$email' LIMIT 1";
        $result = mysqli_query($con, $query);
        $fetch = mysqli_fetch_assoc($result);
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
        } else {
            $Fjalekalimi = password_hash($password, PASSWORD_BCRYPT);
            $status = "notverified";
            $code = rand(999999, 111111);
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
                $sql = "INSERT INTO perdoruesit (fullName, id_city, adress,zipCode, phone, email, password, code, status) values ('$name', '$city', '$adress', '$zipCode','$phone', '$email', '$Fjalekalimi', '$code', '$status')";
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
            }
        }
        break;

    case "updatePerdorues":
        $uName = mysqli_real_escape_string($con,  $_POST['uName']);
        $uCity = mysqli_real_escape_string($con,  $_POST['uCity']);
        $uAdress = mysqli_real_escape_string($con,  $_POST['uAdress']);
        $uZipCode = mysqli_real_escape_string($con,  $_POST['uZipCode']);
        $uPhone = mysqli_real_escape_string($con,  $_POST['uPhone']);
        $uEmail = mysqli_real_escape_string($con,  $_POST['uEmail']);
        $uPassword = mysqli_real_escape_string($con,  $_POST['uPassword']);
        $updateIdPrd = mysqli_real_escape_string($con,  $_POST['updateIdPrd']);

        $query = "SELECT * FROM perdoruesit WHERE id=$updateIdPrd LIMIT 1";
        $sql = mysqli_query($con, $query);
        while ($row = $sql->fetch_assoc()) {
            $fjalekalimibackup = $row['password'];
            $emailbackup = $row['email'];
        }
        if ($uPassword) {
            if ($uPassword != $fjalekalimibackup) {
                if (strlen($uPassword) <= '8') {
                    $data = array(
                        'status' => 'passwordError'
                    );
                    echo json_encode($data);
                    return;
                } elseif (!preg_match("#[0-9]+#", $uPassword)) {
                    $data = array(
                        'status' => 'passwordError'
                    );
                    echo json_encode($data);
                    return;
                } elseif (!preg_match("#[A-Z]+#", $uPassword)) {
                    $data = array(
                        'status' => 'passwordError'
                    );
                    echo json_encode($data);
                    return;
                } elseif (!preg_match("#[a-z]+#", $uPassword)) {
                    $data = array(
                        'status' => 'passwordError'
                    );
                    echo json_encode($data);
                    return;
                }
                $newPassword = password_hash($uPassword, PASSWORD_BCRYPT);
            } else {
                $newPassword = $uPassword;
            }
        }
        if ($uEmail == $emailbackup) {
            $uEmail = $emailbackup;
        } else {
            $user_check_query = "SELECT * FROM perdoruesit WHERE email='$uEmail' LIMIT 1";
            $result = mysqli_query($con, $user_check_query);
            $user = mysqli_fetch_assoc($result);
            if ($user['email'] === $uEmail) {
                $data = array('status' => 'emailError');
                echo json_encode($data);
                return;
            }
        }


        $sql = "UPDATE perdoruesit SET  fullName='$uName' , id_city= '$uCity', adress='$uAdress',zipCode='$uZipCode', phone='$uPhone', email='$uEmail', password='$newPassword' WHERE id=$updateIdPrd";
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

    case "singlePerdoruesData":
        $id = $_POST['id'];
        $sql = "SELECT * FROM perdoruesit WHERE id='$id' LIMIT 1";
        $query = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($query);
        echo json_encode($row);
        break;


    case "deletePerdorues":
        $id = $_POST['id'];
        $sql = "DELETE FROM perdoruesit WHERE id=$id";
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
