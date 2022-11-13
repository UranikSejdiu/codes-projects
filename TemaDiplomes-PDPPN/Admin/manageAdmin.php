<?php
include('config.php');

switch ($_POST["action"]) {

    case "fetchalladmindata":

        $output = array();
        $sql = "SELECT * FROM admin";

        $totalQuery = mysqli_query($con, $sql);
        $total_all_rows = mysqli_num_rows($totalQuery);

        if (isset($_POST['search']['value'])) {
            $search_value = $_POST['search']['value'];
            $sql .= " WHERE name like '" . $search_value . "%'";
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
            $sub_array[] = $row['name'];
            $sub_array[] = $row['email'];
            $sub_array[] = '<textarea disabled style="overflow-y: auto;resize: none;border: none;">' . $row['password'] . '</textarea>';
            $sub_array[] = $row['status'];
            $sub_array[] = '<a href="javascript:void(0);" data-id="' . $row['id'] . '"  class="btn button-success btn-sm editbtnadmin" >Ndrysho</a>';
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

    case "addAdmin":
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

        $query = "SELECT * FROM admin WHERE email='$email' LIMIT 1";
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
        } elseif ($password != $cpassword) {
            $data = array(
                'status' => 'passwordVerify'
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
            $sql = "INSERT INTO admin (name, email, password, code, status) values ('$name', '$email', '$Fjalekalimi', '$code', '$status')";
            $query = mysqli_query($con, $sql);
            if ($query) {
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

    case "updateAdmin":
        $updateName = mysqli_real_escape_string($con,  $_POST['updateName']);
        $updateEmail = mysqli_real_escape_string($con,  $_POST['updateEmail']);
        $updateidadmin = mysqli_real_escape_string($con,  $_POST['updateidadmin']);
        $updatePassword = mysqli_real_escape_string($con,  $_POST['updatePassword']);
        $updateCpassword = mysqli_real_escape_string($con,  $_POST['updateCpassword']);

        $query = "SELECT * FROM admin WHERE id=$updateidadmin LIMIT 1";
        $sql = mysqli_query($con, $query);
        while ($row = $sql->fetch_assoc()) {
            $fjalekalimibackup = $row['password'];
            $emailbackup = $row['email'];
        }
        if ($updatePassword == $updateCpassword) {
                if (strlen($updatePassword) < '8') {
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
                $data = array(
                    'status' => 'passwordVerify'
                );
                echo json_encode($data);
                return;
            }
        
        if ($updateEmail == $emailbackup) {
            $updateEmail = $emailbackup;
        } else {
            $user_check_query = "SELECT * FROM admin WHERE email='$updateEmail' LIMIT 1";
            $result = mysqli_query($con, $user_check_query);
            $user = mysqli_fetch_assoc($result);
            if ($user['email'] === $updateEmail) {
                $data = array('status' => 'emailError');
                echo json_encode($data);
                return;
            }
        }


        $sql = "UPDATE admin SET  name='$updateName' , email= '$updateEmail', password='$newPassword' WHERE id=$updateidadmin";
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
    
    case "singleAdminData":
        $id = $_POST['id'];
        $sql = "SELECT * FROM admin WHERE id='$id' LIMIT 1";
        $query = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($query);
        echo json_encode($row);
        break;


    case "deleteAdmin":
        $id = $_POST['id'];
        $sql = "DELETE FROM admin WHERE id=$id";
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
