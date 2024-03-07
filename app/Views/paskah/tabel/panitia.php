<input type="hidden" name="baseurl" id="baseurl" value="<?= base_url(); ?>">
<div class="flash">
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert" style="padding: 6px 12px; margin-bottom: 8px;">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>
</div>
<table id="tabelDataPendaftaran" class="table table-striped" style="width:100%">
    <thead>
        <tr class="table-dark">
            <th class="text-center">Nama</th>
            <th class="text-center">Bayar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($jemaat as $row) : ?>
            <tr>
                <td class="text-center align-middle m-1 p-1 text-dark" style="width: 65%;">
                    <a href="" class="link-primary modalpanitia" data-bs-toggle="modal" data-bs-target="#formpanitia" data-id="<?= $row["id"]; ?>" data-pic="<?= ($row["pic"] == user()->username) or is_null($row["pic"]); ?>" name="nama" id="nama">
                        <?= $row["nama"]; ?>
                    </a>
                </td>
                <td class="text-center align-middle m-1 p-1" style="width: 35%;">
                    <?php if (is_null($row['bayar'])) : ?>
                        <i class="fas fa-circle-xmark" id="status"></i>
                        <?php if (in_groups('bendahara')) : ?>
                            <button type="button" id="status" class="btn btn-danger btn-sm dihapus text-dark ms-2 fw-bold" data-bs-toggle="modal" data-bs-target="#formhapus" data-id="<?= $row["id"]; ?>">Delete</button>
                        <?php endif; ?>
                    <?php else : ?>
                        <?= number_format($row["bayar"], 0, ',', '.'); ?>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php if ($summary["pic"] != false) : ?>
    <h3 class="text-black fw-bold" style="text-shadow: 2px 2px white;"><?= $summary["pic"] . " : Rp " . number_format($summary["total"], 2, ',', '.') ?></h3>
<?php endif; ?>
<script>
    $(document).ready(function() {
        $('.modalpanitia').on('click', function() {
            const id = $(this).data('id'),
                baseurl = $('#baseurl').val();
            clear_form_panitia();
            $('#modalnama').prop('disabled', true);
            $('#hp').prop('disabled', true);
            if ($('#siapa').val() == 1 && $(this).data('pic') == 1) {
                $('#updatepanitia').prop('hidden', false);
            } else {
                $('#updatepanitia').prop('hidden', true);
            }
            $.ajax({
                url: method_url(baseurl, 'Paskah', 'getdata'),
                data: {
                    id: id,
                },
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    $('#modalnama').val(data.nama);
                    $('#hp').val(data.hp);
                    $('#anggota').val(data.anggota);
                    $('#transportasi').val(data.transportasi);
                    $('#dewasa').val(data.dewasa);
                    $('#anak').val(data.anak);
                    $('#bayar').val(data.bayar);
                    $('#id').val(data.id);
                    if (data.pic === null) {
                        $('#pic').html('Belum Dibayar');
                    } else {
                        $('#pic').html('Penerima : ' + data.pic);
                    }

                }
            });
        });
        $('.dihapus').on('click', function() {
            $('#idhapus').val($(this).data('id'))
        });
    });
</script>