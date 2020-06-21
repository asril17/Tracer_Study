<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Kuisioner</h3>
            </div>
            <!-- /.card-header -->
            <?php echo $this->session->flashdata('message') ?>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-12">
                        <a href="<?= base_url('tambah_kuisioner') ?>" class="btn btn-sm btn-primary float-right"><i class="fas fa-plus"></i> Tambah Kuisioner</a>
                    </div>
                </div>
                <table class="table table-bordered table-striped example1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Peruntukan</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($list as $al) : ?>
                            <tr>
                                <td width="5%"><?php echo $no++ ?></td>
                                <td><?php echo $al->judul ?></td>
                                <td><?php echo $al->kuisioner ?></td>
                                <td width="15%" class="text-center">
                                    <a href="<?= base_url('editKuisioner/' . $al->id_kuisioner) ?>" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a> | <a href="<?= base_url('deleteKuisioner/' . $al->id_kuisioner) ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a> | <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-lg" onclick="info('<?= $al->id_kuisioner ?>')"><i class="fas fa-info-circle"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Daftar Pertanyaan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="isi">


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script>
    function info(id_kuisioner) {
        var site_url = "<?php echo site_url() ?>";
        $.ajax({
            url: site_url + "/listPertanyaan",
            method: "POST",
            dataType: "json",
            data: {
                id_kuisioner: id_kuisioner
            },
            beforeSend: function() {
                $('#isi').append('<div class="text-center loading"><i class="fa fa-spinner fa-spin fa-4x"></i></div>');
            },
            success: function(res) {
                if (res.status) {
                    for (i = 0; i < res.data.length; i++) {
                        $('#isi').append('<ol class="breadcrumb mb-4"><li class="breadcrumb-item active">' + res.data[i].pertanyaan + '</li></ol>');
                    }
                } else {
                    $('#isi').append('<h4 class="text-center">Tidak terdapat pertanyaan</h4>')

                }
            },
            complete: function() {
                $('.loading').remove();
            }

        });
    }
</script>