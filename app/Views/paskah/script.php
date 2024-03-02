<script>
    function clear_form_panitia() {
        $('#modalnama').val('');
        $('#hp').val('');
        $('#anggota').val('');
        $('#dewasa').val('');
        $('#anak').val('');
        $('#bayar').val('');
    }

    function method_url(baseurl, controler, method) {
        var base_url = baseurl + controler + '/' + method;
        return base_url;
    }

    $(document).ready(function() {
        $('#keyword').on('keyup', function() {
            var keyword = $(this).val(),
                baseurl = $('#baseurl').val(),
                page = 1;
            $.ajax({
                url: method_url(baseurl, 'paskah', 'searchData'),
                data: {
                    keyword: keyword,
                    page: page,
                },
                method: 'post',
                dataType: 'html',
                success: function(data) {
                    $('.tabelDataPendaftaran').html(data);
                }
            });
        });

        $('#keywordpanitia').on('keyup', function() {
            var keyword = $(this).val(),
                baseurl = $('#baseurl').val(),
                page = 1;
            $.ajax({
                url: method_url(baseurl, 'paskah', 'searchDataPanitia'),
                data: {
                    keyword: keyword,
                    page: page,
                },
                method: 'post',
                dataType: 'html',
                success: function(data) {
                    $('.tabelDataPendaftaran').html(data);
                }
            });
        });

        $('.modalpanitia').on('click', function() {
            const id = $(this).data('id'),
                baseurl = $('#baseurl').val();
            clear_form_panitia();
            $('#modalnama').prop('disabled', true);
            $('#hp').prop('disabled', true);
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
                }
            });
        });

        $('.updatedata').on('click', function() {
            var id = $('#keyword').val(),
                anggota = $('#anggota').val(),
                transportasi = $('#transportasi').val(),
                dewasa = $('#dewasa').val(),
                anak = $('#anak').val(),
                bayar = $('#bayar').val(),
                baseurl = $('#baseurl').val();
            $.ajax({
                url: method_url(baseurl, 'Paskah', 'updatedata'),
                data: {
                    id: id,
                    anggota: anggota,
                    transportasi: transportasi,
                    dewasa: dewasa,
                    anak: anak,
                    bayar: bayar,
                },
                method: 'post',
                dataType: 'html',
                success: function(data) {
                    $('.tabelDataPendaftaran').html(data);
                }
            });
        });

        $("input:radio").on('click', function() {
            const equipment = $(this).data('equipment'),
                status = $("[name=" + equipment + "]:checked").val();
            // console.log(status);
            if (status == 'Sesuai' || status == 'Tidak Ketemu') {
                $('#submit' + equipment).prop('disabled', false);
                $('#edit' + equipment).prop('disabled', true);
            } else if (status == 'Tidak Sesuai') {
                $('#submit' + equipment).prop('disabled', true);
                $('#edit' + equipment).prop('disabled', false);
            };
        });

        $("input:checkbox").on('change', function() {
            var keyword = $('#keyword').val(),
                page = 1,
                belum = $(this).is(":checked");
            $.ajax({
                url: method_url('DataEquipment', 'search'),
                data: {
                    keyword: keyword,
                    page: page,
                    belum: belum,
                },
                method: 'post',
                dataType: 'html',
                success: function(data) {
                    $('.tabelDataEquipment').html(data);
                }
            });
        });

        $(".page-link").on('click', function() {
            var page = $(this).data('page'),
                keyword = $('#keyword').val(),
                belum = $("input:checkbox").is(":checked");
            $.ajax({
                url: method_url('DataEquipment', 'search'),
                data: {
                    keyword: keyword,
                    page: page,
                    belum: belum,
                },
                method: 'post',
                dataType: 'html',
                success: function(data) {
                    $('.tabelDataEquipment').html(data);
                }
            });
        });


        $('.hapusdata').on('click', function() {
            var key = $(this).data('key'),
                page = $(".active .page-link").data('page'),
                keyword = $('#keyword').val(),
                belum = $("input:checkbox").is(":checked");
            $.ajax({
                url: method_url('DataEquipment', 'delete'),
                data: {
                    key: key,
                    page: page,
                    keyword: keyword,
                    belum: belum,
                },
                method: 'post',
                dataType: 'html',
                success: function(data) {
                    $('.tabelDataEquipment').html(data);
                }
            });
        });


        $('.edittambahdata').on('click', function() {
            const key = $(this).data('key');
            clear_form_equipment();
            $('#kode').prop('disabled', true);
            $('#company').prop('disabled', true);
            $('.baris_company').prop('hidden', false);
            $('#modalstatus').val('Tambah');
            $('#updatedataequipment').html('Update Data');
            $.ajax({
                url: method_url('DataEquipment', 'getcekequipment'),
                data: {
                    key: key,
                },
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    $('#kode').val(data.kode);
                    $('#user').val(data.user);
                    $('#lokasi').val(data.lokasi);
                    $('#company').val(data.id_key.slice(data.kode.length + 1, data.id_key.length));
                    $('#keterangan').val('');
                }
            });
        });

        $('#kode').on('keyup', function() {
            tombol_data_equipment();
        });
        $('#user').on('keyup', function() {
            tombol_data_equipment();
        });
        $('#lokasi').on('keyup', function() {
            tombol_data_equipment();
        });
    });

    $(document).ready(function() {
        $('.modaltambah').on('click', function() {
            clear_form_equipment();
            $('.baris_company').prop('hidden', false);
            $('#kode').prop('disabled', false);
            $('#company').prop('disabled', false);
            $('#modalstatus').val($(this).data('info'));
            $('#updatedataequipment').html('Tambah Data');
            $('.saveEquipment').prop('disabled', true);
        });
    });

    $(document).ready(function() {
        $('#updatedataequipment').on('click', function() {
            var kode = $('#kode').val(),
                user = $('#user').val(),
                lokasi = $('#lokasi').val(),
                keterangan = $('#keterangan').val(),
                status = $('#modalstatus').val(),
                keyword = $('#keyword').val(),
                page = $(".active .page-link").data('page'),
                id = $('#id').val(),
                company = $('#company').val(),
                belum = $("input:checkbox").is(":checked");
            $.ajax({
                url: method_url('DataEquipment', 'insertedit'),
                data: {
                    kode: kode,
                    user: user,
                    lokasi: lokasi,
                    keterangan: keterangan,
                    status: status,
                    id: id,
                    company: company,
                    keyword: keyword,
                    page: page,
                    belum: belum,
                },
                method: 'post',
                dataType: 'html',
                success: function(data) {
                    $('.tabelDataEquipment').html(data);
                }
            });
        });
    });
</script>