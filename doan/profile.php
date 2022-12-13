<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {


?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>web tuyển dụng</title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animsition/4.0.2/css/animsition.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.css">
    <script src="https://kit.fontawesome.com/1fda624724.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript">
        window.addEventListener("scroll", function(){
            var nav = document.querySelector("nav");
            nav.classList.toggle("sticky", window.scrollY > 0);
        })
    </script>
</head>
<body>
<header>

        <div class="header-navbar">
            <nav>
                <a href="base.php" class="logo">LOGO</a>
                <ul>
                    <li><a class="nav-link scrollto" href="#">Tìm việc làm</a></li>
                    <li><a class="nav-link scrollto" href="#">Danh sách công ty</a></li>
                    <li><a class="nav-link scrollto" href="#">Blog</a></li>
                    <li><a class="nav-link scrollto" href="#">Liên hệ</a></li>
                    <!-- <li><a class="nav-link scrollto" href="index.php"></a></li> -->
                    <li><a class="nav-link scrollto" href="profile.php">
                        <div class="user" style="padding: 5px;">
                            
                            <span id="username" style="cursor: pointer; font-weight: 500; text-transform: none;"><?php echo $_SESSION['username']; ?></span>
                            &ensp;<img id="user-avt" src="img/avt.jpg" alt="" width="30px" height="30px" style="border-radius: 50%;">
                        </div>
                    </a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section>
        <div class="container">
            <div class="row profile">
                <div class="col-md-3">
                    <div class="profile-sidebar">
                        <!-- SIDEBAR USERPIC -->
                        <div class="profile-userpic">
                            <img src="img/avt.jpg" class="img-responsive" alt="">
                        </div>
                        <!-- END SIDEBAR USERPIC -->
                        <!-- SIDEBAR USER TITLE -->
                        <div class="profile-usertitle">
                            <div class="profile-usertitle-name">
                                <?php echo $_SESSION['username']; ?>
                            </div>
                            <div class="profile-usertitle-job">
                                Developer
                            </div>
                        </div>
                        <!-- END SIDEBAR USER TITLE -->
                        <!-- SIDEBAR BUTTONS -->
                        <div class="profile-userbuttons">
                            <button type="button" class="btn btn-success btn-sm">Follow</button>
                            <button type="button" class="btn btn-danger btn-sm">Message</button>
                        </div>
                        <!-- END SIDEBAR BUTTONS -->
                        <!-- SIDEBAR MENU -->
                        <div class="profile-usermenu">
                            <ul class="nav">
                                <li class="active">
                                    <a href="#">
                                    <i class="glyphicon glyphicon-home"></i>
                                    Overview </a>
                                </li>
                                <li>
                                    <a href="#">
                                    <i class="glyphicon glyphicon-user"></i>
                                    Account Settings </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">
                                    <i class="glyphicon glyphicon-ok"></i>
                                    Tasks </a>
                                </li>
                                <li>
                                    <a href="#">
                                    <i class="glyphicon glyphicon-flag"></i>
                                    Help </a>
                                </li>
                            </ul>
                        </div>
                        <!-- END MENU -->
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="profile-content">
                    Some user related content goes here...
                    </div>
                </div>               
            </div>
        </div>

        <br>
        <br>

    </section>

</body>
</html>

<?php 
}else {
    header("Location: index.php");
    exit();
}
?>
