<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    
    <meta name="author" content="">

    <title>FBB - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo base_url('hsrcc.png '); ?>" type="image/x-icon">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h3 class="text-center"><b>LOGIN  <b></h3> </br>
                                        <img src="hsrcc.png" class="rounded  mx-auto d-block" alt="Cinque Terre"><br>
                                        <p class="login-box-msg ">Fortuna Managemen Certification </p>
                                        <hr>
                                        <?php
                                        if (!empty(session()->getFlashdata('sukses'))) { ?>
                                            <div class="alert alert-success">
                                                <?php echo session()->getFlashdata('sukses'); ?>
                                            </div>
                                        <?php } ?>

                                        <?php if (!empty(session()->getFlashdata('haruslogin'))) { ?>
                                            <div class="alert alert-info">
                                                <?php echo session()->getFlashdata('haruslogin'); ?>
                                            </div>
                                        <?php } ?>

                                        <?php if (!empty(session()->getFlashdata('gagal'))) { ?>
                                            <div class="alert alert-warning">
                                                <?php echo session()->getFlashdata('gagal'); ?>
                                            </div>
                                        <?php } ?>
                                        <?php
                                        echo form_open('LoginController/cek_login');
                                        ?>
                                    </div>
                                    <form class="user">
                                        <div class="input-group mb-3">
                                            <input type="text" name="username" class="form-control" placeholder=" Username " required>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-envelope text-info"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-lock text-info"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-info btn-block">Login</button>
                                        </div>
                                    </form>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>