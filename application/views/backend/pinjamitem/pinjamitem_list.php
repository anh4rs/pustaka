<div class="content-wrapper">
    <section class="content-header">
      <h1> Pinjamitem List
        <small>Referensi</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">pinjamitem</li>
      </ol>
    </section>
    <br>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-warning">
            <div class="box-header">
              <?php echo anchor(site_url('pinjamitem/create'),'<i class="fa fa-plus" aria-hidden="true"></i> Tambah', 'class="btn btn-primary"'); ?>

            </div>

            <!-- /.box-header -->
            <div class="box-body ">
        <table class="table table-bordered table-striped table-hover" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Pinjam Id</th>
		    <th>Buku Id</th>
		    <th>Jumlah</th>
		    <th width="200px">Action</th>
                </tr>
            </thead><tbody>
	    
</tbody>
</table>
          </div>
          <!-- /.box-body -->

        </div>
      </div>
      </div>
    </section>
  </div>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
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
                    ajax: {"url": "pinjamitem/json", "type": "POST"},
                    columns: [
                        {
                            "data": "pitem",
                            "orderable": false
                        },{"data": "pinjam_id"},{"data": "buku_id"},{"data": "jumlah"},
                        {
                            "data" : "action",
                            "orderable": false,
                            "className" : "text-center"
                        }
                    ],
                    order: [[0, 'desc']],
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
