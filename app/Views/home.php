<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">


    <style>
    body {
        font-family: 'Kanit', sans-serif;
    }

    #container {
        background-color: lightgray;
        width: 100%;
        height: 670px;
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

    #u0_img {
        width: 100%;
        height: 650px;
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
    </style>



</head>

<body>

    <div id="container">

        <!-- Tag Header -->
        <nav class="navbar navbar-expand-lg bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" id="text0" href="/home">ISAC</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
        <img id="u0_img" class="img " src="http://127.0.0.1:32767/21.31.35/images/home/u0.png">

        <a href="/register">
            <div style="left: 440px; cursor: pointer;" id="u3" class="ax_default button">
                <div id="u3_div" class="" tabindex="0">

                    <div id="u3_text" class="text " style="padding-left: 44px;">
                        <p><span>ลงทะเบียน</span></p>
                    </div>
                </div>

            </div>
        </a>

        <a href="/login">
            <div style="left: 690px; cursor: pointer;" id="u3" class="ax_default button">
                <div id="u3_div" class="" tabindex="0">

                    <div id="u3_text" class="text " style="padding-left: 36px;">
                        <p><span>ลงชื่อเข้าใช้</span></p>
                    </div>
                </div>

            </div>
        </a>


    </div>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
</body>

</html>