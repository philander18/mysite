<?= $this->extend('paskah/template/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid" style="height: 100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6" style="height: 100vh;">
                <div class="container-fluid mt-4">
                    <div class="row">
                        <div class="col-3 col-md-2 text-center">
                            <label class="text-dark">
                                Search :
                            </label>
                        </div>
                        <div class="col-5 col-md-6">
                            <input class="form-control form-control-sm d-inline mr-3" type="search" style="background: rgba(255, 255, 255, 0.5);" id="keyword" name="keyword">
                        </div>
                        <div class="col-4">
                            <a class="btn btn-light text-dark fw-bold" href="<?= base_url(); ?>paskah" role="button" style="width: 80%">Home</a>
                        </div>
                    </div>
                </div>
                <div class="container-fluid mt-2 tabelDataPendaftaran">
                    <input type="hidden" name="baseurl" id="baseurl" value="<?= base_url(); ?>">
                    <table id="tabelDataPendaftaran" class="table table-striped" style="width:100%">
                        <thead>
                            <tr class="table-dark">
                                <th class="text-center">No HP</th>
                                <th class="text-center">D</th>
                                <th class="text-center">A</th>
                                <th class="text-center">Bayar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($jemaat as $row) : ?>
                                <tr>
                                    <td class="align-middle m-1 p-1 text-dark" style="width: 50%;">
                                        <?= $row["hp"] ?>
                                    </td>
                                    <td class="text-center align-middle m-1 p-1 text-dark" style="width: 10%;">
                                        <?= $row["dewasa"]; ?>
                                    </td>
                                    <td class="text-center align-middle m-1 p-1 text-dark" style="width: 10%;">
                                        <?= $row["anak"]; ?>
                                    </td>
                                    <td class="text-center align-middle m-1 p-1" style="width: 30%;">
                                        <?php if (is_null($row['bayar'])) : ?>
                                            <i class="fas fa-circle-xmark" id="status"></i>
                                        <?php else : ?>
                                            <?= number_format($row["bayar"], 0, ',', '.'); ?>
                                        <?php endif; ?>
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
<?= $this->endSection(); ?>