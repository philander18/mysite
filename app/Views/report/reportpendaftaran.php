<style>
    p,
    span,
    table {
        font-size: 12px
    }

    table {
        width: 100%;
    }

    table#tb-item tr th,
    table#tb-item tr td {
        border: 1px solid #000;
    }

    h3 {
        text-align: center;
        font-weight: bold;
    }

    .text-center {
        text-align: center;
    }

    .text-wrap {
        white-space: normal;
    }
</style>
<h3>Data Pendaftaran</h3>
<table id="tb-item">
    <thead>
        <tr>
            <th class="text-center" style="width: 4%;"><strong>No</strong></th>
            <th class="text-center" style="width: 17%;"><strong>Nama</strong></th>
            <th class="text-center" style="width: 14%;"><strong>HP</strong></th>
            <th class="text-center" style="width: 22%;"><strong>Anggota</strong></th>
            <th class="text-center" style="width: 12%;"><strong>Transportasi</strong></th>
            <th class="text-center" style="width: 8%;"><strong>Dewasa</strong></th>
            <th class="text-center" style="width: 6%;"><strong>Anak</strong></th>
            <th class="text-center" style="width: 7%;"><strong>Bayar</strong></th>
            <th class="text-center" style="width: 10%;"><strong>Update</strong></th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($jemaat as $row) : ?>
            <tr>
                <td class="text-center text-wrap" style="width: 4%;">
                    <?= $i; ?>
                </td>
                <td class="text-center text-wrap" style="width: 17%;"><?= $row["nama"]; ?></td>
                <td class="text-center text-wrap" style="width: 14%;"><?= $row["hp"]; ?></td>
                <td style="width: 22%;">
                    <?php foreach (preg_split("/\r\n|\n|\r/", $row["anggota"]) as $anggota) : ?>
                        <?php if ($anggota <> "") { ?>
                            <br><?= $anggota; ?>
                        <?php }; ?>
                    <?php endforeach; ?>
                </td>
                <td class="text-center" style="width: 12%;"><?= $row["transportasi"]; ?></td>
                <td class="text-center" style="width: 8%;"><?= $row["dewasa"]; ?></td>
                <td class="text-center" style="width: 6%;"><?= $row["anak"]; ?></td>
                <td class="text-center" style="width: 7%;"><?= $row["bayar"]; ?></td>
                <td class="text-center text-wrap" style="width: 10%;"><?= date('d-m-Y', strtotime($row["updated_at"])); ?></td>
            </tr>
            <?php $i += 1; ?>
        <?php endforeach; ?>
        <tr>
            <td style="width: 69%; border: none"></td>
            <td class="text-center" style="width: 8%;"><?= $total["dewasa"]; ?></td>
            <td class="text-center" style="width: 6%;"><?= $total["anak"]; ?></td>
            <td class="text-center" style="width: 17%;">Rp <?= number_format($total["bayar"], 0, ',', '.'); ?></td>
        </tr>
    </tbody>
</table>
<h2><strong>Total dewasa yang sudah bayar : <?= $total["dewasa_bayar"]; ?> Orang<strong></h2>
<h2><strong>Dengan total uang masuk : Rp <?= number_format($total["bayar"], 0, ',', '.'); ?><strong></h2>