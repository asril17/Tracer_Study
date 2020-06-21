<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Alumni</h3>
            </div>
            <!-- /.card-header -->
            <?php echo $this->session->flashdata('message') ?>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#modal-lg" onclick="tambah()"><i class="fas fa-plus"></i> Tambah Alumni</button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>No Telepon</th>
                                <th>Jenis Kelamin</th>
                                <th>Tahun Lulus</th>
                                <th>Jurusan</th>
                                <th>Status Pekerjaan</th>
                                <th>Info Pengabdian</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($list as $al) : ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $al->nim ?></td>
                                    <td><?php echo $al->nama_alumni ?></td>
                                    <td><?php echo $al->alamat ?></td>
                                    <td><?php echo $al->no_telepon ?></td>
                                    <td><?php echo $al->jenis_kelamin ?></td>
                                    <td><?php echo $al->tahun_lulus ?></td>
                                    <td><?php echo $al->jurusan ?></td>
                                    <td><?php echo $al->status_pekerjaan ?></td>
                                    <td class="text-center"><a href="<?= site_url('infoPengabdian') ?>" class="btn btn-sm btn-info mt-2"><i style="width: 50px;" class="fas fa-info-circle"></i></a></td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" class="btn btn-sm btn-primary" title="Edit" onclick="edit(
                                        '<?= $al->nim ?>',
                                        '<?= $al->nama_alumni ?>',
                                        '<?= $al->alamat ?>',
                                        '<?= $al->no_telepon ?>',
                                        '<?= $al->email ?>',
                                        '<?= $al->jenis_kelamin ?>',
                                        '<?= $al->pin ?>',
                                        '<?= $al->tahun_lulus ?>',
                                        '<?= $al->jurusan ?>',
                                        '<?= $al->status_pekerjaan ?>',
                                        '<?= $al->bagian ?>',
                                        '<?= $al->alamat_kantor ?>',
                                        '<?= $al->no_telepon_kantor ?>',
                                    )"><i class="fa fa-edit"></i></a> <br> <a href="<?= base_url('delete_alumni/' . $al->nim) ?>" class="btn btn-sm btn-danger m-2"><i class="fa fa-trash"></i></a>
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
                    <div class="row">
                        <div class="col-4">
                            <label for="nim">Nim</label>
                            <input type="text" class="form-control" name="nim" id="nim" placeholder="Nim...">
                        </div>
                        <div class="col-4">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama..." required>
                        </div>
                        <div class="col-4">
                            <label for="no_telp">Nomor Telepon</label>
                            <input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="No Telp..." required>
                        </div>

                    </div>
                    <div class="row mt-3">
                        <div class="col-4">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                <option value="" selected disabled>Pilih ....</option>
                                <option value="Laki - Laki">Laki laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat..." required>
                        </div>
                        <div class="col-4">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="Email..." required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-4">
                            <label for="pin">Pin</label>
                            <input type="text" class="form-control" name="pin" id="pin" placeholder="Pin..." required>
                        </div>
                        <div class="col-4">
                            <label for="tahun_lulus">Tahun Lulus</label>
                            <input type="date" class="form-control" name="tahun_lulus" id="tahun_lulus" placeholder="Lulusan..." required>
                        </div>
                        <div class="col-4">
                            <label for="jurusan">Jurusan</label>
                            <input type="text" class="form-control" name="jurusan" id="jurusan" placeholder="Jurusan..." required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-4">
                            <label for="status_pekerjaan">Status Pekerjaan</label>
                            <select name="status_pekerjaan" id="status_pekerjaan" class="form-control" required>
                                <option value="" selected disabled>Pilih ....</option>
                                <option value="Ya">Sudah bekerja</option>
                                <option value="Tidak">Belum bekerja</option>
                            </select>
                        </div>
                        <div class="col-4 peker" style="display: none;">
                            <label for="posisi">Posisi</label>
                            <input type="text" class="form-control" name="posisi" id="posisi" placeholder="Posisi...">
                        </div>
                        <div class="col-4 peker" style="display: none;">
                            <label for="alamat_kantor">Alamat kantor</label>
                            <input type="text" class="form-control" name="alamat_kantor" id="alamat_kantor" placeholder="Alamat kantor...">
                        </div>
                        <div class="col-4 peker mt-3" style="display: none;">
                            <label for="no_telp_kantor">No Telp kantor</label>
                            <input type="text" class="form-control" name="no_telp_kantor" id="no_telp_kantor" placeholder="No telp kantor...">
                        </div>
                    </div>
                </div>
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
    function edit(nim, nama_lengkap, alamat, no_telp, email, jenis_kelamin, pin, tahun_lulus, jurusan, status_pekerjaan, posisi, alamat_kantor, no_telp_kantor) {
        let url = "<?= site_url('update_alumni') ?>"
        $('#formAlumni').attr('action', url);
        $('#modal-lg').modal('show');
        $('#formAlumni #nim').val(nim);
        $('#formAlumni #nama_lengkap').val(nama_lengkap);
        $('#formAlumni #alamat').val(alamat);
        $('#formAlumni #no_telp').val(no_telp);
        $('#formAlumni #email').val(email);
        $('#formAlumni #jenis_kelamin').val(jenis_kelamin);
        $('#formAlumni #pin').val(pin);
        $('#formAlumni #tahun_lulus').val(tahun_lulus);
        $('#formAlumni #jurusan').val(jurusan);
        $('#formAlumni #status_pekerjaan').val(status_pekerjaan);
        if (status_pekerjaan == 'Ya') {
            $('.peker').css('display', 'block');
            $('#formAlumni #posisi').val(posisi);
            $('#formAlumni #alamat_kantor').val(alamat_kantor);
            $('#formAlumni #no_telp_kantor').val(no_telp_kantor);
            $('#posisi').rules("add", {
                required: true,
                messages: {
                    required: "Inputan Tidak Boleh Kosong"
                }
            });
            $('#alamat_kantor').rules("add", {
                required: true,
                messages: {
                    required: "Inputan Tidak Boleh Kosong"
                }
            });
            $('#no_telp_kantor').rules("add", {
                required: true,
                digits: true,
                messages: {
                    required: "Inputan Tidak Boleh Kosong",
                    digits: "Inputan harus menggunakan angka"
                }
            });
        } else {
            $('.peker').css('display', 'none');
            $('#formAlumni #posisi').val('');
            $('#formAlumni #alamat_kantor').val('');
            $('#formAlumni #no_telp_kantor').val('');
        }



    }

    function tambah() {
        // $('#modal-lg').modal('show');
        $('#formAlumni').find('input[type="text"],select').val('');
        let url_tambah = "<?= base_url('alumni/insert_alumni') ?>"
        $('#formAlumni').attr('action', url_tambah);
    }



    $(document).on('change', '#status_pekerjaan', function() {
        let status = $(this).val();

        if (status == 'Ya') {
            $('.peker').css('display', 'block');

            $('#posisi').rules("add", {
                required: true,
                messages: {
                    required: "Inputan Tidak Boleh Kosong"
                }
            });
            $('#alamat_kantor').rules("add", {
                required: true,
                messages: {
                    required: "Inputan Tidak Boleh Kosong"
                }
            });
            $('#no_telp_kantor').rules("add", {
                required: true,
                digits: true,
                messages: {
                    required: "Inputan Tidak Boleh Kosong",
                    digits: "Inputan harus menggunakan angka"
                }
            });
        } else {
            $('.peker').css('display', 'none');
            $('#posisi').rules("add", {
                required: false,
                messages: {
                    required: ""
                }
            });
            $('#alamat_kantor').rules("add", {
                required: false,
                messages: {
                    required: ""
                }
            });
            $('#no_telp_kantor').rules("add", {
                required: false,
                digits: true,
                messages: {
                    required: "",
                    digits: "Inputan harus menggunakan angka"
                }
            });

        }

    });
    $(document).ready(function() {
        $('#formAlumni').validate({
            rules: {
                nim: {
                    required: true,
                    digits: true,
                },
                nama_lengkap: {
                    required: true
                },
                no_telp: {
                    required: true,
                    digits: true
                },
                jenis_kelamin: {
                    required: true
                },
                alamat: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                pin: {
                    required: true,
                    digits: true,
                },
                tahun_lulus: {
                    required: true
                },
                jurusan: {
                    required: true
                },
                status_pekerjaan: {
                    required: true
                }
            },
            messages: {
                nim: {
                    required: "Inputan tidak boleh kosong",
                    digits: "Inputan harus angka"
                },
                nama_lengkap: {
                    required: "Inputan tidak boleh kosong"
                },
                no_telp: {
                    required: "Inputan tidak boleh kosong",
                    digits: "Inputan harus angka"
                },
                jenis_kelamin: {
                    required: "Inputan tidak boleh kosong"
                },
                alamat: {
                    required: "Inputan tidak boleh kosong"
                },
                email: {
                    required: "Inputan tidak boleh kosong",
                    email: "Inputan harus email"
                },
                pin: {
                    required: "Inputan tidak boleh kosong",
                    digits: "Inputan harus angka"
                },
                tahun_lulus: {
                    required: "Inputan tidak boleh kosong"
                },
                jurusan: {
                    required: "Inputan tidak boleh kosong"
                },
                status_pekerjaan: {
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