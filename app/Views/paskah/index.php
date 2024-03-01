<?= $this->extend('paskah/template/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid paskah" style="height: 100vh;">
    <div class="container">
        <form>
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="text-dark mb-3 fw-bold">
                        <h3 class="fw-bold text-center">PENDAFTARAN PASKAH</h3>
                        <h4 class="text-center">GPdI Padalarang 2024</h4>
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="text" id="nama" name="nama" placeholder="Nama">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="text" id="HP" name="HP" placeholder="Nomor HP">
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" id="anggota" rows="3" placeholder="Daftar anggota"></textarea>
                    </div>
                    <div class="mb-3">
                        <select class="form-select" aria-label=".form-select-sm example" name="transportasi" id="transportasi">
                            <option selected>Pribadi</option>
                            <option value="panitia">Panitia</option>
                            <option value="pribadi">Pribadi</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-4">
                                <label class="text-dark fw-bold" for="dewasa">Jumlah Dewasa</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control" type="text" id="dewasa" name="dewasa" placeholder="Jumlah Dewasa">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-4">
                                <label class="text-dark fw-bold text-start" for="anak">Jumlah Anak</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control" type="text" id="anak" name="anak" placeholder="jumlah Anak">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-light text-dark fw-bold">Submit</button>
                    </div>
                </div>
            </div>
    </div>
</div>
</form>
</div>
<?= $this->endSection(); ?>