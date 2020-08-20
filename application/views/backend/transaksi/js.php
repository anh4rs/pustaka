<script type="text/javascript">
    $(document).ready(function() {
        $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
            return {
                "iStart": oSettings._iDisplayStart,
                "iEnd": oSettings.fnDisplayEnd(),
                "iLength": oSettings._iDisplayLength,
                "iTotal": oSettings.fnRecordsTotal(),
                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
            };
        };

        var t = $("#mytable").dataTable({
            initComplete: function() {
                var api = this.api();
                $('#mytable_filter input')
                    .off('.DT')
                    .on('keyup.DT', function(e) {
                        if (e.keyCode == 13) {
                            api.search(this.value).draw();
                        }
                    });
            },
            oLanguage: {
                sProcessing: "loading..."
            },
            processing: true,
            serverSide: true,
            ajax: {
                "url": "transaksi/json",
                "type": "POST"
            },
            columns: [{
                    "data": "pinjam_id",
                    "orderable": false
                },
                {
                    "data": "kodeunik_pinjam"
                },
                {
                    "data": "siswa_id"
                },
                {
                    "data": "siswa_nama"
                },
                {
                    "data": "buku_id"
                },
                {
                    "data": "buku_judul"
                },
                {
                    "data": "pinjam_tanggal"
                },
                {
                    "data": "action",
                    "orderable": false,
                    "className": "text-center"
                }
            ],
            order: [
                [0, 'desc']
            ],
            rowCallback: function(row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                $('td:eq(0)', row).html(index);
            }
        });
    });
</script>


<script type="text/javascript">
    // $(function() {
    $(document).ready(function() {
        $("#lookupSiswa").dataTable();
        $("#lookupBuku").dataTable();
        $('[data-toggle="tooltip"]').tooltip()
        $(".searchSiswa").click(function() {
            let kdpinjam = $('.kdpinjam').val();
            let tglpinjam = $('.tglpinjam').val();
            let tglkembali = $('.tglkembali').val();
            if (kdpinjam == '' || tglpinjam == '' || tglkembali == '') {
                alert('isi data dulu');
            } else {
                $("#modalSiswa").modal('show');
                return false;
            }
        });

        $(document).on("click", ".pilihSiswa", function() {
            let id = $(this).data('id');
            let nama = $(this).data('nama');
            let nisn = $(this).data('nisn');
            $(".siswaCari").val(nisn);
            $(".siswaNama").val(nama);

            let kdpinjam = $('.kdpinjam').val();
            let tglpinjam = $('.tglpinjam').val();
            let tglkembali = $('.tglkembali').val();
            $("#save_nisn").val(nisn);
            $("#save_id_siswa").val(id);
            $("#save_nopinjam").val(kdpinjam);
            $("#save_tglpinjam").val(save_tglpinjam);
            $("#save_tglpinjam").val(tglpinjam);
            $("#save_tglkembali").val(tglkembali);
            // $(".siswaNisn").val(nisn)
            $("#modalSiswa").modal('hide');
            return false;
        });

        $(".searchBuku").click(function() {
            $("#modalBuku").modal('show');
            return false;
        });



        $(".formpinjam").submit(function(e) {
            // e.preventDefault();
            let url = $(this).attr("action");
            $.ajax({
                type: "post",
                url: url,
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {
                    $(".btnProses").attr('disable', 'disabled');
                    $(".btnProses").html("<i class='fa fa-spin fa-spiner'></i>");
                },
                complete: function() {
                    $(".btnProses").removeAttr('disable');
                    $(".btnProses").html(`<i style="font-size: 35px;" class="fa fa-floppy-o "></i><br><b>PROSES<br> PEMINJAMAN</b>`);
                },
                success: function(response) {
                    if (response.sukses) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.sukses,
                            showConfirmButton: false,
                            timer: 5000
                        })
                    }
                },
                error: function(xhr, textStatus, errorThrown) {

                },
            });
        });
    });

    $(document).on('click', '.pilihBuku', function() {
        let bukuid = $(this).data('bukuid');
        let bukuPengarang = $(this).data('bukupengarang');
        let bukuJudul = $(this).data('bukujudul');
        let bukuPenerbit = $(this).data('bukupenerbit');
        let bukuTahun = $(this).data('bukutahun');
        $(".idBuku").val(bukuid)
        $(".buku_pengarang").val(bukuPengarang)
        $(".buku_judul").val(bukuJudul)
        $(".buku_penerbit").val(bukuPenerbit)
        $("#modalBuku").modal('hide');

        entriBuku(bukuid, bukuPengarang, bukuJudul, bukuPenerbit, bukuTahun);

        return false;
    });

    function entriBuku(bukuid, bukuPengarang, bukuJudul, bukuPenerbit, bukuTahun) {
        $(".bukus tbody").append(`
        <tr>
            <td>` + bukuid + ` <input type="hidden" name="save_bukuid[]" value="` + bukuid + `"></td>
            <td>` + bukuPengarang + `</td>
            <td>` + bukuJudul + `</td>
            <td>` + bukuPenerbit + `</td>
            <td>` + bukuTahun + `</td>
            <td> <input type="number" name="save_jumlah[]" value="1"></td>
            <td><button class="btn btn-danger btn-xs delItem" data-toggle="tooltip" data-placement="bottom" title="Batalkan"><i class="fa fa-remove"></i></button></td>
        </tr>
        `);
        return false;
    }

    $(document).on('click', '.delItem', function(e) {
        e.preventDefault();
        // $(this).parent().parent().remove(); //cara 1
        $(this).parents('tr').remove(); //cara 2
        return false;
    });
</script>