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
                            <th>Nama Perusahaan</th>
                            <th>Bagian</th>
                            <th>Nama HRD</th>
                            <th>Nomor Telepon</th>
                            <th>Keterangan</th>
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
                                <td><?php echo $al->bagian ?></td>
                                <td><?php echo $al->nama_narahubung ?></td>
                                <td><?php echo $al->no_narahubung ?></td>
                                <td><?php echo $al->keterangan ?></td>
                                <td class="text-center">
                                    <a href="javascript:void(0)" class="btn btn-sm btn-primary" title="Edit" onclick="edit(
                                        '<?= $al->id_lowongan ?>',
                                        '<?= $al->id_perusahaan ?>',
                                        '<?= $al->bagian ?>',
                                        '<?= $al->nama_narahubung ?>',
                                        '<?= $al->no_narahubung ?>',
                                        '<?= $al->keterangan ?>',
                                    )"><i class="fa fa-edit"></i></a> <br> <a href="<?= site_url('delete_lowongan/' . $al->id_lowongan) ?>" class="btn btn-sm btn-danger m-2"><i class="fa fa-trash"></i></a>
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
            <form action="<?= base_url('insert_alumni') ?>" method="post" id="formLowongan">
                <div class="modal-body">
                    <!-- <div class="row"> -->
                    <div class="form-group">
                        <label for="nama_perusahaan">Nama Perusahaan</label>
                        <input type="hidden" class="form-control" name="id" id="id">
                        <select name="id_perusahaan" id="id_perusahaan" class="form-control">
                            <option value="" selected disabled>Pilih Perusahaan ....</option>
                            <?php foreach ($perusahaan as $ph) : ?>
                                <option value="<?= $ph->id_perusahaan ?>"><?= $ph->nama_perusahaan ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="bagian">Bagian</label>
                        <input type="text" class="form-control" name="bagian" id="bagian" placeholder="Bagian..." required>
                    </div>
                    <div class="form-group">
                        <label for="nama_hrd">Nama HRD</label>
                        <input type="text" class="form-control" name="nama_hrd" id="nama_hrd" placeholder="nama_hrd..." required>
                    </div>
                    <div class="form-group">
                        <label for="no_hrd">No HRD</label>
                        <input type="text" class="form-control" name="no_hrd" id="no_hrd" placeholder="No_hrd..." required>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="keterangan..." required>
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
    function edit(id, id_perusahaan, bagian, nama_hrd, no_hrd, keterangan) {
        let url = "<?= site_url('update_lowongan') ?>"
        $('#formLowongan').attr('action', url);
        $('#modal-lg').modal('show');
        $('#formLowongan #id').val(id);
        $('#formLowongan #id_perusahaan').val(id_perusahaan);
        $('#formLowongan #bagian').val(bagian);
        $('#formLowongan #nama_hrd').val(nama_hrd);
        $('#formLowongan #no_hrd').val(no_hrd);
        $('#formLowongan #keterangan').val(keterangan);



    }

    function tambah() {
        // $('#modal-lg').modal('show');
        $('#formLowongan').find('input[type="text"]').val('');
        let url_tambah = "<?= site_url('insert_lowongan') ?>"
        $('#formLowongan').attr('action', url_tambah);
    }
    $(document).ready(function() {
        $('#formLowongan').validate({
            rules: {
                id_perusahaan: {
                    required: true
                },
                bagian: {
                    required: true
                },
                nama_hrd: {
                    required: true
                },
                no_hrd: {
                    required: true,
                    digits: true
                },
                keterangan: {
                    required: true
                }
            },
            messages: {
                id_perusahaan: {
                    required: "Inputan tidak boleh kosong"
                },
                bagian: {
                    required: "Inputan tidak boleh kosong"
                },
                nama_hrd: {
                    required: "Inputan tidak boleh kosong"
                },
                no_hrd: {
                    required: "Inputan tidak boleh kosong",
                    digits: "Inputan harus menggunakan angka"
                },
                keterangan: {
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