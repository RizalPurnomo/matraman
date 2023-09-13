<?php $this->load->view('admin/v_header'); ?>
<?php $this->load->view('admin/v_sidebar'); ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Import</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Import</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Import Master Pasien
                            </h3>
                            <div class="card-tools">

                            </div>
                        </div><!-- /.card-header -->
                        <div class="card-body">

                            <div id="alert_type" class="alert alert-dismissable" style="display:none;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p id="alert_message"></p>
                            </div>

                            <?php echo form_open('#', array('id' => 'formImportData', 'role' => 'form')) ?>

                            <div class="form-group">
                                <label>Upload File Master Pasien</label>
                                <input type="file" id="file_excel" name="file_excel" multiple="" class="form-control">

                                <p class="help-block">Gunakan file dengan format .xls</p>
                            </div>
                            <?php echo form_close(); ?>



                        </div><!-- /.card-body -->
                        <div class="card-footer">
                            <button type="button" class="btn btn-primary" id="btnImportData">Simpan</button>
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php $this->load->view('admin/v_footer'); ?>


<script>
    $(document).ready(function() {

        $('button#btnImportData').click(function() {
            var formData = new FormData($('#formImportData')[0]);
            $.ajax({
                url: '<?php echo base_url('haji/admin/haji/importData') ?>',
                type: 'POST',
                dataType: 'JSON',
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    var ret = data.success;
                    if (ret === true) {
                        $('#alert_type').removeClass('alert alert-dismissable alert-danger').addClass('alert alert-success alert-dismissable');
                        $('#alert_message').html(data.messages);
                        $('#alert_type').show();
                        $("#alert_type").fadeTo(2000, 500).slideUp(500, function() {
                            $("#alert_type").hide();
                        });
                        $("html, body").animate({
                            scrollTop: 100
                        }, "fast");
                    } else {
                        $('#spinnerModal').modal('hide');
                        $('#alert_type').removeClass('alert alert-dismissable alert-success').addClass('alert alert-danger alert-dismissable');
                        $('#alert_message').html(data.messages);
                        $('#alert_type').show();
                        $("#alert_type").fadeTo(2000, 500).slideUp(500, function() {
                            $("#alert_type").hide();
                        });
                        $("html, body").animate({
                            scrollTop: 100
                        }, "fast");
                    }
                }
            });
        });


    });
</script>