<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="<?= base_url(); ?>public/css/styles.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>public/css/form.css" rel="stylesheet" />
</head>

<body>
    <div class="container-fluid paskah">
        <div class="form-body">
            <div class="row">
                <div class="form-holder">
                    <div class="form-content">
                        <div class="form-items">
                            <h3>PENDAFTARAN PASKAH</h3>
                            <H3>GPdI Padalarang 2024</H3>
                            <p>Tolong isi data di bawah ini</p>
                            <form class="requires-validation" novalidate>
                                <div class="col-md-12">
                                    <input class="form-control" type="text" name="name" placeholder="Nama Lengkap" required>
                                    <div class="valid-feedback">Nama sudah sesuai</div>
                                    <div class="invalid-feedback">Nama tidak boleh kosong</div>
                                </div>
                                <div class="col-md-12">
                                    <input class="form-control" type="text" name="HP" placeholder="Nomor HP" required>
                                    <div class="valid-feedback">Nomor HP ok</div>
                                    <div class="invalid-feedback">Nomor HP tidak boleh kosong</div>
                                </div>
                                <div class="col-md-12">
                                    <select class="form-select mt-3" required>
                                        <option selected disabled value="">Position</option>
                                        <option value="jweb">Junior Web Developer</option>
                                        <option value="sweb">Senior Web Developer</option>
                                        <option value="pmanager">Project Manager</option>
                                    </select>
                                    <div class="valid-feedback">You selected a position!</div>
                                    <div class="invalid-feedback">Please select a position!</div>
                                </div>
                                <div class="col-md-12">
                                    <input class="form-control" type="password" name="password" placeholder="Password" required>
                                    <div class="valid-feedback">Password field is valid!</div>
                                    <div class="invalid-feedback">Password field cannot be blank!</div>
                                </div>
                                <div class="form-button mt-3">
                                    <button id="submit" type="submit" class="btn btn-primary fw-bold" style="color: black;">DAFTAR</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url(); ?>public/js/scripts.js"></script>
    <script src="<?= base_url(); ?>public/js/form.js"></script>
</body>

</html>