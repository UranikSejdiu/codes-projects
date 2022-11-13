<?php
session_start();
require "config.php";
$email = "";
$name = "";
$errors = array();

//if user signup button
if (isset($_POST['signup'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $fiskal = mysqli_real_escape_string($con, $_POST['fiskal']);
    $lokacioni = mysqli_real_escape_string($con, $_POST['lokacioni']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

    if ($password !== $cpassword) {
        $errors['password'] = "Fjalëkalimi jo i njejtë!";
    }

    $email_check = "SELECT * FROM kompanite WHERE email = '$email'";
    $res = mysqli_query($con, $email_check);
    if (mysqli_num_rows($res) > 0) {
        $errors['email'] = "Email-i ekziston në sistemin tonë!";
    }
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
        $errors['password'] = "Plotëso kërkesat e fjalëkalimit!";
        return;
    } elseif (!preg_match("#[0-9]+#", $password)) {
        $errors['password'] = "Plotëso kërkesat e fjalëkalimit!";
        return;
    } elseif (!preg_match("#[A-Z]+#", $password)) {
        $errors['password'] = "Plotëso kërkesat e fjalëkalimit!";
        return;
    } elseif (!preg_match("#[a-z]+#", $password)) {
        $errors['password'] = "Plotëso kërkesat e fjalëkalimit!";
        return;
    } elseif ($file_name && in_array($ext, $extensions) === false) {
        $errors['format'] = "Provoni njërin nga formatet e lejuara!";
        return;
    } elseif ($file_size > 5097152) {
        $errors['madhesia'] = "Logoja kalon madhësinë e lejuar prej 5MB!";
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
                $info = "Kodi për verifikim të email-it u dërgua - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: user-otp.php');
                exit();
            } else {
                $errors['otp-error'] = "Gabim gjatë dërgimit të kodit!";
            }
        } else {
            $errors['db-error'] = "Gabim gjatë procesimit me databazë!";
        }
    }
}
//if user click verification code submit button
if (isset($_POST['check'])) {
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
    $check_code = "SELECT * FROM kompanite WHERE code = $otp_code";
    $code_res = mysqli_query($con, $check_code);
    if (mysqli_num_rows($code_res) > 0) {
        $fetch_data = mysqli_fetch_assoc($code_res);
        $fetch_code = $fetch_data['code'];
        $email = $fetch_data['email'];
        $code = 0;
        $status = 'verified';
        $update_otp = "UPDATE kompanite SET code = $code, status = '$status' WHERE code = $fetch_code";
        $update_res = mysqli_query($con, $update_otp);
        if ($update_res) {
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            header('location: home.php');
            exit();
        } else {
            $errors['otp-error'] = "Gabim ne databazë!";
        }
    } else {
        $errors['otp-error'] = "Kodi është gabim!";
    }
}

//if user click login button
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $check_email = "SELECT * FROM kompanite WHERE email = '$email'";
    $res = mysqli_query($con, $check_email);
    if (mysqli_num_rows($res) > 0) {
        $fetch = mysqli_fetch_assoc($res);
        $fetch_pass = $fetch['password'];
        if (password_verify($password, $fetch_pass)) {
            $_SESSION['email'] = $email;
            $status = $fetch['status'];
            if ($status == 'verified') {
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                $_SESSION['id'] = $id;
                header('location: home.php');
            } else {
                $info = "Ende nuk keni verifikuar Email adresen - $email";
                $_SESSION['info'] = $info;
                header('location: user-otp.php');
            }
        } else {
            $errors['email'] = "Email-i ose fjalekalimi gabim!";
        }
    } else {
        $errors['email'] = "Ju ende nuk keni llogari! Krijo llogari përmes linkut më posht.";
    }
}

