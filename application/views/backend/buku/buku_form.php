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
              <div class="form-group <?= form_error('buku_judul') !== '' ? 'has-error' : '' ?>">
                <label for="buku_judul">Judul Buku <span class="text-danger">*</span></label>
                <textarea type="text" class="form-control" name="buku_judul" id="buku_judul" placeholder="Buku Judul" /><?php echo $buku_judul; ?></textarea><span class="help-block"><?= form_error('buku_judul') !== '' ? form_error('buku_judul')  : '' ?></span>
              </div>
              <div class="form-group <?= form_error('kategori_id') !== '' ? 'has-error' : '' ?>">
                <label for="kategori_id">Kategori Buku <span class="text-danger">*</span></label>
                <select type="text" class="form-control" name="kategori_id" id="kategori_id">
                  <option value="">-- Pilih Kategori --</option>
                  <?php foreach ($kategoris as $k) : ?>
                    <option value="<?= $k->kategori_id ?>" <?= $kategori_id == $k->kategori_id ? 'selected' : '' ?>> <?= $k->kategori_nama ?> </option>
                  <?php endforeach ?>
                </select>
                <span class="help-block"><?= form_error('kategori_id') !== '' ? form_error('kategori_id')  : '' ?></span>
              </div>
              <div class="form-group <?= form_error('buku_id') !== '' ? 'has-error' : '' ?>">
                <label for="buku_id">Nama Penerbit <?= $buku_id ?> <span class="text-danger">*</span></label>
                <select type="text" class="form-control" name="buku_id" id="buku_id">
                  <option value="">-- Pilih Penerbit --</option>
                  <?php foreach ($bukus as $k) : ?>
                    <option value="<?= $k->buku_id ?>" <?= $buku_id == $k->buku_id ? 'selected' : '' ?>> <?= $k->buku_nama ?> </option>
                  <?php endforeach ?>
                </select>
                <span class="help-block"><?= form_error('buku_id') !== '' ? form_error('buku_id')  : '' ?></span>
              </div>
              <div class="form-group <?= form_error('buku_isbn') !== '' ? 'has-error' : '' ?>">
                <label for="buku_isbn">Kode ISBN Buku <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="buku_isbn" id="buku_isbn" placeholder="Buku Isbn" value="<?php echo $buku_isbn; ?>" /><span class="help-block"><?= form_error('buku_isbn') !== '' ? form_error('buku_isbn')  : '' ?></span>
              </div>
              <div class="form-group <?= form_error('buku_pengarang') !== '' ? 'has-error' : '' ?>">
                <label for="buku_pengarang">Pengarang <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="buku_pengarang" id="buku_pengarang" placeholder="Buku Pengarang" value="<?php echo $buku_pengarang; ?>" /><span class="help-block"><?= form_error('buku_pengarang') !== '' ? form_error('buku_pengarang')  : '' ?></span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group <?= form_error('buku_halaman') !== '' ? 'has-error' : '' ?>">
                <label for="buku_halaman">Jumlah Halaman <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="buku_halaman" id="buku_halaman" placeholder="Buku Halaman" value="<?php echo $buku_halaman; ?>" /><span class="help-block"><?= form_error('buku_halaman') !== '' ? form_error('buku_halaman')  : '' ?></span>
              </div>
              <div class="form-group <?= form_error('buku_jumlah') !== '' ? 'has-error' : '' ?>">
                <label for="buku_jumlah">Jumlah Buku <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="buku_jumlah" id="buku_jumlah" placeholder="Buku Jumlah" value="<?php echo $buku_jumlah; ?>" /><span class="help-block"><?= form_error('buku_jumlah') !== '' ? form_error('buku_jumlah')  : '' ?></span>
              </div>
              <div class="form-group <?= form_error('buku_tahun_terbit') !== '' ? 'has-error' : '' ?>">
                <label for="buku_tahun_terbit">Tahun Terbit <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="buku_tahun_terbit" id="buku_tahun_terbit" placeholder="Buku Tahun Terbit" value="<?php echo $buku_tahun_terbit; ?>" /><span class="help-block"><?= form_error('buku_tahun_terbit') !== '' ? form_error('buku_tahun_terbit')  : '' ?></span>
              </div>
              <div class="form-group <?= form_error('buku_gambar') !== '' ? 'has-error' : '' ?>">
                <label for="buku_gambar">Gambar Sampul<span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="buku_gambar" id="buku_gambar" placeholder="Buku Gambar" value="<?php echo $buku_gambar; ?>" /><span class="help-block"><?= form_error('buku_gambar') !== '' ? form_error('buku_gambar')  : '' ?></span>
              </div>
              <div class="form-group <?= form_error('buku_sinopsis') !== '' ? 'has-error' : '' ?>">
                <label for="buku_sinopsis">Sinopsis <span class="text-danger">*</span></label>
                <textarea class="form-control" rows="3" name="buku_sinopsis" id="buku_sinopsis" placeholder="Buku Sinopsis"><?php echo $buku_sinopsis; ?></textarea><span class="help-block"><?= form_error('buku_sinopsis') !== '' ? form_error('buku_sinopsis')  : '' ?></span>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <input type="hidden" class="form-control" name="buku_id" value="<?php echo $buku_id; ?>">
          <input type="hidden" class="form-control" name="_method" value="<?php echo $_method; ?>">
          <button type="button" class="btn btn-default " data-dismiss="modal">Batal</button>
          <button type="button" id="btnSave" onclick="btnSimpan()" class="btn btn-primary btnSimpan">Simpan</button>
        </div>
      </div>
    </div>
  </div>
</form>