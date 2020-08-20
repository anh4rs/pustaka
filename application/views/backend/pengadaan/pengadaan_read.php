<div class="content-wrapper">
    <section class="content-header">
      <h1><small>Form</small> Pengadaan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pengadaan</li>
      </ol>
    </section>
    <br>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

<div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Pengadaan <?php echo $button ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
        
        <table class="table">
	    <tr><td>Pengadaan Tanggal</td><td><?php echo $pengadaan_tanggal; ?></td></tr>
	    <tr><td>Buku Id</td><td><?php echo $buku_id; ?></td></tr>
	    <tr><td>Pengadaan Asal Buku</td><td><?php echo $pengadaan_asal_buku; ?></td></tr>
	    <tr><td>Pengadaan Jumlah</td><td><?php echo $pengadaan_jumlah; ?></td></tr>
	    <tr><td>Pengadaan Keterangan</td><td><?php echo $pengadaan_keterangan; ?></td></tr>
	    <tr><td>Created By</td><td><?php echo $created_by; ?></td></tr>
	    <tr><td>Created Date</td><td><?php echo $created_date; ?></td></tr>
	    <tr><td>Updated By</td><td><?php echo $updated_by; ?></td></tr>
	    <tr><td>Updated Date</td><td><?php echo $updated_date; ?></td></tr>
	    <tr><td>Deleted By</td><td><?php echo $deleted_by; ?></td></tr>
	    <tr><td>Deleted Date</td><td><?php echo $deleted_date; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('pengadaan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
                </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
  </div>

