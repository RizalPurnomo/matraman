      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="card card-primary card-outline">
            <div class="card-body">

              <?php if ($this->session->has_userdata('register_error')) { ?>
                  <div class="alert alert-danger">
                      <strong>Error !</strong> <?php echo $this->session->flashdata('register_error'); ?>
                  </div>
              <?php } elseif ($this->session->has_userdata('register_success')) { ?>
                  <div class="alert alert-success">
                      <strong>Sucess !</strong> <?php echo $this->session->flashdata('register_success'); ?>
                  </div>

              <?php } ?>

              <?php echo form_open('dashboard/user/register') ?>
              <div class="input-group mb-3">
                  <?php $error = form_error("user", "<div class='invalid-feedback'>", "</div>") ?>
                  <input type="text" id="user" name="user" class="form-control <?php echo $error ? 'is-invalid' : '' ?>" placeholder="User">
                  <div class="input-group-append">
                      <div class="input-group-text">
                          <span class="fas fa-user"></span>
                      </div>
                  </div>
                  <?php echo $error; ?>
              </div>

              <div class="input-group mb-3">
                  <?php $error = form_error("email", "<div class='invalid-feedback'>", "</div>") ?>
                  <input type="email" id="email" name="email" class="form-control <?php echo $error ? 'is-invalid' : '' ?>" placeholder="Email">
                  <div class="input-group-append">
                      <div class="input-group-text">
                          <span class="fas fa-envelope"></span>
                      </div>
                  </div>
                  <?php echo $error; ?>
              </div>

              <div class="input-group mb-3">
                  <?php $error = form_error("pass1", "<div class='invalid-feedback'>", "</div>") ?>
                  <input type="password" id="pass1" name="pass1" class="form-control <?php echo $error ? 'is-invalid' : '' ?>" placeholder="Password">
                  <div class="input-group-append">
                      <div class="input-group-text">
                          <span class="fas fa-lock"></span>
                      </div>
                  </div>
                  <?php echo $error; ?>
              </div>

              <div class="input-group mb-3">
                  <?php $error = form_error("pass2", "<div class='invalid-feedback'>", "</div>") ?>
                  <input type="password" id="pass2" name="pass2" class="form-control <?php echo $error ? 'is-invalid' : '' ?>" placeholder="Password">
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
                      <button type="submit" class="btn btn-primary btn-block">Register</button>
                  </div>
                  <!-- /.col -->
              </div>
              <?php echo form_close(); ?>


            </div><!-- /.card-body -->
          </div>
        </div><!-- /.container-fluid -->
      </section>
