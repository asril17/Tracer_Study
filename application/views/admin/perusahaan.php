<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Perusahaan</h3>
            </div>
            <!-- /.card-header -->
            <?php echo $this->session->flashdata('message') ?>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#modal-lg" onclick="tambah()"><i class="fas fa-plus"></i> Tambah Perusahaan</button>
                    </div>
                </div>
                <table class="table table-bordered table-striped" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Bidang</th>
                            <th>Alamat</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($list as $al) : ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $al->nama_perusahaan ?></td>
                                <td><?php echo $al->bidang ?></td>
                                <td><?php echo $al->alamat ?></td>
                                <td class="text-center">
                                    <a href="javascript:void(0)" class="btn btn-sm btn-primary" title="Edit" onclick="edit(
                                        '<?= $al->id_perusahaan ?>',
                                        '<?= $al->nama_perusahaan ?>',
                                        '<?= $al->bidang ?>',
                                        '<?= $al->alamat ?>',
                                    )"><i class="fa fa-edit"></i></a> <br> <a href="<?= site_url('delete_perusahaan/' . $al->id_perusahaan) ?>" class="btn btn-sm btn-danger m-2"><i class="fa fa-trash"></i></a>
                                    <!-- <br> <a href="#" class="btn btn-sm btn-info mt-2"><i class="fas fa-info-circle"></i></a> -->
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
                <h4 class="modal-title">Tambah Alumni</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('insert_alumni') ?>" method="post" id="formAlumni">
                <div class="modal-body">
                    <!-- <div class="row"> -->
                    <div class="form-group">
                        <label for="nama_perusahaan">Nama Perusahaan</label>
                        <input type="hidden" class="form-control" name="id" id="id">
                        <input type="text" class="form-control" name="nama_perusahaan" id="nama_perusahaan" placeholder="Nama..." required>
                    </div>
                    <div class="form-group">
                        <label for="bidang">Bidang</label>
                        <input type="text" class="form-control" name="bidang" id="bidang" placeholder="No Telp..." required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat..." required>
                    </div>
                </div>
                <!-- </div> -->
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script>
    function edit(id, nama_perusahaan, bidang, alamat) {
        let url = "<?= site_url('update_perusahaan') ?>"
        $('#formAlumni').attr('action', url);
        $('#modal-lg').modal('show');
        $('#formAlumni #id').val(id);
        $('#formAlumni #nama_perusahaan').val(nama_perusahaan);
        $('#formAlumni #bidang').val(bidang);
        $('#formAlumni #alamat').val(alamat);



    }

    function tambah() {
        // $('#modal-lg').modal('show');
        $('#formAlumni').find('input[type="text"]').val('');
        let url_tambah = "<?= site_url('insert_perusahaan') ?>"
        $('#formAlumni').attr('action', url_tambah);
    }
    $(document).ready(function() {
        $('#formAlumni').validate({
            rules: {
                nama_perusahaan: {
                    required: true
                },
                bidang: {
                    required: true
                },
                alamat: {
                    required: true
                }
            },
            messages: {
                nama_perusahaan: {
                    required: "Inputan tidak boleh kosong"
                },
                bidang: {
                    required: "Inputan tidak boleh kosong"
                },
                alamat: {
                    required: "Inputan tidak boleh kosong"
                }
            },
            highlight: function(element) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>