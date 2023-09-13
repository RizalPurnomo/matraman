<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Apps | Puskesmas Kecamatan Matraman</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="<?php echo base_url() ?>gizi"><b>Matraman</b>Apps</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <?php if ($this->session->has_userdata('login_error')) { ?>
                    <div class="alert alert-danger">
                        <strong>Error !</strong> <?php echo $this->session->flashdata('login_error'); ?>
                    </div>
                <?php }; ?>

                <!-- <form action="<?php echo base_url() ?>assets/index3.html" method="post"> -->
                <?php echo form_open('login/do_login') ?>
                <input class="form-control" type="hidden" id="<?php echo $this->security->get_csrf_token_name() ?>" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>" />
                <div class="input-group mb-3">
                    <?php $error = form_error("username", "<div class='invalid-feedback'>", "</div>") ?>
                    <input type="text" id="username" name="username" class="form-control <?php echo $error ? 'is-invalid' : '' ?>" placeholder="User">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                    <?php echo $error; ?>
                </div>

                <div class="input-group mb-3">
                    <?php $error = form_error("pass", "<div class='invalid-feedback'>", "</div>") ?>
                    <input type="password" id="pass" name="pass" class="form-control <?php echo $error ? 'is-invalid' : '' ?>" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    <?php echo $error; ?>
                </div>
                <div class="row">
                    <div class="col-8">

                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
                <?php echo form_close(); ?>
                <!-- </form> -->

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>
</body>

</html>