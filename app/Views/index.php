<?php $session = session(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <!-- Boostrap -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
    <!-- CSS -->
    <style>
    /* font/header/footer  */
    @import 'https://fonts.googleapis.com/css?family=Kanit';

    body {
        font-family: 'Kanit', sans-serif;
    }

    .navbar-brand {
        color: #FFFFFF;
        font-size: 30px;
        font-weight: bold;
        decoration: none;
    }

    .navbar-brand:hover {
        color: #FFFFFF;

    }

    a.nav-link {
        color: #FFFFFF;
        decoration: none;
    }

    .nav-link:hover {
        color: #FFFFFF;
        background-color: #1E90FF;
    }

    .nav-link:visited {
        color: #FFFFFF;
    }

    #bg-drak {
        box-shadow: 0px 5px 5px rgb(0 0 0 / 35%);
    }

    #text0 {
        padding-left: 20px;
    }

    #u0_div {

        margin-bottom: 10px;
        margin-top: 50px;
        width: 668px;
        background: inherit;
        background-color: white;
        border: none;
        border-radius: 10px;
        box-shadow: 5px 5px 5px rgb(0 0 0 / 35%);
    }

    #container {
        background-color: lightgray;
        width: 100%;

    }



    .form-row {
        display: flex;
        padding-left: 20px;
        padding-bottom: 7px;
    }


    #text {
        text-decoration: none;
        color: #FFFFFF;
    }


    #u0_img {
        width: 100%;
        height: 650px;
    }

    #u8 {
        position: absolute;
        left: 480px;
        top: 289px;
        width: 303px;
        height: 86px;
        display: flex;
        font-weight: 700;
        font-style: normal;
        font-size: 72px;
        color: #FFFFFF;
    }
    </style>

</head>

<body>

    <div id="container">
        <!-- Tag Header -->
        <nav class="navbar navbar-expand-lg bg-dark" id="bg-drak">
            <div class="container-fluid">
                <a class="navbar-brand" id="text0" href="/index">ISAC</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="/seach_page" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                ค้นหาข้อมูลศิษย์เก่า
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/seach_page">จากชื่อ</a></li>
                                <li><a class="dropdown-item" href="/seach_page">จากปีแรกเข้า</a></li>
                                <li><a class="dropdown-item" href="/seach_page">จากจังหวัด</a></li>
                                <li><a class="dropdown-item" href="/seach_page">จากหมู่เรียน</a></li>
                                <li><a class="dropdown-item" href="/seach_page">จากรหัสนักศึกษา</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/profile">ข้อมูลส่วนตัว</a>
                        </li>

                    </ul>
                    <a class="nav-link" href="/profile"><?php echo $session->get('FName_eng'); ?></a>
                </div>
            </div>
        </nav>
        <img id="u0_img" class="img " src="http://127.0.0.1:32767/22.45.45/images/index/u1.jpg">
        <div id="u8" class="ax_default heading_1">
            <div id="u8_div" class=""></div>
            <div id="u8_text" class="text ">
                <p><span>Welcome</span></p>
            </div>
        </div>
    </div>


</body>

</html>