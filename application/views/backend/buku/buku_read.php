<div class="content-wrapper">
    <section class="content-header">
      <h1><small>Form</small> Buku
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Buku</li>
      </ol>
    </section>
    <br>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

<div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Buku <?php echo $button ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
        
        <table class="table">
	    <tr><td>Buku Judul</td><td><?php echo $buku_judul; ?></td></tr>
	    <tr><td>Kategori Id</td><td><?php echo $kategori_id; ?></td></tr>
	    <tr><td>Penerbit Id</td><td><?php echo $penerbit_id; ?></td></tr>
	    <tr><td>Buku Isbn</td><td><?php echo $buku_isbn; ?></td></tr>
	    <tr><td>Buku Pengarang</td><td><?php echo $buku_pengarang; ?></td></tr>
	    <tr><td>Buku Halaman</td><td><?php echo $buku_halaman; ?></td></tr>
	    <tr><td>Buku Jumlah</td><td><?php echo $buku_jumlah; ?></td></tr>
	    <tr><td>Buku Tahun Terbit</td><td><?php echo $buku_tahun_terbit; ?></td></tr>
	    <tr><td>Buku Gambar</td><td><?php echo $buku_gambar; ?></td></tr>
	    <tr><td>Buku Sinopsis</td><td><?php echo $buku_sinopsis; ?></td></tr>
	    <tr><td>Created By</td><td><?php echo $created_by; ?></td></tr>
	    <tr><td>Created Date</td><td><?php echo $created_date; ?></td></tr>
	    <tr><td>Updated By</td><td><?php echo $updated_by; ?></td></tr>
	    <tr><td>Updated Date</td><td><?php echo $updated_date; ?></td></tr>
	    <tr><td>Deleted By</td><td><?php echo $deleted_by; ?></td></tr>
	    <tr><td>Deleted Date</td><td><?php echo $deleted_date; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('buku') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
                </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
  </div>

