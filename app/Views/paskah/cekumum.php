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
                                <th class="text-center">HP</th>
                                <th class="text-center">Dewasa</th>
                                <th class="text-center">Anak</th>
                                <th class="text-center">Bayar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($jemaat as $row) : ?>
                                <tr>
                                    <td class="align-middle m-1 p-1 text-dark" style="width: 40%;">
                                        <?= $row["hp"] ?>
                                    </td>
                                    <td class="align-middle m-1 p-1 text-dark" style="width: 20%;">
                                        <?= $row["dewasa"]; ?>
                                    </td>
                                    <td class="align-middle m-1 p-1 text-dark" style="width: 20%;">
                                        <?= $row["anak"]; ?>
                                    </td>
                                    <td class="text-center align-middle m-1 p-1" style="width: 20%;">
                                        <?php if (is_null($row['bayar'])) : ?>
                                            <i class="fas fa-circle-xmark" id="status"></i>
                                        <?php else : ?>
                                            <?= "Rp " . number_format($row["bayar"], 2, ',', '.'); ?>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php if ($jemaat) : ?>
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <?php if ($pagination['first']) : ?>
                                    <li class="page-item">
                                        <a class="page-link text-dark" href="#" aria-label="First" id="first" name="first" data-page="1">
                                            <span aria-hidden="false">First</span>
                                        </a>
                                    </li>
                                <?php endif ?>
                                <?php if ($pagination['previous']) : ?>
                                    <li class="page-item">
                                        <a class="page-link text-dark" href="#" aria-label="Previous" id="previous" name="previous" data-page="<?= $page - 1; ?>">
                                            <span aria-hidden=" true">Previous</span>
                                        </a>
                                    </li>
                                <?php endif ?>
                                <?php foreach ($pagination['number'] as $number) : ?>
                                    <li class="page-item <?= $pagination['page'] == $number ? 'active' : '' ?>">
                                        <a class="page-link text-dark" href="#" id="nomor<?= $number; ?>" name="nomor<?= $number; ?>" data-page="<?= $number; ?>">
                                            <span aria-hidden="true"><?= $number; ?></span>
                                        </a>
                                    </li>
                                <?php endforeach ?>
                                <?php if ($pagination['next']) : ?>
                                    <li class="page-item">
                                        <a class="page-link text-dark" href="#" aria-label="Next" id="next" name="next" data-page="<?= $page + 1; ?>">
                                            <span aria-hidden=" true">Next</span>
                                        </a>
                                    </li>
                                <?php endif ?>
                                <?php if ($pagination['last']) : ?>
                                    <li class="page-item">
                                        <a class="page-link text-dark" href="#" aria-label="<?= $last; ?>" id="last" name="last" data-page="<?= $last; ?>">
                                            <span aria-hidden="true"><?= $last; ?></span>
                                        </a>
                                    </li>
                                <?php endif ?>
                            </ul>
                        </nav>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>