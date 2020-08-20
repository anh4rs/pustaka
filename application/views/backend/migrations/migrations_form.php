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

                    <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Version <?php echo form_error('version') ?></label>
            <input type="text" class="form-control" name="version" id="version" placeholder="Version" value="<?php echo $version; ?>" />
        </div>
	    <div class="form-group">
            <label for="class">Class <?php echo form_error('class') ?></label>
            <textarea class="form-control" rows="3" name="class" id="class" placeholder="Class"><?php echo $class; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Group <?php echo form_error('group') ?></label>
            <input type="text" class="form-control" name="group" id="group" placeholder="Group" value="<?php echo $group; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Namespace <?php echo form_error('namespace') ?></label>
            <input type="text" class="form-control" name="namespace" id="namespace" placeholder="Namespace" value="<?php echo $namespace; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Time <?php echo form_error('time') ?></label>
            <input type="text" class="form-control" name="time" id="time" placeholder="Time" value="<?php echo $time; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Batch <?php echo form_error('batch') ?></label>
            <input type="text" class="form-control" name="batch" id="batch" placeholder="Batch" value="<?php echo $batch; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('migrations') ?>" class="btn btn-default">Cancel</a>
	</form>
              

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
  </div>

