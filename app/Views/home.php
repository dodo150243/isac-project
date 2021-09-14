<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- Boostrap -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
    <style>
    body {
        font-family: 'Kanit', sans-serif;
    }
    }

    #container {
        /* background-color: lightgray; */

        width: auto;

        /* height: 670px; */
    }

    .navbar-brand {
        color: #FFFFFF;
        font-size: 30px;
        font-weight: bold;
        left: 10px;
    }

    .navbar-brand:hover {
        color: #FFFFFF;

    }

    .nav-link:hover {
        color: #FFFFFF;
        background-color: #1E90FF;
    }

    .nav-link:visited {
        color: #FFFFFF;
    }

    .bg-dark {
        box-shadow: 0px 5px 5px rgb(0 0 0 / 35%);
    }

    #text0 {
        padding-left: 20px;
    }

    .carousel-itemimg {
        /* height: 100px; */
    }

    #u3 {
        position: absolute;
        left: 259px;
        top: 297px;
        width: 223px;
        display: flex;
        font-weight: 700;
        font-size: 28px;
        color: #FFFFFF;
    }

    #u3_div {
        border-width: 0px;
        position: absolute;
        top: 0px;
        width: 223px;
        height: 59px;
        background: inherit;
        background-color: rgba(85, 85, 85, 1);
        box-sizing: border-box;
        border-width: 1px;
        border-style: solid;
        border-color: rgba(85, 85, 85, 1);
        border-radius: 5px;
        -moz-box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.6039215686274509);
        -webkit-box-shadow: 5px 5px 5px rgb(0 0 0 / 60%);
        box-shadow: 5px 5px 5px rgb(0 0 0 / 60%);
        font-weight: 700;
        font-style: normal;
        font-size: 28px;
        color: #FFFFFF;
    }

    #u3 .text {
        position: absolute;
        padding: 5px;

    }

    #u3_text {
        border-width: 0px;
        word-wrap: break-word;
        text-transform: none;
    }

    a {
        text-decoration: none;
        color: #FFFFFF;
    }

    a:hover {
        color: darkgray;
    }

    footer,
    #footer_link {
        color: #FFFFFF;
        text-decoration: none;
    }

    #bt-home {
        padding: 100px;
    }

    #carouselExampleCaptions {
        padding: auto;
    }

    .carousel {
        padding: 10px 0;
    }

    .w-100 {
        width: 100% !important;
        height: auto;
    }
    </style>



</head>

<body>

    <div id="container">

        <!-- Tag Header -->
        <!-- <nav class="navbar navbar-expand-lg bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" id="text0" href="/home">ISAC</a>
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
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav> -->
        <nav class="navbar navbar-expand-lg bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="/home">ISAC</a>
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
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="/profile">ข้อมูลส่วนตัว</a>
                        </li> -->

                    </ul>
                    <!-- <a class="nav-link" href="">USER</a> -->
                </div>
            </div>
        </nav>

        <div>
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>

                <div class="carousel-inner">


                    <div class="carousel-item active">
                        <img src="/img/home.jpg" class="d-block w-100" alt="home">
                    </div>
                    <div class="carousel-item">
                        <img src="/img/home2.jpg" class="d-block w-100" alt="home2">
                    </div>
                    <div class="carousel-item">
                        <img src="/img/home3.jpg" class="d-block w-100" alt="home3">
                    </div>




                </div>
                <a href="/register">
                    <div style="left: 700px; top:340px; cursor: pointer;" id="u3" class="ax_default button">
                        <div id="u3_div" class="" tabindex="0">

                            <div id="u3_text" class="text " style="padding-left: 44px;">
                                <p><span>ลงทะเบียน</span></p>
                            </div>
                        </div>

                    </div>
                </a>

                <a href="/login">
                    <div style="left: 1000px; top:340px; cursor: pointer;" id="u3" class="ax_default button">
                        <div id="u3_div" class="" tabindex="0">

                            <div id="u3_text" class="text " style="padding-left: 36px;">
                                <p><span>ลงชื่อเข้าใช้</span></p>
                            </div>
                        </div>

                    </div>
                </a>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>





            <!-- <div class="content">
            
            </div> -->




        </div>
    </div>

    <footer class="bg-dark text-center text-lg-start">
        <!-- Copyright -->
        <div class="text-center p-3">
            © 2020 Copyright:
            <a class="text" href="#" id="footer_link">ISAC.org</a>
        </div>
        <!-- Copyright -->
    </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
</body>

</html>