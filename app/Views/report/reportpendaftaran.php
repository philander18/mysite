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
            <th class="text-center" style="width: 16%;"><strong>Nama</strong></th>
            <th class="text-center" style="width: 14%;"><strong>HP</strong></th>
            <th class="text-center" style="width: 23%;"><strong>Anggota</strong></th>
            <th class="text-center" style="width: 12%;"><strong>Transportasi</strong></th>
            <th class="text-center" style="width: 8%;"><strong>Dewasa</strong></th>
            <th class="text-center" style="width: 7%;"><strong>Anak</strong></th>
            <th class="text-center" style="width: 10%;"><strong>Bayar</strong></th>
            <th class="text-center" style="width: 10%;"><strong>Update</strong></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($jemaat as $row) : ?>
            <tr>
                <td class="text-center text-wrap" style="width: 16%;"><?= $row["nama"]; ?></td>
                <td class="text-center text-wrap" style="width: 14%;"><?= $row["hp"]; ?></td>
                <td style="width: 23%;"><?= $row["anggota"]; ?></td>
                <td class="text-center" style="width: 12%;"><?= $row["transportasi"]; ?></td>
                <td class="text-center" style="width: 8%;"><?= $row["dewasa"]; ?></td>
                <td class="text-center" style="width: 7%;"><?= $row["anak"]; ?></td>
                <td class="text-center" style="width: 10%;"><?= $row["bayar"]; ?></td>
                <td class="text-center text-wrap" style="width: 10%;"><?= date('d-m-Y', strtotime($row["updated_at"])); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>