<div class="content-wrapper">
    <section class="content-header">
        <h4>PEMINJAMAN <small>Transaksi</small>
        </h4>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Penerbit</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-3 ">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h5 class="mb-0 mt-0">Data Transaksi</h5>
                    </div>
                    <div class="box-body">
                        <div class="form-horizontal">
                            <div class="form-group mb-1">
                                <label for="int" class="col-md-5 control-label">Kode.Pinjam</label>
                                <div class="col-md-7">
                                    <div class="input-group">
                                        <input type="text" class="form-control kdpinjam" id="kdpinjam" name="kdpinjam" placeholder="Kode Pinjam" value="TR202008050001" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group  mb-1">
                                <label for="int" class="col-md-5 control-label">Tgl Pinjam</label>
                                <div class="col-md-7">
                                    <div class="input-group">
                                        <input type="date" class="form-control tglpinjam" id="tglpinjam" name="tglpinjam" style="width:148px" autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group  mb-0">
                                <label for="int" class="col-md-5 control-label">Tgl Kembali</label>
                                <div class="col-md-7">
                                    <div class="input-group">
                                        <input type="date" class="form-control tglkembali" id="tglkembali" name="tglkembali" style="width:148px">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h5 class="mb-0 mt-0">Data Siswa</h5>
                    </div>
                    <div class="box-header with-border">
                        <div class="form-horizontal">
                            <div class="form-group mb-0">
                                <label for="int" class="col-md-4 control-label">No. Induk Siswa</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <input type="text" class="form-control siswaCari" placeholder="Search for..." readonly="readonly">
                                        <div class="input-group-btn">
                                            <button class="btn btn-default searchSiswa" type="button" title="Pencarian Siswa"><i class="fa fa-search"></i></button>
                                            <button class="btn btn-primary" type="button" data-toggle="tooltip" data-placement="bottom" title="Terapkan Siswa""><i class=" fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="image">
                                    <img src="http://localhost/pustaka3/assets/adminlte/dist/img/user2-160x160.jpg" alt="ridho-al-gifari" class=" img-thumbnail">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group mb-0">
                                    <label for="int">Nama Siswa</label>
                                    <input type="text" class="form-control siswaNama" name="siswa_nama" id="siswa_nama" placeholder="Nama Siswa" value="Ridho Al Farizi" />
                                </div>
                                <div class="form-group mb-0">
                                    <label for="int">Kelas - Jurusan</label>
                                    <input type="text" class="form-control" name="siswa_kls" id="siswa_kls" class="siswa_kls" placeholder="Nama Siswa" value="XI - TKJ" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 ">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h5 class="mb-0 mt-0"><b>Data Buku</b></h5>
                    </div>
                    <div class="box-header with-border">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-horizontal">
                                    <div class="form-group  mb-0">
                                        <label for="int" class="col-md-3 control-label">Kode Buku</label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control idBuku" placeholder="Search for..." readonly="readonly">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-default searchBuku" type="button" data-toggle="tooltip" data-placement="bottom" title="Pencarian Buku"><i class="fa fa-search"></i></button>
                                                    <button class="btn btn-warning addBuku" type="button" data-toggle="tooltip" data-placement="bottom" title="Terapkan Buku"><i class="fa fa-plus"></i></button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <label for="buku_judul">Judul Buku</label>
                                    <textarea type="text" class="form-control buku_judul" name="buku_judul"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <label for="buku_pengarang">Pengarang</label>
                                    <input type="text" class="form-control buku_pengarang" name="buku_pengarang">
                                </div>
                                <div class="input-group">
                                    <label for="buku_penerbit">Penerbit</label>
                                    <input type="text" class="form-control buku_penerbit" name="buku_penerbit">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end row   -->
        <form action="" type="post">
            <div class="row">
                <div class="col-xs-10">
                    <div class="box">
                        <div class="box-body table-responsive ">
                            <table class="table table-hover bukus">
                                <thead class="header-fixed">
                                    <tr>
                                        <th>Kode Buku</th>
                                        <th>Judul Buku</th>
                                        <th>Pengarang</th>
                                        <th>Penerbit</th>
                                        <th>Tahun</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-xs-2">
                    <div class="row">
                        <div class="col-xs-12">
                            <button type="submit" class="btn btn-info btn-block" data-toggle="tooltip" data-placement="bottom" title="Klik untuk menyimpan peminjaman buku"><i style="font-size: 35px;" class="fa fa-floppy-o "></i><br><b>PROSES<br> PEMINJAMAN</b></button>
                            <button class="btn btn-warning btn-block"><i class="fa fa-refresh"></i> Batal</button>
                            <input type="text" id="save_nisn"><input type="text" id="save_id_siswa"><input type="text" id="save_nopinjam"><input type="text" id="save_tglpinjam"><input type="text" id="save_tglkembali">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
</div>
<div class="modal fade" id="modalSiswa" tabindex="-1" role="dialog" aria-labelledby="modalSiswaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalSiswaLabel">Lookup Data siswa</h4>
            </div>
            <div class="modal-body">
                <table id="lookupSiswa" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Nama Siswa</th>
                            <th>NISN</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($siswas as $r) : ?>
                            <tr>
                                <td><?= $r->siswa_nama ?></td>
                                <td><?= $r->siswa_nisn ?></td>
                                <td><button class="btn btn-info btn-xs pilihSiswa" data-id="<?= $r->siswa_id ?>" data-nisn="<?= $r->siswa_nisn ?>" data-nama="<?= $r->siswa_nama ?>"><i class="fa fa-check"></i> Pilih</button></td>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalBuku" tabindex="-1" role="dialog" aria-labelledby="modalBuku" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalBuku">Lookup Data Buku</h4>
            </div>
            <div class="modal-body">
                <table id="lookupBuku" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Judul Buku</th>
                            <th>Pengarang</th>
                            <th>Penerbit</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($bukus as $b) : ?>
                            <tr>
                                <td><?= $b->buku_judul ?></td>
                                <td><?= $b->buku_pengarang ?></td>
                                <td><?= $b->penerbit_id ?></td>
                                <td><?= $b->buku_jumlah ?></td>
                                <td><button id="pilihBuku" class="btn btn-info btn-xs pilihBuku" data-bukuid="<?= $b->buku_id ?>" data-bukujudul="<?= $b->buku_judul ?>" data-bukupengarang="<?= $b->buku_pengarang ?>" data-bukupenerbit="<?= $b->penerbit_id ?>" data-bukutahun="<?= $b->buku_tahun_terbit ?>"><i class="fa fa-check"></i> Pilih</button></td>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>