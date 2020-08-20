<div class="content-wrapper">
    <section class="content-header">
      <h1><small>Form</small> Pinjam
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pinjam</li>
      </ol>
    </section>
    <br>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

<div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Pinjam <?php echo $button ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
        
        <table class="table">
	    <tr><td>Kodeunik Pinjam</td><td><?php echo $kodeunik_pinjam; ?></td></tr>
	    <tr><td>Pinjam Tanggal</td><td><?php echo $pinjam_tanggal; ?></td></tr>
	    <tr><td>Siswa Id</td><td><?php echo $siswa_id; ?></td></tr>
	    <tr><td>Pinjam Ket</td><td><?php echo $pinjam_ket; ?></td></tr>
	    <tr><td>Pinjam Lama</td><td><?php echo $pinjam_lama; ?></td></tr>
	    <tr><td>Pinjam Status</td><td><?php echo $pinjam_status; ?></td></tr>
	    <tr><td>Created By</td><td><?php echo $created_by; ?></td></tr>
	    <tr><td>Created Date</td><td><?php echo $created_date; ?></td></tr>
	    <tr><td>Updated By</td><td><?php echo $updated_by; ?></td></tr>
	    <tr><td>Updated Date</td><td><?php echo $updated_date; ?></td></tr>
	    <tr><td>Deleted By</td><td><?php echo $deleted_by; ?></td></tr>
	    <tr><td>Deleted Date</td><td><?php echo $deleted_date; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('pinjam') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
                </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
  </div>

