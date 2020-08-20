<div class="content-wrapper">
    <section class="content-header">
      <h1><small>Form</small> Kembali
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Kembali</li>
      </ol>
    </section>
    <br>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

<div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Kembali <?php echo $button ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                    <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Pinjam Id <?php echo form_error('pinjam_id') ?></label>
            <input type="text" class="form-control" name="pinjam_id" id="pinjam_id" placeholder="Pinjam Id" value="<?php echo $pinjam_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Tgl Kembali <?php echo form_error('tgl_kembali') ?></label>
            <input type="text" class="form-control" name="tgl_kembali" id="tgl_kembali" placeholder="Tgl Kembali" value="<?php echo $tgl_kembali; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Denda <?php echo form_error('denda') ?></label>
            <input type="text" class="form-control" name="denda" id="denda" placeholder="Denda" value="<?php echo $denda; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Created By <?php echo form_error('created_by') ?></label>
            <input type="text" class="form-control" name="created_by" id="created_by" placeholder="Created By" value="<?php echo $created_by; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Created Date <?php echo form_error('created_date') ?></label>
            <input type="text" class="form-control" name="created_date" id="created_date" placeholder="Created Date" value="<?php echo $created_date; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Updated By <?php echo form_error('updated_by') ?></label>
            <input type="text" class="form-control" name="updated_by" id="updated_by" placeholder="Updated By" value="<?php echo $updated_by; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Updated Date <?php echo form_error('updated_date') ?></label>
            <input type="text" class="form-control" name="updated_date" id="updated_date" placeholder="Updated Date" value="<?php echo $updated_date; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Deleted By <?php echo form_error('deleted_by') ?></label>
            <input type="text" class="form-control" name="deleted_by" id="deleted_by" placeholder="Deleted By" value="<?php echo $deleted_by; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Deleted Date <?php echo form_error('deleted_date') ?></label>
            <input type="text" class="form-control" name="deleted_date" id="deleted_date" placeholder="Deleted Date" value="<?php echo $deleted_date; ?>" />
        </div>
	    <input type="hidden" name="kembali_id" value="<?php echo $kembali_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('kembali') ?>" class="btn btn-default">Cancel</a>
	</form>
              

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
  </div>

