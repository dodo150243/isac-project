<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Boostrap -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

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
        border-radius: 5px;
    }

    .nav-link:visited {
        color: #FFFFFF;
    }

    /* content */
    .content {
        background-color: lightgrey;
        height: 1500px;
        width: auto;
    }

    #container_card {
        width: 80rem;
        height: auto;
        padding: auto;
    }


    .card-body {
        height: 1000px;
    }

    .row {
        margin-top: 1rem;
        /* justify-self: center; */
    }

    #row_seachoption {
        padding-right: 150px;
        padding-left: 180px;
        margin: 15px;
    }

    .accordion-toggle {
        color: #FFFFFF;
        background-color: #212529;
    }

    #toggle-icon {
        /* text-align: inline; */
        float: center;
    }

    #label1 {
        width: 150px;
        text-align: right;
        font-size: 16px;
        padding: 7.5px;
    }

    #label2 {
        text-align: left;
        width: 150px;
        font-size: 16px;
        padding: 7.5px;
    }

    input {
        padding: 5px;
        border-color: lightgrey;
        border-radius: 1px;

    }

    #input_label1.col {}

    #input_label2 {
        padding: 0px;
        text-align: left;
    }

    /* #input_label3 {
        width: 132px;
        text-align: left;
    } */

    input {

        font-size: 16px;
    }

    #col_seach {
        margin-bottom: 1rem;
    }

    #btn_seach {
        color: #FFFFFF;
        background-color: #1E90FF;
    }

    /* table data  */
    .row {
        /* margin-top: 40px; */
        padding: 0 10px;
    }

    .clickable {
        cursor: pointer;
    }

    .panel-heading div {
        margin-top: -18px;
        font-size: 15px;
    }

    .panel-heading div span {
        margin-left: 5px;
    }

    .panel-body {
        display: none;
    }

    /* toggle-tablesesch */
    .table tr {
        cursor: pointer;
    }

    .hiddenRow {
        padding: 0 4px !important;
        background-color: #eeeeee;
        font-size: 13px;
    }

    /* tabledata */
    .titledata,
    .contentdata {
        font-size: 14px;
    }

    .titledata {

        background-color: #212529;
        color: #FFFFFF;
    }

    th,
    td {
        text-align: center;
        vertical-align: middle;
    }

    footer,
    #footer_link {
        color: #FFFFFF;
        text-decoration: none;
    }
    </style>
    <title>Search Page</title>
</head>

<!-- <div class="container"> -->
<!-- Header -->
<nav class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">ISAC</a>
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
            <a class="nav-link" href="/home">USER</a>
        </div>
    </div>
</nav>

<!-- content  -->
<div class="content">
    <br><br>
    <div class="container" id="container_card">

        <div class="card">
            <br>
            <center>
                <h4>ค้นหาข้อมูลศิษย์เก่า</h4>
            </center>
            <div class="card-body">

                <!-- toggle-table-seach -->

                <table class="table table-condensed" style="border-collapse:collapse;">
                    <thead>
                        <tr data-toggle="collapse" data-target="#demo1" class="accordion-toggle">
                            <td id="table_title">
                                <div class="table_title">ค้นหาจาก... &nbsp;<i class="fas fa-search"
                                        id="toggle-icon"></i></div>
                            </td>
                        </tr>
                    </thead>
                    <tbody>

                        <td colspan="6" class="hiddenRow">
                            <div class="accordian-body collapse in" id="demo1" aria-expanded="true" style="">

                                <form action="/Seachdata/seach" method="post">
                                    <div class="row" id="row_seachoption">
                                        <div class="col-3" id="label1">ชื่อ</div>
                                        <div class="col" id="input_label1">
                                            <input type="text" name="name" placeholder="กรอกชื่อ">


                                        </div>
                                        <div class="col-3" id="label2">นามสกุล</div>
                                        <div class="col" id="input_label2">
                                            <input type="text" placeholder="กรอกนามสกุล">
                                        </div>
                                    </div>
                                    <div class="row" id="row_seachoption">
                                        <div class="col-3" id="label1">รหัสนักศึกษา</div>
                                        <div class="col" id="input_label1">
                                            <input type="text" placeholder="กรอกรหัสนักศึกษา">
                                        </div>
                                        <div class="col-3" id="label2">หมู่เรียน</div>
                                        <div class="col" id="input_label2">
                                            <input type="text" placeholder="กรอกหมู่เรียน">
                                        </div>
                                    </div>
                                    <div class="row" id="row_seachoption">
                                        <div class="col-3" id="label1">จังหวัด</div>
                                        <div class="col" id="input_label1">
                                            <input type="text" placeholder="กรอกจังหวัด">
                                        </div>
                                        <div class="col-3" id="label2">ปีการศึกษาแรกเข้า</div>
                                        <div class="col" id="input_label2">
                                            <input type="text" placeholder="กรอกปีการศึกษาแรกเข้า">
                                        </div>
                                    </div>
                                    <center>
                                        <div class="row">
                                            <div class="col" id="col_seach">
                                                <button type="submit" name="btnseach" class="btn" id="btn_seach">ค้นหา
                                                </button>
                                            </div>
                                    </center>

                                </form>
                            </div>
                        </td>
                    </tbody>
                </table><!-- toggle-table-seach -->


                <!-- table data  -->
                <div class="mt-3">
                    <table class="table table-bordered" id="users-list">
                        <thead>
                            <tr class="titledata">
                                <th>รหัสนักศึกษา</th>
                                <th>คำนำหน้า</th>
                                <th>ชื่อ</th>
                                <th>นามสกุล</th>
                                <th>ชื่อภาษอังกฤษ</th>
                                <th>นามสกุลอังกฤษ</th>
                                <th>คณะ</th>
                                <th>สาขาวิชา</th>
                                <th>หมู่เรียน</th>
                                <th>ปีการศึกษาแรกเข้า</th>
                                <th>จังหวัด</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($users): ?>
                            <?php foreach($users as $row): ?>
                            <tr class="contentdata">
                                <td><?php echo $row['stu_id']; ?></td>
                                <td><?php echo $row['name_prefix']; ?></td>
                                <td><?php echo $row['FName']; ?></td>
                                <td><?php echo $row['LName']; ?></td>
                                <td><?php echo $row['FName_eng']; ?></td>
                                <td><?php echo $row['LName_eng']; ?></td>
                                <td><?php echo $row['faculty']; ?></td>
                                <td><?php echo $row['section_name']; ?></td>
                                <td><?php echo $row['section_num']; ?></td>
                                <td><?php echo $row['first_year']; ?></td>
                                <td><?php echo $row['Province']; ?></td>

                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>

                    </table>

                </div>
                <!-- table data  -->

            </div>


            <!-- สำหรับลูกเล่น -->

            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <link rel="stylesheet" type="text/css"
                href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
            <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js">
            </script>


            <script>
            $(document).ready(function() {
                $('#users-list').DataTable();
            });
            </script>

            <!-- สำหรับลูกเล่น & filter -->




        </div>
        <!-- card-body -->

    </div>
    <!-- card -->

</div>
<!-- container-card -->

</div>
<!-- content -->



</div>
<!-- container -->
<!-- <br> -->
<footer class="bg-dark text-center text-lg-start">
    <!-- Copyright -->
    <div class="text-center p-3">
        © 2020 Copyright:
        <a class="text" href="#" id="footer_link">ISAC.org</a>
    </div>
    <!-- Copyright -->
</footer>
</body>

</html>