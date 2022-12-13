<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {


?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>web tuyển dụng</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animsition/4.0.2/css/animsition.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
        <div class="header-top">
            <div class="col-xl-12">
                <div class="row d-flex justify-content-between align-items-center">
                    <div class="header-info-left">
                        <ul>     
                            <li>
                                <i class="fas fa-phone" style="color: #FFFAF0;"></i>
                                +(84) 1234-567-8910</li>
                            <li>
                                <i class="fas fa-envelope" style="color: #FFFAF0;"></i>
                                webtuyendung@gmail.com</li>
                        </ul>
                    </div>
                    <div class="header-info-right">
                        <ul class="header-social">    
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li> <a href="#"><i class="fab fa-instagram"></i></a></li>
                        <li> <a href="#"><i class="fab fa-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-navbar">
            <nav>
                <a href="#" class="logo">LOGO</a>
                <ul>
                    <li><a class="nav-link scrollto" href="#">Tìm việc làm</a></li>
                    <li><a class="nav-link scrollto" href="#">Danh sách công ty</a></li>
                    <li><a class="nav-link scrollto" href="#">Blog</a></li>
                    <li><a class="nav-link scrollto" href="#">Liên hệ</a></li>
                    <!-- <li><a class="nav-link scrollto" href="index.php"></a></li> -->
                    <li>
                        <a data-toggle="dropdown" class="nav-link scrollto" href="profile.php">
                            <div class="user" style="padding: 5px;">
                                
                                <span id="username" style="cursor: pointer; font-weight: 500; text-transform: none;"><?php echo $_SESSION['username']; ?></span>
                                &ensp;<img id="user-avt" src="img/avt.jpg" alt="" width="30px" height="30px" style="border-radius: 50%;">
                            </div>
                        </a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                                <li><a tabindex="-1" href="profile.php">Profile</a></li>
                                <li><a tabindex="-1" href="#">Another action</a></li>
                                <li><a tabindex="-1" href="index.php">Logout</a></li>
                            </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
   
     <section class="banner">
        <br><br><br><br><br><br><br><br><br><br>
        <h1>Hello condi <?php echo $_SESSION['username']; ?></h1>

        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <p style="color:aliceblue;">cod cl</p>
    </section>


    <!-- footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <div class="footer-logo">
                        <a href="#"><img src="" alt=""></a>
                    </div>
                    <p>một câu mô tả siêu dài: Chúng ta bắt đầu biết đi ngay từ khi còn bé. Vậy nên không có lý do gì khi đôi chân đang khỏe mà bạn lại phải ngồi im.</p>
                    <!-- <ul>
                        <li><a href="#">about us</a></li>
                        <li><a href="#">our services</a></li>
                        <li><a href="#">privacy policy</a></li>
                    </ul> -->
                </div>

                <div class="footer-col footer-col-mid">
                    <h4>Truy cập nhanh</h4>
                    <ul>
                        <li><a href="#">Tìm việc làm</a></li>
                        <li><a href="#">Danh sách công ty</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Liên hệ</a></li>
                    </ul>
                </div>
                <div class="footer-col footer-col-right">
                    <h4>Liên hệ với chúng tôi</h4>
                    <ul>
                        <li><p>123 Kha Vạn Cân, Linh Trung, Thủ Đức, TP HCM</p></li>
                        <li><p>Email: deobiet@gmail.com</p></li>
                        <li><p>Phone: +(84)1234-567-8910</p></li>
                    </ul>
                </div>
                <!-- <div class="footer-col-right">
                    
                </div> -->
            </div>
        </div>
    </footer>
</body>
</html>

<?php 
}else {
    header("Location: index.php");
    exit();
}
?>