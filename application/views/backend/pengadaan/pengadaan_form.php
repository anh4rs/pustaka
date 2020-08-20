<form action="#" method="post" enctype="multipart/form-data" id="form">
  <div class="modal fade" id="modalform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <div id="pesan" style="display: none;"></div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="datetime">Tanggal Pengadaan <span class="text-danger">*</span></label>
                <input type="date" class="form-control" name="pengadaan_tanggal" id="pengadaan_tanggal" placeholder="Pengadaan Tanggal" value="<?php echo $pengadaan_tanggal; ?>" />
              </div>
              <div class="form-group">
                <label for="int">Buku Id <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="buku_id" id="buku_id" placeholder="Buku Id" value="<?php echo $buku_id; ?>" />
              </div>
              <div class="form-group ">
                <label for="varchar">Asal Buku <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="pengadaan_asal_buku" id="pengadaan_asal_buku" placeholder="Pengadaan Asal Buku" value="<?php echo $pengadaan_asal_buku; ?>" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group ">
                <label for="int">Jumlah Buku<span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="pengadaan_jumlah" id="pengadaan_jumlah" placeholder="Pengadaan Jumlah" value="<?php echo $pengadaan_jumlah; ?>" />
              </div>
              <div class="form-group">
                <label for="varchar">Pengadaan Keterangan</label>
                <textarea type="text" class="form-control" name="pengadaan_keterangan" id="pengadaan_keterangan" placeholder="Pengadaan Keterangan"><?php echo $pengadaan_keterangan; ?></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <input type="hidden" class="form-control" name="pengadaan_id" value="<?php echo $pengadaan_id; ?>">
          <input type="hidden" class="form-control" name="_method" value="<?php echo $_method; ?>">
          <button type="button" class="btn btn-default " data-dismiss="modal">Batal</button>
          <button type="button" id="btnSave" onclick="btnSimpan()" class="btn btn-primary btnSimpan">Simpan</button>
        </div>
      </div>
    </div>
  </div>
</form>