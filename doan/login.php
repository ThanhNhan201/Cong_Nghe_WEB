
<?php
session_start();
include "db.php";
if (isset($_POST['email']) && isset($_POST['password'])) {
    function validate ($data) {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = validate($_POST['email']);
    $check_pass = validate($_POST['password']);
    $username = validate($_POST['username']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

    if (empty($email)) {
        header ("Location: index.php?error=Email is required");
        exit();
    }else if (empty($check_pass)) {
        header ("Location: index.php?error=Password is required");
        exit();
    } else {
        $sql = "SELECT * FROM user WHERE email='$email' AND password='$pass'";
        $result = mysqli_query ($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            // print_r($row);
            if ($row['email'] === $email ) {
                $_SESSION['email'] = $row['email'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['id'] = $row['id'];
                header("Location: base.php");
                exit();
            } else {
                header ("Location: index.php?error=Incorect User Name or Password");
                exit();
            }
        } else {
            header ("Location: index.php?error=Incorect User Name or Password");
            exit();
        }

    }
}else {
    header ("Location: index.php");
    exit();
}