<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Kategori
        </h1>
        <div style="margin-top:15px">
            <ol class="breadcrumb">
                <li><a href="<?= site_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Kategori</li>
            </ol>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php if (!empty($this->session->userdata('message'))) : ?>
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
                        <a href="<?= base_url(); ?>kategori/create" class="btn btn-primary"> Tambah</a>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-striped" id="mytable">
                            <thead>
                                <tr>
                                    <th width="30px">No</th>
                                    <th>Kategori Nama</th>
                                    <th width="200px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal Add Kategori-->
<form action="<?= base_url() ?>kategori/save" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Form Tambah Kategori</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kategori_nama">Kategori Baru</label>
                        <input type="text" class="form-control" class="kategori_nama" name="kategori_nama" placeholder="Masukan nama kategori buku">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Add Kategori-->

<!-- Modal Edit Kategori-->
<form action="<?= base_url() ?>kategori/update" method="post">
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Form Edit Kategori</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kategori_nama">Kategori Baru</label>
                        <input type="text" class="form-control" class="kategori_nama" name="kategori_nama" placeholder="Masukan nama kategori buku">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="kategori_id" class="kategori_id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Edit Kategori-->

<!-- Modal Delete Kategori-->
<form action="<?= base_url() ?>kategori/delete" method="post">
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Form Delete Kategori</h4>
                </div>
                <div class="modal-body">

                    <h5>Apakah yakin kategori ini akan dihapus ?</h5>

                </div>
                <div class="modal-footer">
                    <input type="text" name="kategori_id" class="kategori_id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Delete Kategori-->