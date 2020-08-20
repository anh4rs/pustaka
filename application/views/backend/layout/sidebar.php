<aside class="main-sidebar">
	<section class="sidebar">
		<div class="user-panel">
			<div class="pull-left image">
				<img src="<?= base_url('assets/adminlte/') ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				<p>Alexander Pierce</p>
				<!-- Status -->
				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>
		<form action="#" method="get" class="sidebar-form">
			<div class="input-group">
				<input type="text" name="q" class="form-control" placeholder="Search...">
				<span class="input-group-btn">
					<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
					</button>
				</span>
			</div>
		</form>
		<ul class="sidebar-menu" data-widget="tree">
			<li class="header">TRANSAKSI</li>
			<li class="treeview <?= $this->router->fetch_class() == 'transaksi' ? 'active' : ''  ?> ">
				<a href="#">
					<i class="fa fa-handshake-o"></i> <span>Transaksi Peminjaman</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li <?= $this->router->fetch_class() == 'transaksi' && $this->router->fetch_method() == 'index' ? 'class="active"' : ''  ?>><a href="<?= site_url('transaksi'); ?>"><i class="fa fa-circle-o"></i> Data semua transaksi</a></li>
					<li <?= $this->router->fetch_class() == 'transaksi' && $this->router->fetch_method() == 'create' ? 'class="active"' : ''  ?>><a href="<?= site_url('transaksi/pinjam'); ?>"><i class="fa fa-circle-o"></i> Tambah transaksi baru</a></li>
				</ul>
			</li>
			<li class="header">MASTER</li>
			<li class="<?= $this->router->fetch_class() === 'kategori' ? 'active' : '' ?>"><a href="<?= base_url() ?>kategori"><i class="fa fa-link"></i> <span>Kategori</span></a></li>
			<li class="<?= $this->router->fetch_class() === 'penerbit' ? 'active' : '' ?>"><a href="<?= base_url() ?>penerbit"><i class="fa fa-link"></i> <span>Penerbit</span></a></li>
			<li class="<?= $this->router->fetch_class() === 'pengadaan' ? 'active' : '' ?>"><a href="<?= base_url() ?>pengadaan"><i class="fa fa-link"></i> <span>Pengadaan</span></a></li>
			<li class="<?= $this->router->fetch_class() === 'buku' ? 'active' : '' ?>"><a href="<?= base_url() ?>buku"><i class="fa fa-book"></i> <span>Buku</span></a></li>
			<li class="<?= $this->router->fetch_class() === 'siswa' ? 'active' : '' ?>"><a href="<?= base_url() ?>siswa"><i class="fa fa-users"></i> <span>Siswa</span></a></li>
			<li class="header">LAPORAN</li>
			<li class="treeview">
				<a href="#"><i class="fa fa-link"></i> <span>Laporan</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li><a href="#">Link in level 2</a></li>
					<li><a href="#">Link in level 2</a></li>
				</ul>
			</li>
		</ul>
	</section>
</aside>