<div class="content-wrapper">
    <section class="content-header">
      <h1><small>Form</small> Siswa
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Siswa</li>
      </ol>
    </section>
    <br>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

<div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Siswa <?php echo $button ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
        
        <table class="table">
	    <tr><td>Siswa Nama</td><td><?php echo $siswa_nama; ?></td></tr>
	    <tr><td>Siswa Nisn</td><td><?php echo $siswa_nisn; ?></td></tr>
	    <tr><td>Siswa Kelamin</td><td><?php echo $siswa_kelamin; ?></td></tr>
	    <tr><td>Siswa Agama</td><td><?php echo $siswa_agama; ?></td></tr>
	    <tr><td>Siswa Tempat Lhr</td><td><?php echo $siswa_tempat_lhr; ?></td></tr>
	    <tr><td>Siswa Tanggal Lhr</td><td><?php echo $siswa_tanggal_lhr; ?></td></tr>
	    <tr><td>Siswa Alamat</td><td><?php echo $siswa_alamat; ?></td></tr>
	    <tr><td>Siswa No Hp</td><td><?php echo $siswa_no_hp; ?></td></tr>
	    <tr><td>Siswa Foto</td><td><?php echo $siswa_foto; ?></td></tr>
	    <tr><td>Created By</td><td><?php echo $created_by; ?></td></tr>
	    <tr><td>Created Date</td><td><?php echo $created_date; ?></td></tr>
	    <tr><td>Updated By</td><td><?php echo $updated_by; ?></td></tr>
	    <tr><td>Updated Date</td><td><?php echo $updated_date; ?></td></tr>
	    <tr><td>Deleted By</td><td><?php echo $deleted_by; ?></td></tr>
	    <tr><td>Deleted Date</td><td><?php echo $deleted_date; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('siswa') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
                </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
  </div>

