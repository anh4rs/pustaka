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

                    <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Kodeunik Pinjam <?php echo form_error('kodeunik_pinjam') ?></label>
            <input type="text" class="form-control" name="kodeunik_pinjam" id="kodeunik_pinjam" placeholder="Kodeunik Pinjam" value="<?php echo $kodeunik_pinjam; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Pinjam Tanggal <?php echo form_error('pinjam_tanggal') ?></label>
            <input type="text" class="form-control" name="pinjam_tanggal" id="pinjam_tanggal" placeholder="Pinjam Tanggal" value="<?php echo $pinjam_tanggal; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Siswa Id <?php echo form_error('siswa_id') ?></label>
            <input type="text" class="form-control" name="siswa_id" id="siswa_id" placeholder="Siswa Id" value="<?php echo $siswa_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Pinjam Ket <?php echo form_error('pinjam_ket') ?></label>
            <input type="text" class="form-control" name="pinjam_ket" id="pinjam_ket" placeholder="Pinjam Ket" value="<?php echo $pinjam_ket; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Pinjam Lama <?php echo form_error('pinjam_lama') ?></label>
            <input type="text" class="form-control" name="pinjam_lama" id="pinjam_lama" placeholder="Pinjam Lama" value="<?php echo $pinjam_lama; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Pinjam Status <?php echo form_error('pinjam_status') ?></label>
            <input type="text" class="form-control" name="pinjam_status" id="pinjam_status" placeholder="Pinjam Status" value="<?php echo $pinjam_status; ?>" />
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
	    <input type="hidden" name="pinjam_id" value="<?php echo $pinjam_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pinjam') ?>" class="btn btn-default">Cancel</a>
	</form>
              

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
  </div>

