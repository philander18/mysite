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