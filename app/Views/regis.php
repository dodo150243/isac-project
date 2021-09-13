<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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

    <style>
    body {
        font-family: 'Kanit', sans-serif;
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


    #u0_div {

        margin-top: 50px;
        margin-bottom: 50px;
        width: 668px;
        height: 1200px;
        background: inherit;
        background-color: lightgray;
        border: none;
        border-radius: 10px;
        box-shadow: 5px 5px 5px rgb(0 0 0 / 35%);
    }

    #u1_text {
        font-weight: 700;
        font-style: normal;
        font-size: 24px;
        letter-spacing: 0.4px;
        text-align: center;
    }

    label {
        font-size: 14px;
        font-weight: 700;
        font-style: inherit;
        margin-bottom: 2px;
        display: block;
    }

    .form-row {
        display: flex;
        padding-left: 50px;
        padding-bottom: 7px;
    }


    .form-row .form-group {

        padding: 5px 2px;
    }

    .register-form {
        padding: 0 10px 55px;
    }

    .btn {
        width: 420px;
    }

    #btn {
        padding: 10px 10px 10px 10px;
    }

    .select {
        width: 60px;
        font-size: inherit;
        line-height: inherit;
        height: 30px;
    }

    #regis0 {
        padding-left: 65px;
    }

    #hr {
        border-bottom: 1px;
        font-size: 15px;
        font-weight: 700;
        margin-bottom: 2px;
        display: block;
        padding-left: 10px;
    }

    #date {
        width: 200px;
    }
    </style>


    <script>





    </script>

</head>

