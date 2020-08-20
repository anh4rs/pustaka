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
          <div class="form-group">
            <label for="siswa_nama">Nama Siswa <span class="text-danger">*</span></label>
            <input autofocus type="text" class="form-control" name="siswa_nama" id="siswa_nama" placeholder="Siswa Nama" value="<?php echo $siswa_nama; ?>" />
          </div>
          <div class="form-group">
            <label for="siswa_nisn">No NISN <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="siswa_nisn" id="siswa_nisn" placeholder="Siswa Nisn" value="<?php echo $siswa_nisn; ?>" />
          </div>
          <div class="form-group">
            <label for="siswa_kelamin">Jenis Kelamin <span class="text-danger">*</span></label>
            <select class="form-control" name="siswa_kelamin" id="siswa_kelamin"> <?php echo $siswa_kelamin; ?>
              <option value="">-- Pilih Kelamin --</option>
              <option value="L" <?= $siswa_kelamin === 'L' ?  'selected' : '' ?>>Laki-laki</option>
              <option value="P" <?= $siswa_kelamin === 'P' ?  'selected' : '' ?>>Perempuan</option>
            </select>
          </div>
          <div class="form-group ">
            <label for="siswa_agama">Agama <span class="text-danger">*</span></label>
            <select type="text" class="form-control" name="siswa_agama" id="siswa_agama">
              <option value="">-- Pilih Agama --</option>
              <option value="1" <?= $siswa_agama === '1' ?  'selected' : '' ?>>Islam</option>
              <option value="2" <?= $siswa_agama === '2' ?  'selected' : '' ?>>Katolik</option>
              <option value="3" <?= $siswa_agama === '3' ?  'selected' : '' ?>>Protestan</option>
              <option value="4" <?= $siswa_agama === '4' ?  'selected' : '' ?>>Hindu</option>
              <option value="5" <?= $siswa_agama === '5' ?  'selected' : '' ?>>Budha</option>
              <option value="6" <?= $siswa_agama === '6' ?  'selected' : '' ?>>Konghucu</option>
            </select>
          </div>
          <div class="form-group">
            <label for="siswa_tempat_lhr">Tempat Lahir <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="siswa_tempat_lhr" id="siswa_tempat_lhr" placeholder="Siswa Tempat Lhr" value="<?php echo $siswa_tempat_lhr; ?>" />
          </div>
          <div class="form-group">
            <label for="siswa_tanggal_lhr">Tanggal Lahir <span class="text-danger">*</span></label>
            <input type="date" class="form-control" name="siswa_tanggal_lhr" id="siswa_tanggal_lhr" value="<?php echo $siswa_tanggal_lhr; ?>" />
          </div>
          <div class="form-group">
            <label for="siswa_alamat">Alamat Siswa <span class="text-danger">*</span></label>
            <textarea type="text" class="form-control" rows="3" name="siswa_alamat" id="siswa_alamat" placeholder="Siswa Alamat" /> <?php echo $siswa_alamat; ?> </textarea>
          </div>
          <div class="form-group">
            <label for="siswa_no_hp">No WhatApp/Hp/Telegram <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="siswa_no_hp" id="siswa_no_hp" placeholder="Siswa No Hp" value="<?php echo $siswa_no_hp; ?>" />
          </div>
          <div class="form-group">
            <label for="siswa_foto">Foto </label>
            <input type="file" class="form-control" name="siswa_foto" id="siswa_foto" value="<?php echo $siswa_foto; ?>" />

          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <input type="hidden" class="form-control" name="siswa_id" value="<?php echo $siswa_id; ?>">
          <input type="hidden" class="form-control" name="_method" value="<?php echo $_method; ?>">
          <button type="button" class="btn btn-default " data-dismiss="modal">Batal</button>
          <button type="button" id="btnSave" onclick="btnSimpan()" class="btn btn-primary btnSimpan">Simpan</button>
        </div>
      </div>
    </div>
  </div>
</form>