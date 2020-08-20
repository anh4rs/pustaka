<form action="#" method="post" enctype="multipart/form-data" id="form">
  <div class="modal fade" id="modalform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <div id="pesan" style="display: none;"></div>
          <div class="form-group">
            <label for="penerbit_nama">Nama Penerbit <span class="text-danger"> *</span></label>
            <input type="text" class="form-control" id="penerbit_nama" name="penerbit_nama" placeholder="Masukan nama penerbit" value="<?php echo $penerbit_nama; ?>">
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <input type="hidden" class="form-control" name="penerbit_id" value="<?php echo $penerbit_id; ?>">
          <input type="hidden" class="form-control" name="_method" value="<?php echo $_method; ?>">
          <button type="button" class="btn btn-default " data-dismiss="modal">Batal</button>
          <button type="button" id="btnSave" onclick="btnSimpan()" class="btn btn-primary btnSimpan">Simpan</button>
        </div>
      </div>
    </div>
  </div>
</form>