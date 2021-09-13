<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

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
        height: 1150px;
        background: inherit;
        background-color: lightgray;
        border: none;
        border-radius: 10px;
        box-shadow: 5px 5px 5px rgb(0 0 0 / 35%);
    }

    #u1_text {
        font-family: 'Roboto Bold', 'Roboto Regular', 'Roboto', sans-serif;
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
        font-family: montserrat;
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
    </style>




</head>

<body>


    <?php if (session()->getFlashdata('msg')) : ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('msg'); ?></div>
    <?php endif; ?>

    <div class="container mt-4">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <h1>Login</h1>
                <hr>
                <form action="/login/auth" method="post">
                    <div class="mb-3">
                        <label for="inputemail" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="inputforemail"
                            value="<?= set_value('email'); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="inputpassword" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="inputforpassword">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
                <hr>
                <a href="/register" class="btn btn-primary">Register Page</a>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
</body>

</html>