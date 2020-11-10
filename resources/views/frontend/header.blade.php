<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title ?? ''}}</title>
    <!--font--->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" integrity="sha384-DmABxgPhJN5jlTwituIyzIUk6oqyzf3+XuP7q3VfcWA2unxgim7OSSZKKf0KSsnh" crossorigin="anonymous">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3fa8ad4ccc.js"></script>
    <!--css-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/slider.css">
    <link rel="stylesheet" href="css/responsive.css">
    <!--End css-->

</head>
<body>
    <div class="responsive">
        <div class="container">
                <div class="logo">
                    <a href="#"><img src="img/logo.png" alt="logo"></a>
                </div>
            <div class="navbar"   >

            <div class="icon-bar" onclick="Show()">
                <i></i>
                <i></i>
                <i></i>
            </div>

<ul id="nav-lists">
    <li class="close"><span onclick="Hide()">×</span></li>
    <li><a href="{{ url('home') }}">الرئيسية</a></li>
    <li><a href="department.html">التحليل الاقتصادي</a></li>
    <li><a href="department.html">البحث العلمي </a></li>
    <li><a href="department.html">الصحة</a></li>
    <li><a href="department.html">تنمية الذات</a></li>
    <li><a href="department.html">المرأة والطفل</a></li>
    <li><a href="department.html">ثقافة دينية </a></li>
    <li><a href="department.html">علوم وفنون</a></li>
    <li><a href="department.html">اخبار المجتمع</a></li>
    <li><a href="department.html">عجائب وغرائب</a></li>
     <li><a href="department.html">السفر والسياحة</a></li>
     <li><a href="team.html">فريق التحرير</a></li>
    <li><a href="#">سياسية الخصوصية</a></li>
    <li><a href="#">القوانين والاحكام</a></li>
    <li><a href="about-as.html">عن موقع</a></li>
    <li><a href="#">من نحن</a></li>
    <li><a href="contact.html">اتصل بنا</a></li>




</ul>

</div>
</div>
</div>

<header class="upper-top">
<div class="container-fluid">
<div class="row">
    <div class="col-lg-8">
        <!--==================== right logo=============================-->
        <div class="img-header-left">
            <ul class="nav justify-content-Start">
                <li class="nav-item">
                  <a class="nav-link active" href="{{ url('index') }}">الرئيسية</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('privacy') }}">سياسة الخصوصية</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('law') }}">القوانين والأحكام</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('about') }}">عن موقع</a>
                  </li>


                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('editor') }}">فريق التحرير</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('who') }}">من نحن</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('call') }}">اتصل بنا</a>
                  </li>
              </ul>
        </div>
        <!--=================================================-->

    </div>
   <!--==================left-header-componit===============================-->

    <div class="col-lg-4 header-left">
 <!--==================Start lang===============================-->

       <!--==================  End lang===============================-->
       <!--==================  Start social===============================-->
       <div class="social ">
            <div class="row">
               <a href="" target="_blank"><i class="fab fa-facebook-f"></i></a>
               <a href="" target="_blank"><i class="fab fa-youtube"></i></a>
               <a href="" target="_blank"><i class="fab fa-twitter"></i></a>
               <a href="" target="_blank"><i class="fab fa-instagram" ></i></a>
                </div>
                </div>

       <!--==================  End social===============================-->
       <!--==================  Start search ===============================-->
       <div class="search ">
            <div class="row">
                <a href=""><i class="fas fa-search"></i></a>
                <a href=""><i class="fas fa-shopping-cart"></i></a>
                <a href=""><i class="fas fa-user-alt"></i></a>
                </div>
                </div>
       <!--==================  End search ===============================-->

    </div>
</div>
</div>
</header>
