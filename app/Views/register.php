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

    #container {
        background-color: lightgray;
        width: 100%;
        height: 1350px;
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

        margin-bottom: 10px;
        margin-top: 50px;
        width: 668px;
        background: inherit;
        background-color: white;
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
        padding-top: 25px;
    }

    label {
        font-size: 14px;
        font-weight: 600;
        font-style: inherit;

        margin-bottom: 2px;
        display: block;
    }

    input {
        font-weight: 300;
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
        padding: 0 10px 40px;
        padding-bottom: 20px;
    }

    .btn {
        width: 406px;
    }

    #btn {
        padding: 10px 10px 10px 110px;
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

    #text0 {
        padding-left: 20px;
    }

    #faculty,
    #edu_level {
        width: 200px;
    }

    #u235 {
        border-width: 0px;
        position: absolute;
        top: 130px;
        display: flex;
        font-family: 'Roboto Bold', 'Roboto Regular', 'Roboto', sans-serif;
        font-weight: 700;
        font-style: normal;
        font-size: 15px;
    }

    footer,
    #footer_link {
        color: #FFFFFF;
        text-decoration: none;
    }

    #backto {
        font-family: 'Kanit', sans-serif;
        font-weight: 300;

    }
    </style>



</head>

<body>

    <div id="container">

        <!-- Tag Header -->
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
        <?php ini_set('display_errors', '1');  ?>
        <?php if (isset($validation)) : ?>
        <div class="alert alert-danger"><?= $validation->listErrors(); ?></div>
        <?php endif; ?>

        <div id="u0_div" class="container">


            <!--------------------------------------(ข้อมูลนักศึกษา)------------------------------------------------------>

            <form action="/register/save" method="post" class="register-form">

                <a style="color:black" href="/home">
                    <div id="u235" class="ax_default label" style="cursor: pointer;">
                        <div id="u235_text" class="text ">
                            <p id="backto"><span>
                                    <&nbsp;back </span>
                            </p>
                        </div>
                    </div>
                </a>
                <!-- <div id="hr">ข้อมูลนักศึกษา</div> -->
                <div id="u1_text">
                    <p><span>ลงทะเบียนศิษย์เก่า</span></p>
                </div>
                <hr>
                <div id="hr">ข้อมูลนักศึกษา</div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="name" style="width: 61px;">คำนำหน้า</label>
                        <select class="select" id="name_prefix" name="name_prefix">
                            <option selected>&nbsp;&nbsp;&nbsp;&nbsp;</option>
                            <option value="นาย">นาย</option>
                            <option value="น.ส.">น.ส.</option>
                            <option value="นาง">นาง</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">ชื่อ</label>
                        <input type="text" name="FName" id="FName" required="" value="<?= set_value('FName'); ?>">
                    </div>
                    <div class="form-group">
                        <label for="father_name">นามสกุล</label>
                        <input type="text" name="LName" id="LName" required="" value="<?= set_value('lName'); ?>">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group" id="regis0">
                        <label for="FnEng">ชื่อ(อังกฤษตัวใหญ่)</label>
                        <input type="text" name="FName_eng" id="FName_eng" required=""
                            value="<?= set_value('FName_eng'); ?>" onkeyup="upperCharacter()">
                    </div>

                    <div class="form-group">
                        <label for="LnEng">นามสกุล(อังกฤษตัวใหญ่)</label>
                        <input type="text" name="LName_eng" id="LName_eng" required=""
                            value="<?= set_value('LName_eng'); ?>" onkeyup="upperCharacter()">
                    </div>
                </div>


                <div class="form-row">
                    <div class="form-group" id="regis0">
                        <label for="name">รหัสนักศึกษา</label>
                        <input type="text" name="stu_id" id="stu_id" required="" value="<?= set_value('stu_id'); ?>">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group" id="regis0">
                        <label for="name">รหัสผ่าน</label>
                        <input type="password" name="password" id="password" required="">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group" id="regis0">
                        <label for="name">ยืนยันรหัสผ่าน</label>
                        <input type="password" name="confpassword" id="confpassword" required="">
                    </div>
                </div>

                <hr>
                <div id="hr">ข้อมูลส่วนตัว</div>




                <div class="form-row">
                    <div class="form-group" id="regis0">
                        <label for="FnEng">เลขบัตรประชาชน</label>
                        <input type="text" name="id_cardnumber" id="id_cardnumber" required=""
                            value="<?= set_value('id_cardnumber'); ?>">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group" id="regis0">
                        <label for="faculty">คณะ</label>
                        <select class="select" id="faculty" name="faculty">
                            <option selected>&nbsp;&nbsp;&nbsp;&nbsp;</option>
                            <option value="คณะวิทยาศาสตร์และเทคโนโลยี">คณะวิทยาศาสตร์และเทคโนโลยี</option>
                            <option value="คณะมนุษยศาสตร์และสังคมศาสตร์">คณะมนุษยศาสตร์และสังคมศาสตร์</option>
                            <option value="คณะครุศาสตร์">คณะครุศาสตร์</option>
                            <option value="คณะวิทยาการจัดการ">คณะวิทยาการจัดการ</option>
                            <option value="คณะพยาบาลศาสตร์">คณะพยาบาลศาสตร์</option>
                        </select>
                        <!-- <input type="text" name="faculty" id="faculty" required="" value="<?//= set_value('faculty'); ?>"> -->
                    </div>

                    <div class="form-group">
                        <label for="name">สาขา</label>
                        <input type="text" name="section_name" id="section_name" required=""
                            value="<?= set_value('section_name'); ?>">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group" id="regis0">
                        <label for="name">หมู่เรียน</label>
                        <input type="text" name="section_num" id="section_num" required=""
                            value="<?= set_value('section_num'); ?>">
                    </div>
                    <div class="form-group">
                        <label for="name">ปีที่เข้าศึกษา</label>
                        <input type="text" name="first_year" id="first_year" required=""
                            value="<?= set_value('first_year'); ?>">
                    </div>
                </div>


                <div class="form-row">
                    <div class="form-group" id="regis0">
                        <label for="name">วุฒิการศึกษาสูงสุด</label>
                        <select class="select" id="edu_level" name="edu_level">
                            <option selected>&nbsp;&nbsp;&nbsp;&nbsp;</option>
                            <!-- <option value="ประถมศึกษา">ประถมศึกษา</option>
                            <option value="มัธยมศึกษาหรือเทียบเท่า">มัธยมศึกษา หรือ เทียบเท่า</option> -->
                            <option value="ปริญญาตรี หรือเทียบเท่า">ปริญญาตรี หรือ เทียบเท่า</option>
                            <option value="ปริญญาโท">ปริญญาโท</option>
                            <option value="สูงกว่าปริญญาโท">สูงกว่าปริญญาโท</option>
                        </select>
                        <!-- <input type="text" name="edu_level" id="edu_level" required=""
                            value="<?//= set_value('edu_level'); ?>"> -->
                    </div>
                </div>




                <!-- ------------------------------------(ข้อมูลส่วนตัว)--------------------------------------------------------------------------- -->




                <div class="form-row">
                    <div class="form-group" id="regis0">
                        <label for="name">วันเดือนปีเกิด</label>
                        <input style="width: 200px; height:30px" type="date" name="d_m_y_birth" id="d_m_y_birth"
                            placeholder="" required="" value="<?= set_value('d_m_y_birth'); ?>">
                    </div>
                    <div class="form-group">
                        <label for="name">จังหวัดที่เกิด</label>
                        <input type="text" name="province_birth" id="province_birth" required=""
                            value="<?= set_value('province_birth'); ?>">
                    </div>
                </div>

                <div class="form-row">

                    <div class="form-group" id="regis0">
                        <label for="name">สัญชาติ</label>
                        <input style="width: 98px;" type="text" name="nationality" id="nationality" required=""
                            value="<?= set_value('nationality'); ?>">
                    </div>
                    <div class="form-group">
                        <label for="name">ศาสนา</label>
                        <input style="width: 98px;" type="text" name="religion" id="religion" required=""
                            value="<?= set_value('religion'); ?>">
                    </div>
                    <div class="form-group">
                        <label for="name" style="width: 61px;">กลุ่มเลือด</label>
                        <select class="select" name="blood_type" id="blood_type">//aria-label="Default select example">
                            <option selected>&nbsp;&nbsp;&nbsp;</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="O">O</option>
                            <option value="AB">AB</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group" id="regis0">
                        <label for="name">เบอร์โทรติดต่อ</label>
                        <input type="text" name="phone_number" id="phone_number" required=""
                            value="<?= set_value('phone_number'); ?>">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group" id="regis0">
                        <label for="name">ที่อยู่</label>
                        <input style="width: 98px;" type="text" name="Address" id="Address" required=""
                            value="<?= set_value('Address'); ?>">
                    </div>
                    <div class="form-group">
                        <label for="name">ตำบล</label>
                        <input style="width: 98px;" type="text" name="SubDistrict" id="SubDistrict" required=""
                            value="<?= set_value('SubDistrict'); ?>">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group" id="regis0">
                        <label for="name">อำเภอ</label>
                        <input style="width: 98px;" type="text" name="District" id="District" required=""
                            value="<?= set_value('District'); ?>">
                    </div>
                    <div class="form-group">
                        <label for="name">จังหวัด</label>
                        <input style="width: 98px;" type="text" name="Province" id="Province" required=""
                            value="<?= set_value('Province'); ?>">
                    </div>
                    <div class="form-group">
                        <label for="name">รหัสไปรษณีย์</label>
                        <input style="width: 98px;" type="text" name="Zipcode" id="Zipcode" required=""
                            value="<?= set_value('Zipcode'); ?>">
                    </div>
                </div>



                <div id="btn">
                    <button type="submit" class="btn btn-primary">ลงทะเบียน</button>
                </div>

            </form>

        </div>


    </div>
    <!-- <br> -->
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
    <script>
    function upperCharacter() {
        var x = document.getElementById("FName_eng");
        var y = document.getElementById("LName_eng");
        x.value = x.value.toUpperCase();
        y.value = y.value.toUpperCase();
    }
    </script>
</body>

</html>