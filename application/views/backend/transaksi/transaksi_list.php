<div class="content-wrapper">
    <section class="content-header">
      <h1>
        TRANSAKSI
      </h1>
      <div style="margin-top:15px">
        <ol class="breadcrumb">
            <li><a href="<?= site_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Transaksi</li>
        </ol>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
    <?php if (! empty($this->session->userdata('message'))) : ?>
        <div class="alert alert-success alert-dismissible" style="border-left: 5px solid #00733e; ">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses !</h4>
            Data berhasil <?= $this->session->userdata('message') ?>
        </div>
    <?php endif; ?>
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <a href="<?=base_url();?>transaksi/pinjam" class="btn btn-primary" > Transaksi Pinjam</a>
                    </div>                    
                    <div class="box-body">
                        <table class="table table-bordered table-striped" id="mytable">
                            <thead>
                                <tr>
                                    <th width="30px">#</th>
                                    <th>Kode Transaksi</th>
                                    <th>Kode Anggota</th>
                                    <th>Nama Anggota</th>
                                    <th>KD Buku</th>
                                    <th>Judul Buku</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
