			<script type="text/javascript">
				let save_method;
				let table;
				let url = "<?= $this->uri->segment(1); ?>";
				let urlupper = "<?= ucfirst($this->uri->segment(1)) ?>";

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

					table = $("#mytable").DataTable({
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
							"url": "<?= site_url() ?>" + url + "/json",
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
								"data": "penerbit_id"
							},
							{
								"data": "buku_jumlah"
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

				function reload_table() {
					table.ajax.reload(); //reload datatable ajax 
				}

				function btnSimpan() {
					let save_method = $('[name="_method"]').val();

					let action;
					if (save_method == 'add') {
						action = "<?php echo site_url() ?>" + url + "/save"
					} else {
						action = "<?php echo site_url() ?>" + url + "/update"
					}
					$.ajax({
						type: "post",
						url: action,
						data: $('#form').serialize(),
						dataType: "json",
						success: function(response) {
							if (response.sukses) {
								Swal.fire({
									icon: 'success',
									title: 'Berhasil',
									html: response.sukses,
								})
								$("#modalform").modal('hide');
								$("#form")[0].reset();
								reload_table();
							}
							if (response.error) {
								$("#pesan").html(response.error).show();
								Swal.fire({
									icon: 'error',
									title: 'Oops, Terjadi kesalahan',
									html: response.error,
								})
							}
						},
						error: function(jqXHR, textStatus, errorThrown) {
							Swal.fire({
								icon: 'error',
								title: 'Ooops, tidak dapat terhubung ke server',
								text: jqXHR.textStatus,
								showConfirmButton: false,
								timer: 5000
							})
						}
					});
				}

				function btnEdit(id) {
					$.ajax({
						type: "post",
						url: "<?= site_url() ?>" + url + "/edit",
						data: {
							id: id
						},
						dataType: "json",
						success: function(response) {
							if (response.sukses) {
								$(".viewmodal").html(response.sukses).show();
								$("#modalform").modal('show');
								$(".modal-title").text(`Form Edit Data ` + urlupper);

								$('#btnSave').text('Update');
							}

						}
					});
					return false;
				}

				function btnDel(id) {
					Swal.fire({
						title: 'Hapus !',
						html: "<h5>Yakin untuk menghapus data ini?</h5>",
						icon: 'warning',
						showCancelButton: true,
						confirmButtonColor: '#3085d6',
						cancelButtonColor: '#d33',
						confirmButtonText: 'Ya',
						cancelButtonText: 'Tidak',
					}).then((result) => {
						if (result.value) {
							$.ajax({
								type: "post",
								url: "<?= site_url() ?>" + url + "/delete",
								data: {
									id: id
								},
								dataType: "json",
								success: function(response) {
									if (response.sukses) {

										Swal.fire({
											icon: 'success',
											title: 'Berhasil',
											html: response.sukses,

										});
										reload_table();
									}
									if (response.error) {
										$("#pesan").html(response.error).show();
									}
								},
								error: function(jqXHR, textStatus, errorThrown) {
									Swal.fire({
										icon: 'error',
										title: 'Ooops, tidak dapat terhubung ke server',
										text: textStatus,
										showConfirmButton: false,
										timer: 5000
									})
								}
							});
						}
					})
				}

				function btnAdd() {
					$.ajax({
						url: "<?= site_url() ?>" + url + "/create",
						dataType: "json",
						success: function(response) {
							if (response.sukses) {
								$(".viewmodal").html(response.sukses).show();
								$("#modalform").modal('show');
								$(".modal-title").text(`Form Tambah ` + urlupper + ` Baru`);
								$('[name="_method"]').val('add');
							}

						}
					});
					return false;
				}
			</script>