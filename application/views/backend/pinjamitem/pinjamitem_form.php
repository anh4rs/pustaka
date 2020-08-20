<div class="content-wrapper">
    <section class="content-header">
      <h1><small>Form</small> Pinjamitem
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pinjamitem</li>
      </ol>
    </section>
    <br>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

<div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Pinjamitem <?php echo $button ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                    <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Pinjam Id <?php echo form_error('pinjam_id') ?></label>
            <input type="text" class="form-control" name="pinjam_id" id="pinjam_id" placeholder="Pinjam Id" value="<?php echo $pinjam_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Buku Id <?php echo form_error('buku_id') ?></label>
            <input type="text" class="form-control" name="buku_id" id="buku_id" placeholder="Buku Id" value="<?php echo $buku_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Jumlah <?php echo form_error('jumlah') ?></label>
            <input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah" value="<?php echo $jumlah; ?>" />
        </div>
	    <input type="hidden" name="pitem" value="<?php echo $pitem; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pinjamitem') ?>" class="btn btn-default">Cancel</a>
	</form>
              

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
  </div>

