<div class="content-wrapper">
    <section class="content-header">
      <h1><small>Form</small> Migrations
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Migrations</li>
      </ol>
    </section>
    <br>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

<div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Migrations <?php echo $button ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
        
        <table class="table">
	    <tr><td>Version</td><td><?php echo $version; ?></td></tr>
	    <tr><td>Class</td><td><?php echo $class; ?></td></tr>
	    <tr><td>Group</td><td><?php echo $group; ?></td></tr>
	    <tr><td>Namespace</td><td><?php echo $namespace; ?></td></tr>
	    <tr><td>Time</td><td><?php echo $time; ?></td></tr>
	    <tr><td>Batch</td><td><?php echo $batch; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('migrations') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
                </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
  </div>

