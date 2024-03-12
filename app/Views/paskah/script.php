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
                    console.log('ok');
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

        $('#keywordsetoran').on('keyup', function() {
            var keyword = $(this).val(),
                baseurl = $('#baseurl').val(),
                page = 1;
            $.ajax({
                url: method_url(baseurl, 'paskah', 'searchDataSetoran'),
                data: {
                    keyword: keyword,
                    page: page,
                },
                method: 'post',
                dataType: 'html',
                success: function(data) {
                    $('.tabelDataSetoran').html(data);
                }
            });
        });

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

        $('.diterima').on('click', function() {
            $('#id').val($(this).data('id'))
        });

        $('.dihapus').on('click', function() {
            $('#idhapus').val($(this).data('id'))
        });

        $('.updatedata').on('click', function() {
            var id = $('#id').val(),
                nama = $('#modalnama').val(),
                anggota = $('#anggota').val(),
                transportasi = $('#transportasi').val(),
                dewasa = $('#dewasa').val(),
                anak = $('#anak').val(),
                bayar = $('#bayar').val(),
                keyword = $('#keywordpanitia').val(),
                page = 1,
                baseurl = $('#baseurl').val();
            $.ajax({
                url: method_url(baseurl, 'Paskah', 'updatedata'),
                data: {
                    id: id,
                    nama: nama,
                    anggota: anggota,
                    transportasi: transportasi,
                    dewasa: dewasa,
                    anak: anak,
                    bayar: bayar,
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

        $('.setor').on('click', function() {
            var jumlah = $('#jumlahSetor').val(),
                baseurl = $('#baseurl').val();
            $.ajax({
                url: method_url(baseurl, 'Paskah', 'setor'),
                data: {
                    jumlah: jumlah,
                },
                method: 'post',
                dataType: 'html',
                success: function(data) {
                    $('.tabelDataPendaftaran').html(data);
                }
            });
        });

        $('.terima').on('click', function() {
            var id = $('#id').val(),
                baseurl = $('#baseurl').val();
            $.ajax({
                url: method_url(baseurl, 'Paskah', 'updatesetor'),
                data: {
                    id: id,
                },
                method: 'post',
                dataType: 'html',
                success: function(data) {
                    $('.tabelDataSetoran').html(data);
                }
            });
        });

        $('.hapus').on('click', function() {
            var id = $('#idhapus').val(),
                baseurl = $('#baseurl').val();
            $.ajax({
                url: method_url(baseurl, 'Paskah', 'deletejemaat'),
                data: {
                    id: id,
                },
                method: 'post',
                dataType: 'html',
                success: function(data) {
                    $('.tabelDataPendaftaran').html(data);
                }
            });
        });

        $(".linkD").on('click', function() {
            var page = $(this).data('page'),
                baseurl = $('#baseurl').val(),
                keyword = $('#keyword').val();
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

        $(".linkP").on('click', function() {
            var page = $(this).data('page'),
                baseurl = $('#baseurl').val(),
                keyword = $('#keywordpanitia').val();
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