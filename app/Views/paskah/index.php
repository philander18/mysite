<?= $this->extend('paskah/template/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid" style="height: 100vh;">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 bg-light text-dark bg-opacity-25" style="height: 100vh;">
                <a class="btn btn-primary fw-bold fs-2 mt-5 mb-4" href="<?= base_url(); ?>paskah/pendaftaran" role="button" style="width: 50%; height: 4rem; ">Pendaftaran</a>
                <a class="btn btn-primary fw-bold fs-2 mb-4" href="#" role="button" style="width: 50%; height: 4rem; ">Cek Data</a>
                <a class="btn btn-primary fw-bold fs-2 mb-4" href="<?= base_url(); ?>paskah/panitia" role="button" style="width: 50%; height: 4rem; ">Panitia</a>
                <?php if (logged_in()) : ?>
                    <a class="btn btn-primary fw-bold fs-2 mb-4" href="<?= base_url('logout'); ?>" role="button" style="width: 50%; height: 4rem; ">Logout</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

</div>
<?= $this->endSection(); ?>