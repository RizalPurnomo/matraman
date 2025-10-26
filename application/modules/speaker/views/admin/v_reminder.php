<?php $this->load->view('admin/v_header'); ?>
<?php $this->load->view('admin/v_sidebar'); ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
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
                                Reminder
                            </h3>
                            <div class="card-tools">

                            </div>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <table id="example" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Event</th>
                                        <th>Audio</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i = 0; $i < count($reminder); $i++) { ?>
                                        <tr>
                                            <td><?php echo $i + 1; ?></td>
                                            <td><?php echo $reminder[$i]['nama_event']; ?></td>
                                            <td><?php echo $reminder[$i]['audio']; ?></td>
                                            <td>
                                                <div class="text-center">
                                                    <button type="button" title="Detail" class="btn btn-social-icon btn-info" onclick="detailModal(<?php echo $reminder[$i]['id_speaker'] ?>)"><i class="fa fa-eye"></i></button>
                                                    <!-- <button type="button" class="btn btn-social-icon btn-danger" title="Hapus" onclick="reject(<?php echo $persetujuan[$i]['id_cuti']; ?>)"><i class="fa fa-remove"></i></button> -->
                                                </div>
                                            </td>
                                        </tr>

                                    <?php } ?>

                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="detail_modal" role="basic" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="col-lg-12">

                        <!-- <form method="post" action="<?php //echo base_url('speaker/admin/reminder/updateData'); 
                                                            ?>"> -->
                        <div class="form-group">
                            <label class="control-label">Nama event</label>
                            <input type="text" class="form-control" id="id_speaker_detail" placeholder="Id Speaker Detail" readonly>
                            <input type="text" class="form-control" id="nama_event" placeholder="Nama Event" readonly>
                        </div>

                        <div class="card" id="card_speaker">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="control-label">Jam</label>
                                    <input type="text" class="form-control" id="jam" placeholder="Jam">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Hari</label>
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" value="Senin" id="chk_hari_Senin">
                                        <label for="chk_hari_Senin" class="custom-control-label">Senin</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" value="Selasa" id="chk_hari_Selasa">
                                        <label for="chk_hari_Selasa" class="custom-control-label">Selasa</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" value="Rabu" id="chk_hari_Rabu">
                                        <label for="chk_hari_Rabu" class="custom-control-label">Rabu</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" value="Kamis" id="chk_hari_Kamis">
                                        <label for="chk_hari_Kamis" class="custom-control-label">Kamis</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" value="Jumat" id="chk_hari_Jumat">
                                        <label for="chk_hari_Jumat" class="custom-control-label">Jumat</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" value="Sabtu" id="chk_hari_Sabtu">
                                        <label for="chk_hari_Sabtu" class="custom-control-label">Sabtu</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" value="Minggu" id="chk_hari_Minggu">
                                        <label for="chk_hari_Minggu" class="custom-control-label">Minggu</label>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer">
                                <!-- <button type="submit" class="btn btn-primary">Update</button> -->
                                <button onclick="updateDetailSpeaker()" class="btn btn-info">Update</button>
                            </div>
                        </div>
                        <!-- </form> -->

                        <div class="form-group">
                            <table class="table table-striped table-bordered table-hover" id="tabel_detail">
                                <thead>
                                    <tr>
                                        <th style="width:15px;"> No </th>
                                        <th> Jam </th>
                                        <th> Hari </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>

                        </div>

                    </div>



                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<?php $this->load->view('admin/v_footer'); ?>


<script>
    $(document).ready(function() {
        $("#card_speaker").hide();
        // uncheckHari();
    });

    function detailModal(id_Speaker) {
        $('#detail_modal').modal('show');
        $("#card_speaker").hide();

        $.ajax({
            url: '<?php echo base_url('speaker/admin/reminder/getSpeakerById/'); ?>' + id_Speaker,
            type: 'POST',
            dataType: 'json',
            data: {

            },
            success: function(data) {
                $('#tabel_detail > tbody').html(data.tabel);
                $("#nama_event").val(data.detail[0].nama_event);
                $("#id_speaker_detail").val(data.detail[0].id_speaker_detail);

            }
        })
    }

    function detailSpeaker(id_speaker_detail) {
        $("#card_speaker").show();
        uncheckHari();
        $.ajax({
            url: '<?php echo base_url('speaker/admin/reminder/getSpeakerDetailByIdDetail/'); ?>' + id_speaker_detail,
            type: 'POST',
            dataType: 'json',
            data: {

            },
            success: function(data) {
                $("#jam").val(data.detail.jam);
                let days = data.detail.hari.split(",");
                days.map((day) => {
                    document.getElementById('chk_hari_' + day).checked = true;
                })

            }
        })
    }

    function updateDetailSpeaker() {
        let hari_selected = [];
        $('#card_speaker input:checked').each(function() {
            hari_selected.push($(this).attr('value'));
        });

        let dataArray = {
            "speaker_detail": {
                "hari": hari_selected.toString(),
                "jam": $("#jam").val()
            }
        }
        $.ajax({
            url: '<?php echo base_url('speaker/admin/reminder/updateSpeakerDetail/'); ?>' + $("#id_speaker_detail").val(),
            type: 'POST',
            dataType: 'json',
            data: {
                dataArray
            },
            success: function(data) {
                window.location = "<?php echo base_url(); ?>speaker/admin/reminder";
            }
        })
    }

    function uncheckHari() {
        let days = ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu"];
        days.map(day => {
            document.getElementById('chk_hari_' + day).checked = false;
        })
    }
</script>