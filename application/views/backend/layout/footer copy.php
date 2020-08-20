		<footer class="main-footer">
			<div class="pull-right hidden-xs">
				Anything you want
			</div>
			<strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
		</footer>
		<div class="control-sidebar-bg"></div>
		</div>

		<script src="<?= base_url('assets/adminlte/'); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="<?= base_url('assets/adminlte/'); ?>dist/js/adminlte.min.js"></script>
		<!-- DataTables -->
		<script src="<?= base_url('assets/adminlte/'); ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
		<script src="<?= base_url('assets/adminlte/'); ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
		<!-- SlimScroll -->
		<script src="<?= base_url('assets/adminlte/'); ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
		<!-- FastClick -->
		<script src="<?= base_url('assets/adminlte/'); ?>bower_components/fastclick/lib/fastclick.js"></script>

		<!-- Sweat Alert -->
		<script src="<?= base_url('assets/node_modules/sweetalert2/dist/'); ?>sweetalert2.all.min.js"></script>
		<!-- <script src="<?= base_url('assets/node_modules/sweetalert2/dist/'); ?>promise-polyfill.js"></script> -->

		<?php if ($this->uri->segment(1) === 'transaksi') : ?>
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
		<?php endif; ?>

		<?php if (($this->uri->segment(1) === 'transaksi') and ($this->uri->segment(2) === 'pinjam')) : ?>

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

		<?php endif; ?>

		<script type="text/javascript">
			<?php if ($this->router->fetch_method() === 'kategori') : ?>

				$(document).ready(function() {
					//datatables
					$('#mytable tbody tr').on('click', '.btn-edit', function() {
						var code = $(this).data('code');
						var name = $(this).data('name');
						var price = $(this).data('price');
						var category = $(this).data('category');
						$('#editModal').modal('show');
						$('[name="product_code"]').val(code);
						$('[name="product_name"]').val(name);
						$('[name="price"]').val(price);
						$('[name="category"]').val(category);
					});

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
						aLengthMenu: [
							[5, 10, 20],
							[5, 10, 20]
						], // Combobox Limit
						ajax: {
							"url": "kategori/json",
							"type": "POST"
						},
						columns: [{
								"data": "kategori_id",
								"orderable": false,
								"className": "text-center"
							},
							{
								"data": "kategori_nama"
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
			<?php endif ?>

			<?php if ($this->router->fetch_method() === 'penerbit') : ?> $(document).ready(function() {
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
							"url": "penerbit/json",
							"type": "POST"
						},
						columns: [{
								"data": "penerbit_id",
								"orderable": false
							},
							{
								"data": "penerbit_nama"
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

			<?php endif ?>

			<?php if ($this->router->fetch_method() === 'pengadaan') : ?> $(document).ready(function() {
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
							"url": "pengadaan/json",
							"type": "POST"
						},
						columns: [{
								"data": "pengadaan_id",
								"orderable": false
							},
							{
								"data": "pengadaan_tanggal"
							},
							{
								"data": "buku_id"
							},
							{
								"data": "pengadaan_asal_buku"
							},
							{
								"data": "pengadaan_jumlah"
							},
							{
								"data": "pengadaan_keterangan"
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
			<?php endif ?>

			<?php if ($this->router->fetch_method() === 'buku') : ?>

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
							"url": "buku/json",
							"type": "POST"
						},
						columns: [{
								"data": "buku_id",
								"orderable": false
							},
							{
								"data": "buku_gambar"
							},
							{
								"data": "buku_judul"
							},
							{
								"data": "kategori_id"
							},
							{
								"data": "buku_pengarang"
							},

							{
								"data": "buku_jumlah"
							},
							{
								"data": "penerbit_id"
							},
							{
								"data": "buku_tahun_terbit"
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

			<?php endif ?>

			<?php if ($this->router->fetch_method() === 'siswa') : ?>

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
							"url": "siswa/json",
							"type": "POST"
						},

						columns: [{
								"data": "siswa_id",
								"orderable": false
							},
							{
								"data": "siswa_foto"
							},
							{
								"data": "siswa_nama"
							},
							{
								"data": "siswa_nisn"
							},
							{
								"data": "siswa_kelamin"
							},
							{
								"data": "siswa_alamat"
							},
							{
								"data": "siswa_no_hp"
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

			<?php endif ?>

			function del(id) {
				if (confirm('Apakah kamu yakin untuk hapus data ini ?')) {
					location.href = "<?= site_url() . $this->router->fetch_method() ?>/delete/" + id
				}
			}
		</script>
		</body>

		</html>