<body>


    <!-- Tag Header -->
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">ISAC</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <?php ini_set('display_errors', '1');  ?>
    <?php if (isset($validation)) : ?>
    <div class="alert alert-danger"><?= $validation->listErrors(); ?></div>
    <?php endif; ?>

    <div id="u0_div" class="container">
        <div>
            <p id="u1_text"><span>ลงทะเบียน</span></p>
        </div>

        <!--------------------------------------(ข้อมูลนักศึกษา)------------------------------------------------------>
        <hr>
        <form action="/register/save" method="post" class="register-form">
            <div id="hr">ข้อมูลนักศึกษา</div>

            <div class="form-row">
                <div class="form-group">
                    <label for="name" style="width: 61px;">คำนำหน้า</label>
                    <select class="select">//aria-label="Default select example">
                        <option selected>&nbsp;&nbsp;&nbsp;&nbsp;</option>
                        <option value="นาย">นาย</option>
                        <option value="น.ส.">น.ส.</option>
                        <option value="นาง">นาง</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">ชื่อ</label>
                    <input type="text" name="name" id="name" required="" value="<?= set_value('name'); ?>">
                </div>
                <div class="form-group">
                    <label for="father_name">นามสกุล</label>
                    <input type="text" name="lname" id="lname" required="" value="<?= set_value('lname'); ?>">
                </div>
            </div>

            <div class="form-row">

                <div class="form-group" id="regis0">
                    <label for="FnEng">ชื่อ(อังกฤษตัวใหญ่)</label>
                    <input type="text" name="FnEng" id="FnEng" required="" value="<?= set_value('FnEng'); ?>">
                </div>

                <div class="form-group">
                    <label for="LnEng">นามสกุล(อังกฤษตัวใหญ่)</label>
                    <input type="text" name="LnEng" id="LnEng" required="" value="<?= set_value('LnEng'); ?>">
                </div>
            </div>


            <div class="form-row">
                <div class="form-group" id="regis0">
                    <label for="name">คณะ</label>
                    <input type="text" name="stuID" id="stuID" required="" value="<?= set_value('stuID'); ?>">
                </div>

                <div class="form-group">
                    <label for="name">สาขา</label>
                    <input type="text" name="stuID" id="stuID" required="" value="<?= set_value('stuID'); ?>">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group" id="regis0">
                    <label for="name">หมู่เรียน</label>
                    <input type="text" name="stuID" id="stuID" required="" value="<?= set_value('stuID'); ?>">
                </div>
                <div class="form-group">
                    <label for="name">รหัสนักศึกษา</label>
                    <input type="text" name="stuID" id="stuID" required="" value="<?= set_value('stuID'); ?>">
                </div>
            </div>


            <div class="form-row">
                <div class="form-group" id="regis0">
                    <label for="name">ปีที่เข้าศึกษา</label>
                    <input type="date" name="stuID" id="date" required="" value="<?= set_value('stuID'); ?>">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group" id="regis0">
                    <label for="name">ระดับปีการศึกษา</label>
                    <input type="text" name="stuID" id="date" required="" value="<?= set_value('stuID'); ?>">
                </div>
            </div>

            <hr>
            <!-- ------------------------------------(ข้อมูลส่วนตัว)--------------------------------------------------------------------------- -->


            <div id="hr">ข้อมูลส่วนตัว</div>

            <div class="form-row">
                <div class="form-group" id="regis0">
                    <label for="name">วันเดือนปีเกิด</label>
                    <input type="date" name="stuID" id="date" placeholder="" required=""
                        value="<?= set_value('stuID'); ?>">
                </div>
                <div class="form-group">
                    <label for="name">จังหวัดที่เกิด</label>
                    <input type="text" name="stuID" id="date" required="" value="<?= set_value('stuID'); ?>">
                </div>
            </div>

            <div class="form-row">

                <div class="form-group" id="regis0">
                    <label for="name">สัญชาติ</label>
                    <input style="width: 98px;" type="text" name="stuID" id="date" required=""
                        value="<?= set_value('stuID'); ?>">
                </div>
                <div class="form-group">
                    <label for="name">ศาสนา</label>
                    <input style="width: 98px;" type="text" name="stuID" id="date" required=""
                        value="<?= set_value('stuID'); ?>">
                </div>
                <div class="form-group">
                    <label for="name" style="width: 61px;">กลุ่มเลือด</label>
                    <select class="select">//aria-label="Default select example">
                        <option selected>&nbsp;&nbsp;&nbsp;</option>
                        <option value="">A</option>
                        <option value="">B</option>
                        <option value="">O</option>
                        <option value="">AB</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group" id="regis0">
                    <label for="name">เบอร์โทรติดต่อ</label>
                    <input type="text" name="stuID" id="date" required="" value="<?= set_value('stuID'); ?>">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group" id="regis0">
                    <label for="name">ที่อยู่</label>
                    <input style="width: 98px;" type="text" name="stuID" id="date" required=""
                        value="<?= set_value('stuID'); ?>">
                </div>
                <div class="form-group">
                    <label for="name">ตำบล</label>
                    <input style="width: 98px;" type="text" name="stuID" id="date" required=""
                        value="<?= set_value('stuID'); ?>">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group" id="regis0">
                    <label for="name">อำเภอ</label>
                    <input style="width: 98px;" type="text" name="stuID" id="date" required=""
                        value="<?= set_value('stuID'); ?>">
                </div>
                <div class="form-group">
                    <label for="name">จังหวัด</label>
                    <input style="width: 98px;" type="text" name="stuID" id="date" required=""
                        value="<?= set_value('stuID'); ?>">
                </div>
                <div class="form-group">
                    <label for="name">รหัสไปรษณีย์</label>
                    <input style="width: 98px;" type="text" name="stuID" id="date" required=""
                        value="<?= set_value('stuID'); ?>">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group" id="regis0">
                    <label for="name">รหัสผ่าน</label>
                    <input type="password" name="Password" id="Password" required="">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group" id="regis0">
                    <label for="name">ยืนยันรหัสผ่าน</label>
                    <input type="password" name="confpassword" id="confpassword" required="">
                </div>
            </div>

            <div id="btn">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>

        </form>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
</body>

</html>