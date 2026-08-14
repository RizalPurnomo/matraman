      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="card card-primary card-outline">
            <div class="card-body">

                <div class="box-body table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Group List</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php for ($i = 0; $i < count($user_to_group); $i++) { ?>
                                <tr>
                                    <td><?php echo $i + 1; ?></td>
                                    <td><?php echo $user_to_group[$i]['username'] ?></td>
                                    <td><?php echo $user_to_group[$i]['email'] ?></td>
                                    <td>
                                        <?php
                                        $id = $user_to_group[$i]['id'];
                                        $queryDetail = "SELECT * FROM aauth_users a
                                            INNER JOIN aauth_user_to_group b ON b.user_id=id
                                            INNER JOIN aauth_groups c ON c.id=b.group_id
                                            WHERE b.user_id='$id'";
                                        $detail = $this->db->query($queryDetail)->result_array();
                                        ?>
                                        <ul>
                                            <?php foreach ($detail as $det) : ?>
                                                <li><?php echo $det['definition'] ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <button type="button" class="btn btn-social-icon btn-info" title="Edit" onclick="editGroup(<?php echo $user_to_group[$i]['id']; ?>)"><i class="fa fa-edit"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>


            </div><!-- /.card-body -->
          </div>
        </div><!-- /.container-fluid -->
      </section>

<div class="modal fade" id="group_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="treeForm" method="post" action="<?php echo base_url('sys_admin/UserToGroup/'); ?>">
                <div class="modal-header">
                    <h4 class="modal-title">Modal User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group mt-3">
                        Username <span style="color: red">*</span>
                        <input type="hidden" class="form-control" name="id_user2" id="id_user2" placeholder="Id User" required>
                        <input type="text" class="form-control" name="username2" id="username2" placeholder="Username" required>
                    </div>
                    <div class="form-group mt-3">
                        <div class="tree-container">
                            <div id="menuTree">
                                <!-- Tree menu akan di-render di sini -->
                            </div>
                            <input type="hidden" name="selectedMenusOld" id="selectedMenusOld">
                            <input type="hidden" name="selectedMenus" id="selectedMenus">
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
// Fungsi untuk mencetak tree menu
function printTree($tree)
{
    $html = '';
    foreach ($tree as $node) {
        $html .= '<li>' . $node['name'];
        if (!empty($node['children'])) {
            $html .= '<ul>' . printTree($node['children']) . '</ul>';
        }
        $html .= '</li>';
    }
    return $html;
}
?>

<script>
    $(document).ready(function() {



        $('#treeForm').on('submit', function(e) {
            // Cegah submit form sementara
            e.preventDefault();

            // Ambil data node yang dicentang dari jsTree
            var selectedNodes = $('#menuTree').jstree("get_selected");

            // Masukkan data node yang dicentang ke input hidden
            $('#selectedMenus').val(JSON.stringify(selectedNodes));

            // Submit form secara manual
            this.submit();
        });
    });

    function editGroup(id) {
        $('#group_modal').modal('show');

        $.ajax({
            url: '<?php echo base_url('sys_admin/UserToGroup/getAllGroupByUser/'); ?>' + id + '?t=' + new Date().getTime(), //menambahkan parameter timestamp pada URL untuk mencegah caching
            type: 'POST',
            dataType: 'json',
            success: function(result) {

                console.log(result);
                console.log(result.user.username);
                $("#id_user2").val(result.user.id);
                $("#username2").val(result.user.username);

                // Hapus instance jsTree sebelumnya
                if ($('#menuTree').jstree(true)) {
                    $('#menuTree').jstree('destroy').empty();
                }

                // Inisialisasi jsTree
                $('#menuTree').jstree({
                    core: {
                        data: result.menuTree // Masukkan data yang dikonversi
                    },
                    plugins: ['checkbox'] // Aktifkan checkbox
                });

                $('#selectedMenusOld').val(JSON.stringify(result.menuOld));

            },
            error: function(xhr, status, error) {
                alert('Gagal memuat data, Refresh Halaman Ini: ' + error);
            }
        })
    }
</script>