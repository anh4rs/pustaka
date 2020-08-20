<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Pengadaan Buku
        </h1>
        <div style="margin-top:15px">
            <ol class="breadcrumb">
                <li><a href="<?= site_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Pengadaan</li>
            </ol>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <button type="button" class="btn btn-primary" onclick="btnAdd()"><i class="fa fa-plus" aria-hidden="true"></i> Tambah</button>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-striped display nowrap" style="width:100%" id="mytable">
                            <thead>
                                <tr>
                                    <th width="40px">No</th>
                                    <th>Tanggal Pengadaan</th>
                                    <th>Judul Buku</th>
                                    <th>Asal Dana</th>
                                    <th>Jumlah</th>
                                    <th>Keterangan</th>
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

<div class="viewmodal" style="display: none;"></div>