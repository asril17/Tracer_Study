<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Page Title - SB Admin</title>
    <link href="<?= base_url() ?>assets/dist/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/plugin/sweetalert/sweetalert2.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
                                <?php echo $this->session->flashdata('message') ?>
                                <div class="card-body">
                                    <form action="<?= base_url('Auth') ?>" method="POST" id="formSimpan">
                                        <div class="form-group">
                                            <label class="small mb-1" for="email">Email</label>
                                            <input class="form-control py-4" id="email" name="email" type="email" placeholder="Masukan Alamat Email" />
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="password">Password</label><input class="form-control py-4" id="password" name="password" type="password" placeholder="Masukan password" />
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0"><button type="submit" class="btn btn-primary">Login</button></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Archarios Lazaretto 2019</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url() ?>assets/dist/plugin/jquery.validate/jquery.validate.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/dist/plugin/sweetalert/sweetalert2.all.min.js"></script>
    <script src="<?= base_url() ?>assets/distjs/scripts.js"></script>
    <?php if ($this->session->flashdata('logout')) : ?>
        <script>
            Swal.fire(
                'Logout!',
                '',
                'success'
            )
        </script>
    <?php endif; ?>
    <script>
        $(document).ready(function() {
            $('#formSimpan').validate({
                rules: {
                    email: {
                        required: true
                    },
                    password: {
                        required: true
                    }
                },
                messages: {
                    email: {
                        required: "Inputan tidak boleh kosong"
                    },
                    password: {
                        required: "Inputan tidak boleh kosong"
                    }
                }
            });
        });
    </script>
</body>

</html>