<form action="<?= base_url() ?>kategori/update" method="post" enctype="multipart/form-data" id="form">
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Form Edit Kategori</h4>
                </div>
                <div class="modal-body">
                    <div id="pesan" style="display: none;"></div>
                    <div class="form-group">
                        <label for="kategori_nama">Nama Kategori <span class="text-danger"> *</span></label>
                        <input type="text" class="form-control" id="kategori_nama" name="kategori_nama" placeholder="Masukan nama kategori buku" value="<?= $kategori_nama ?>">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <input type="hidden" class="form-control" name="kategori_nama" value="<?= $kategori_id ?>">
                    <button type="button" class="btn btn-default " data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary btnSimpan">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>