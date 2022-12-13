
<?php 

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';



@include "db.php";
if(isset($_POST['submit'])){

  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $check_pass = $_POST['password'];
  $username = $_POST['username'];
  // $username = mysqli_real_escape_string($conn, $_POST['username']);
  $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
  $re_pass = md5($_POST['re_password']);
  $fullname = $_POST['fullname'];
  $phone = $_POST['phone'];
  $company = $_POST['company'];
  $workplace = $_POST['workplace'];
  $company_location = $_POST['company_location'];
  $code = mysqli_real_escape_string($conn, md5(rand()));

  $select = "SELECT * FROM user WHERE email='$email' AND password='$pass'";

  $result = mysqli_query($conn, $select);


  if (empty($email) || empty($check_pass)){
    $error[] = 'Email or password is not empty!';
  } else {
    if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE email='{$email}'")) > 0){
      $error[] = 'This Email has been already exist!';
    } else {
      if($pass != $re_pass){
        $error[] = 'password not matched!';
      }else {
        if (strlen($check_pass) < 8){
          $error[] = 'Mật khẩu phải trên 8 chữ số!';
        }else {
        $insert = "INSERT INTO user (email, username, password, fullName, phone, company, workplace, company_location, code) VALUES ('$email', '$username', '$pass', '$fullname',
        '$phone', '$company', '$workplace', '$company_location', '$code')";
        mysqli_query($conn, $insert);
        $error[] = "Đã gửi yêu cầu xác thực tài khoản vào email! Vui lòng kiểm tra email để đăng nhập.";
        echo "<div style='display: none;'>";
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'nhanthanh021201@gmail.com';                     //SMTP username
            $mail->Password   = 'tynrkyptahbvdzdi';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('nhanthanh021201@gmail.com');
            $mail->addAddress($email);     

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'No reply';
            $mail->Body    = 'Đây là link xác thực tài khoản <b><a href="http://localhost/doan/?verification'.$code.'">http://localhost/doan?verification'.$code.'</a></b>';

            $mail->send();
            echo 'Message has been sent';
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            echo "</div>";
      }
    }
  }

}

}

?>


<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>


    <script src="https://kit.fontawesome.com/1fda624724.js"></script>
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <section class="h-100">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col" style="margin: 0 150px">
          <div class="card card-registration my-4">
                <div class="card-body p-md-5 text-black">
                  <form action="" method="post">
                    <h2 class="mb-4 align-items-center text-uppercase">register</h2>
                    <?php 
                    if (isset($error)) {
                      foreach($error as $error) {
                        echo '<span  class="error2">'.$error.'</span>';
                      }
                    }
                    ?>

                    <br><br>
                    <h5 class="col-sm-3 cluster mb-6 text-uppercase">Tài khoản</h5>
                    
                    <br>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Email: </label>
                      <div class="col-sm-9">
                      <input type="email" name="email" id="form3Example1n" class="form-control col-form-label" placeholder="Nhập địa chỉ email" value="<?php if (isset($email)) {echo $email;} ?>"/>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Username:</label>
                      <div class="col-sm-9">
                      <input type="text" name="username" class="form-control col-form-label" placeholder="Nhập username "/>
                      </div>
                    </div>
                    
                      <div class="form-group row">
                        <label for="inputPassword" class="col-sm-3 col-form-label">Mật khẩu:</label>
                        <div class="col-sm-9">
                          <input type="password" name="password" class="form-control" placeholder="Mật khẩu (từ 8 đến 35 kí tự)">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputPassword" class="col-sm-3 col-form-label">Xác thực mật khẩu: </label>
                        <div class="col-sm-9">
                          <input type="password" name="re_password"  class="form-control" id="inputPassword" placeholder="Nhập lại mật khẩu">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Họ và tên:</label>
                        <div class="col-sm-9">
                          <input type="text" name = "fullname" class="form-control" placeholder="Họ tên">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Số điện thoại cá nhân:</label>
                        <div class="col-sm-9">
                          <input type="text" name = "phone" class="form-control" placeholder="Số điện thoại cá nhân">
                        </div>
                      </div>
                      <br>
                      
                      <h5 class="col-sm-5 cluster3 mb-6 text-uppercase">Thông tin tuyển dụng</h5>
                      <br>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Công ty:</label>
                        <div class="col-sm-9">
                          <input type="text" name = "company" class="form-control" placeholder="Tên công ty">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Vị trí công tác:</label>
                        <div class="col-sm-9">
                          <input type="text" name = "workplace" class="form-control" placeholder="Nhập vị trí công tác của bạn">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Địa chỉ công ty:</label>
                        <div class="col-sm-9">
                          <input type="text" name = "company_location" class="form-control" placeholder="Nhập địa chỉ công ty">
                        </div>
                      </div>
                      <br>
                      <div class="form-group row">
                        <p style="padding-left: 15px;">Bạn đã có tài khoản?&ensp;</P><a href="index.php">Đăng nhập ngay</a>
                      </div>
                      <br>
                    <div class="d-flex justify-content-end pt-3">
                      <!-- <button type="button" class="btn btn-light btn-lg">Reset all</button> -->
                      <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">SIGN IN</button>
                    </div>
                  </form>
                </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
</html>