      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">
              <div class="card card-primary card-outline">
                  <div class="card-body">
                      <div class="box-header">
                          <button type="button" class="btn btn-social-icon btn-info" title="Edit" onclick="addUser()"><i class="fa fa-edit"></i></button>
                      </div>
                      <div class="box-body table-responsive">
                          <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                  <tr>
                                      <th>No</th>
                                      <th>Id</th>
                                      <th>Username</th>
                                      <th>Email</th>
                                      <th>Last Login</th>
                                      <th>Aksi</th>
                                  </tr>
                              </thead>
                              <tbody>

                                  <?php for ($i = 0; $i < count($users); $i++) { ?>
                                      <tr>
                                          <td><?php echo $i + 1; ?></td>
                                          <td><?php echo $users[$i]['id'] ?></td>
                                          <td><?php echo $users[$i]['username'] ?></td>
                                          <td><?php echo $users[$i]['email'] ?></td>
                                          <td><?php echo $users[$i]['last_login'] ?></td>
                                          <td>
                                              <a href="#" onclick="updatePassword(<?php echo $users[$i]['id']; ?>)" title='Ganti Password'><i class="fa fa-key" aria-hidden="true"></i></a>
                                          </td>
                                      </tr>
                                  <?php } ?>
                              </tbody>
                              <tfoot>
                                  <tr>
                                      <th>No</th>
                                      <th>Id</th>
                                      <th>Username</th>
                                      <th>Email</th>
                                      <th>Last Login</th>
                                      <th>Aksi</th>
                                  </tr>
                              </tfoot>
                          </table>
                      </div>


                  </div><!-- /.card-body -->
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <div class="modal fade" id="user_modal">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title">Modal Group</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>

                  <div class="modal-body">
                      <?php if ($this->session->has_userdata('register_error')) { ?>
                          <div class="alert alert-danger">
                              <strong>Error !</strong> <?php echo $this->session->flashdata('register_error'); ?>
                          </div>
                      <?php } elseif ($this->session->has_userdata('register_success')) { ?>
                          <div class="alert alert-success">
                              <strong>Sucess !</strong> <?php echo $this->session->flashdata('register_success'); ?>
                          </div>

                      <?php } ?>

                      <?php echo form_open('sys_admin/user') ?>
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

                  </div>
              </div>
          </div>
      </div>


      <div class="modal fade" id="update_password_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Update Password</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <div class="form-group mt-3">
                          Username
                          <input type="text" class="form-control" name="upd_id_user" id="upd_id_user" placeholder="Id" required disabled>
                          <input type="text" class="form-control" name="upd_username" id="upd_username" placeholder="Username" required>
                      </div>
                      <div class="form-group mt-3">
                          Email
                          <input type="text" class="form-control" name="upd_email" id="upd_email" placeholder="Email" required>
                      </div>
                      <div class="form-group mt-3">
                          Password
                          <input type="password" class="form-control" name="upd_password" id="upd_password" placeholder="Password" required>
                          <span style="color: red">Password Minimal 6 Karakter, Harus Mengandung Huruf Besar, Huruf Kecil, Angka dan Simbol.</span>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary" onclick="savePassword()">Update Password</button>
                  </div>
              </div>
          </div>
      </div>


      <script>
          function addUser() {
              $('#user_modal').modal('show');
          }

          function updatePassword(id_user) {

              $.ajax({
                  url: '<?php echo base_url('sys_admin/user/getUserById/'); ?>' + id_user,
                  type: 'get',
                  dataType: 'json',
                  data: {
                      '<?php echo $this->security->get_csrf_token_name(); ?>': $("#<?php echo $this->security->get_csrf_token_name() ?>").val()
                  },
                  success: function(data) {
                      console.log(data);
                      $("#<?php echo $this->security->get_csrf_token_name() ?>").val(data.csrfHash);
                      $('#update_password_modal').modal('toggle');
                      $('#upd_id_user').val(data.data.id);
                      $('#upd_username').val(data.data.username);
                      $('#upd_email').val(data.data.email);
                  }
              });
          }

          function savePassword() {
              var dataArray = {
                  "username": $("#upd_username").val(),
                  "email": $("#upd_email").val(),
                  "password": $("#upd_password").val()
              }

              let r = confirm("Apakah yakin akan Mengganti Password?")
              if (r == true) {
                  id_user = $('#upd_id_user').val();
                  $.ajax({
                      type: "POST",
                      dataType: 'json',
                      data: {
                          dataArray,
                          '<?php echo $this->security->get_csrf_token_name(); ?>': $("#<?php echo $this->security->get_csrf_token_name() ?>").val()
                      },
                      url: '<?php echo base_url('sys_admin/user/do_update_password/'); ?>' + id_user,
                      success: function(result) {
                          console.log(result);
                          $("#<?php echo $this->security->get_csrf_token_name() ?>").val(result.csrfHash);
                          if (result.success === true) {
                              Swal.fire({
                                  icon: 'success',
                                  title: 'Berhasil Disimpan',
                                  text: result.messages
                              })
                              $('#update_password_modal').modal('toggle');
                          } else {
                              Swal.fire({
                                  icon: 'warning',
                                  title: 'Gagal Disimpan',
                                  text: result.messages
                              })
                              return;
                          }

                      }
                  })
              }

          }
      </script>