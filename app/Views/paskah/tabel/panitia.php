<input type="hidden" name="baseurl" id="baseurl" value="<?= base_url(); ?>">
<table id="tabelDataPendaftaran" class="table table-striped" style="width:100%">
    <thead>
        <tr class="table-dark">
            <th class="text-center">Nama</th>
            <th class="text-center">No HP</th>
            <th class="text-center">Bayar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($jemaat as $row) : ?>
            <tr>
                <td class="text-center align-middle m-1 p-1 text-dark" style="width: 35%;">
                    <a href="" class="link-primary modalpanitia" data-bs-toggle="modal" data-bs-target="#formpanitia" data-id="<?= $row["id"]; ?>" name="nama" id="nama">
                        <?= $row["nama"]; ?>
                    </a>
                </td>
                <td class="text-center align-middle m-1 p-1 text-dark" style="width: 35%;">
                    <?= $row["hp"] ?>
                </td>
                <td class="text-center align-middle m-1 p-1" style="width: 30%;">
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