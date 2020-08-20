<div class="content-wrapper">
    <section class="content-header">
      <h1><small>Form</small> Penerbit
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Penerbit</li>
      </ol>
    </section>
    <br>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

<div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Penerbit <?php echo $button ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
        
        <table class="table">
	    <tr><td>Penerbit Nama</td><td><?php echo $penerbit_nama; ?></td></tr>
	    <tr><td>Created By</td><td><?php echo $created_by; ?></td></tr>
	    <tr><td>Created Date</td><td><?php echo $created_date; ?></td></tr>
	    <tr><td>Updated By</td><td><?php echo $updated_by; ?></td></tr>
	    <tr><td>Updated Date</td><td><?php echo $updated_date; ?></td></tr>
	    <tr><td>Deleted By</td><td><?php echo $deleted_by; ?></td></tr>
	    <tr><td>Deleted Date</td><td><?php echo $deleted_date; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('penerbit') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
                </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
  </div>