//if user click continue button in forgot password form
if (isset($_POST['check-email'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $check_email = "SELECT * FROM kompanite WHERE email='$email'";
    $run_sql = mysqli_query($con, $check_email);
    $fetch_info = mysqli_fetch_assoc($run_sql);
    if (mysqli_num_rows($run_sql) > 0) {
        $name = $fetch_info['name'];
        $code = rand(999999, 111111);
        $insert_code = "UPDATE kompanite SET code = $code WHERE email = '$email'";
        $run_query =  mysqli_query($con, $insert_code);
        if ($run_query) {
            $subject = "Kodi për përditsimin e fjalëkalimit";
            $message = ' <body style="margin: 0;">
            <div style="box-sizing: inherit; border-width: 0; border-style: solid; border-color: #dae1e7; background-color: #f1f5f8; font-family: system-ui,BlinkMacSystemFont,-apple-system,Segoe UI,Roboto,Oxygen,Ubuntu,Cantarell,Fira Sans,Droid Sans,Helvetica Neue,sans-serif; min-height: 100vh; padding-left: 1rem; padding-right: 1rem; padding-top: 2rem; padding-bottom: 2rem;">
              <div style="box-sizing: inherit; border-width: 0; border-style: solid; border-color: #dae1e7; margin-left: auto; margin-right: auto; max-width: 40rem;">
                <div style="box-sizing: inherit; border-width: 0; border-style: solid; border-color: #dae1e7; background-color: #fff; padding: 2rem; box-shadow: 0 4px 8px 0 rgba(0,0,0,.12),0 2px 4px 0 rgba(0,0,0,.08);">
                  <div style="box-sizing: inherit; border-width: 0; border-style: solid; border-color: #dae1e7; border-bottom-width: 1px; text-align: center; letter-spacing: .05em;">
                    <div style="box-sizing: inherit; border-width: 0; border-style: solid; border-color: #dae1e7; font-weight: 700; color: #e3342f; font-size: .875rem;">PDPPN</div>
                    <h1 style="box-sizing: inherit; border-width: 0; border-style: solid; border-color: #dae1e7; align-items: center; justify-content: center; font-size: 1.875rem;">Përditësimi i fjalëkalimit të llogarisë</h1>
                  </div>
                  <div style="box-sizing: inherit; border-width: 0; border-style: solid; border-color: #dae1e7; border-bottom-width: 1px; padding-top: 2rem; padding-bottom: 2rem;">
                    <p style="box-sizing: inherit; border-width: 0; border-style: solid; border-color: #dae1e7; margin: 0;">
                      Përshendetje ' . $name . ',<br style="box-sizing: inherit; border-width: 0; border-style: solid; border-color: #dae1e7;"><br style="box-sizing: inherit; border-width: 0; border-style: solid; border-color: #dae1e7;">Përdor kodin më posht për të përditsuar fjalëkalimin dhe pastaj mund të kyçeni në platformën tonë.</p>
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
                $info = "U dërgua kodi për përditsimin e fjalëkalimit tuaj në email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                header('location: reset-code.php');
                exit();
            } else {
                $errors['otp-error'] = "Gabim gjatë dërgimit të kodit!";
            }
        } else {
            $errors['db-error'] = "Gabim në databazë!";
        }
    } else {
        $errors['email'] = "Ky email nuk ekziston!";
    }
}

//if user click check reset otp button
if (isset($_POST['check-reset-otp'])) {
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
    $check_code = "SELECT * FROM kompanite WHERE code = $otp_code";
    $code_res = mysqli_query($con, $check_code);
    if (mysqli_num_rows($code_res) > 0) {
        $fetch_data = mysqli_fetch_assoc($code_res);
        $email = $fetch_data['email'];
        $_SESSION['email'] = $email;
        $info = "Vendosni fjalëkalimin e ri.";
        $_SESSION['info'] = $info;
        header('location: new-password.php');
        exit();
    } else {
        $errors['otp-error'] = "Kodi është gabim!";
    }
}

//if user click change password button
if (isset($_POST['change-password'])) {
    $_SESSION['info'] = "";
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    if ($password !== $cpassword) {
        $errors['password'] = "Vendosni fjalëkalimin e njejtë!";
    } else {
        $code = 0;
        $email = $_SESSION['email']; //getting this email using session
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $update_pass = "UPDATE kompanite SET code = $code, password = '$encpass' WHERE email = '$email'";
        $run_query = mysqli_query($con, $update_pass);
        if ($run_query) {
            $info = "Fjalëkalimi juaj u përditsua me sukses.";
            $_SESSION['info'] = $info;
            header('Location: password-changed.php');
        } else {
            $errors['db-error'] = "Gabim gjatë përditsimit të fjalëkalimit tuaj!";
        }
    }
}

//if login now button click
if (isset($_POST['login-now'])) {
    header('Location: index.php');
}
