<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Kepegawaian | Registration Page</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="<?= base_url(); ?>"><b>Sistem </b>Kepegawaian</a>
        </div>

        <div class="card card-primary card-outline">
            <div class="card-body register-card-body">
                <!-- <p class="login-box-msg">Register a new membership</p> -->

                <form action="<?= base_url('auth/registration'); ?>" method="post">
                    <div class="form-group">                    
                        <div class="input-group">
                            <input type="text" class="form-control" name="nama"  placeholder="Nama Lengkap">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">                    
                        <div class="input-group">
                            <input type="text" class="form-control" name="username" placeholder="Username">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">                    
                        <div class="input-group">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">                    
                        <div class="input-group">
                            <input type="password" class="form-control" name="confirm_password" placeholder="Retype password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <?= form_error('confirm_password', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="row">
                        
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="mt-3 mb-0 text-center">
                    Punya Akun? 
                    <a href="<?= base_url('auth'); ?>" class="text-center">Login</a>
                </p>
            </div>
            <!-- /.form-box -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="<?= base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/'); ?>dist/js/adminlte.min.js"></script>
</body>

</html>