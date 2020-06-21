<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Kuisioner</h3>
            </div>
            <!-- /.card-header -->
            <?php echo $this->session->flashdata('message') ?>
            <div class="card-body">
                <form action="<?= base_url('insertKuisioner') ?>" method="POST" id="formSimpan">
                    <div class="row justify-content-between mb-4 formSimpan">
                        <div class="col-sm-3">
                            <div class="form-group">

                                <label>Judul Kuisioner</label>
                                <input type="hidden" name="id" value="<?= $kuisioner['id_kuisioner'] ?>">
                                <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul Kuisioner ..." value="<?= $kuisioner['judul'] ?>" required>
                                <p style='color:red;'></p>
                            </div>
                            <div class="form-group">
                                <label>Peruntukan</label>
                                <input type="text" class="form-control" name="peruntukan" id="peruntukan" placeholder="Peruntukan ..." value="<?= $kuisioner['kuisioner'] ?>" required>
                                <p style='color:red;'></p>
                            </div>
                        </div>
                        <button type="button" class="btn btn-md btn-success" id="btn_simpan" style="position: absolute;top: 15px;right: 15px;"><i class="fa fa-save"></i> Simpan Kuisioner</button>
                        <!-- /.card-body -->
                </form>
                <div style="border-right: 2px solid #acacac;"></div>
                <div class="col-sm-8">
                    <form method="POST" id="formAdd">
                        <div class="form-group">
                            <label>Pertanyaan</label>
                            <div class="row">
                                <div class="col">
                                    <input type="hidden" name="id_kuisioner" value="<?= $kuisioner['id_kuisioner'] ?>">
                                    <textarea class="form-control" name="pertanyaan" id="input_pertanyaan" rows="3" placeholder="Pertanyaan ..."></textarea>
                                </div>
                                <div class="col-1">
                                    <button type="buttton" id="tambah_pertanyaan" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Pertanyaan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Pertanyaan</th>
                                        <th width="10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="tableItem">
                                    <?php foreach ($pertanyaan as $per) : ?>
                                        <tr>

                                            <td><?= $per['pertanyaan'] ?></td>
                                            <td width="10%">
                                                <a href="javascript:void(0)" data-id="<?= $per['id_pertanyaan'] ?>" class="text-danger btnDelete"><i class="fa fa-trash"></i></a>
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
    </div>
</div>
</div>
<script>
    $(document).on('click', '#btn_simpan', function() {
        let isValid = true;
        let input = $(this).closest('.formSimpan').find("input[type='text']");
        for (let i = 0; i < input.length; i++) {
            if (!input[i].validity.valid) {
                isValid = false;
                $(input[i]).closest(".form-group input").addClass("is-invalid");
                $(input[i]).closest(".form-group").find('p').text("Inputan tidak boleh kosong");
            } else {
                isValid = true;
                $(input[i]).closest(".form-group input").removeClass("is-invalid");
                $(input[i]).closest(".form-group").find('p').html("");
            }
        }

        if (isValid) {
            let td = $("#tableItem").find('td');

            if (td.length > 0) {
                console.log(td);
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Ingin menyimpan kuisioner dengan " + td.length + " Pertanyaan!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yakin',
                    cancelButtonText: 'Urungkan'
                }).then((result) => {
                    if (result.value) {
                        Swal.fire(
                            'Terima kasih!',
                            'Kuisioner telah di simpan.',
                            'success'
                        ).then((result) => {
                            $('#formSimpan').trigger('submit');
                        })
                    }
                })

            } else {
                Swal.fire({
                    type: 'error',
                    title: 'Maaf...',
                    text: 'Anda belum menginputkan pertanyaan!',
                })

            }
        }

    });
    let id_kuisioner = "<?php echo $kuisioner['id_kuisioner'] ?>"
    var site_url = "<?php echo site_url() ?>";
    $(document).on('click', '#tambah_pertanyaan', function(e) {
        e.preventDefault();

        if ($('#harga').val() < 0) {
            alert('Jumlah Produk harus > 0');
        } else {

            $.ajax({
                url: site_url + "/insertPertanyaan",
                method: "POST",
                dataType: "json",
                data: $('#formAdd').serialize(),
                beforeSend: function() {
                    $('#formAdd').addClass('disable');
                    $('#btnAdd').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(res) {
                    if (res.status) {
                        $('#formAdd')[0].reset();
                        $('#tableItem').html(reload(res.data));

                    } else {
                        alert(res.message);
                    }
                },
                complete: function() {
                    $('#formAdd').removeClass('disable');
                    $('#btnAdd').html('<i class="fa fa-plus"></i>');
                }

            });

        }

        return false;
    });

    $(document).on('click', '.btnDelete', function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');

        $.ajax({
            url: site_url + "/deletePertanyaan/" + id_kuisioner,
            method: "POST",
            dataType: "json",
            data: {
                id_pertanyaan: id
            },
            beforeSend: function() {
                $('.btnDelete').html('<i class="fa fa-spinner fa-spin"></i>');
            },
            success: function(res) {
                if (res.status) {
                    $('#tableItem').html(reload(res.data));

                } else {
                    alert(res.message);
                }
            }

        });

    })

    function reload(data) {
        var grandTotal = 0;
        var txt = '';

        $.each(data, function(index, val) {
            txt += "<tr id='row" + val.id_pertanyaan + "'>";
            txt += "<td>" + val.pertanyaan + "</td>";
            txt += "<td width='10%' class='text-center'><a href='javascript:void(0)' data-id='" + val.id_pertanyaan + "' class='text-danger btnDelete'><i class='fa fa-trash'></i></a></td>";
            txt += "</tr>";

        });
        return txt;
    }
</script>